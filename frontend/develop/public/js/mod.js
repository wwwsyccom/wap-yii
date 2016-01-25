/**
 * file: mod.js
 * ver: 1.0.11
 * update: 2015/05/14
 *
 * https://github.com/fex-team/mod
 */
var require, define;

(function(global) {
    if (require) return; // 避免重复加载而导致已定义模块丢失

    var head = document.getElementsByTagName('head')[0],
        loadingMap = {},	//键值对的形式保存回调函数，键名为模块id，值为回调函数构成的数组,异步加载模块的情况下才会非空/
        factoryMap = {},	//键值对的形式存放回调函数，键名为模块id，值为模块的回调函数
        modulesMap = {},	//以键值对的形式存放模块，键名为模块id，值为模块 对象module
        scriptsMap = {},	//用于去重，防止加载重复的script标签
        resMap = {},		//保存静态资源映射表中的资源信息
        pkgMap = {};		//保存静态资源映射表中的包信息

	//创建script标签,异步加载模块
    function createScript(url, onerror) {
        if (url in scriptsMap) return;	//防止重复创建
        scriptsMap[url] = true;

        var script = document.createElement('script');
        if (onerror) {	//异常回调函数
            var tid = setTimeout(onerror, require.timeout);	//在设置的超时时间后触发超时回调,适用于网络不好的情况

            script.onerror = function() {	//绑定加载异常监听函数，适用于模块不存在的情况
                clearTimeout(tid);
                onerror();
            };

            function onload() {	
                clearTimeout(tid);
            }
			//解除超时回调
            if ('onload' in script) {
                script.onload = onload;
            } else {
                script.onreadystatechange = function() {
                    if (this.readyState == 'loaded' || this.readyState == 'complete') {
                        onload();
                    }
                }
            }
        }
        script.type = 'text/javascript';
        script.src = url;
        head.appendChild(script);
        return script;
    }
	// 异步加载模块
    function loadScript(id, callback, onerror) {
        var queue = loadingMap[id] || (loadingMap[id] = []);	//loadingMap中保存的回调函数会在define函数最后被调用，见define()
        queue.push(callback);	//queue为什么是数组?????

        //
        // resource map query
        //
        var res = resMap[id] || resMap[id + '.js'] || {};
        var pkg = res.pkg;
        var url;

        if (pkg) {
            url = pkgMap[pkg].url;
        } else {
            url = res.url || id;
        }
		//异步加载模块
        createScript(url, onerror && function() {
            onerror(id);
        });
    }
	//id为模块id,factory为模块回调函数,
    define = function(id, factory) {
        id = id.replace(/\.js$/i, '');
        factoryMap[id] = factory;	//factoryMap以键值对的形式保存回调函数

        var queue = loadingMap[id];
        if (queue) {	//在异步加载的情况下queue为回调函数构成的数组,同步请求下此处不会执行
            for (var i = 0, n = queue.length; i < n; i++) {
                queue[i]();
            }
            delete loadingMap[id];
        }
    };
	//分为两种情况：
	//1. id为字符串，则为同步调用，模块已经事先通过同步插入script标签的形式被执行,模块的回调函数已经事先保存在factoryMap中,调用require会执行factoryMap中的相应的回调函数
	//2. id为数组，则未异步调用，分为两步,会先动态创建script标签，模块被异步加载后，模块中的define方法被调用执行，相应的factoryMap被初始化，所有依赖的模块都加载后，会调用require()方法
	//，require方法的传递参数为字符串，即所有被依赖的模块的id，然后初始化所有被依赖的模块，即给modulesMap赋值
    require = function(id) {

        // compatible with require([dep, dep2...]) syntax.
        if (id && id.splice) {	//如果id为数组形式,则调用异步方法
            return require.async.apply(this, arguments);
        }

        id = require.alias(id);

        var mod = modulesMap[id];
        if (mod) {	//如果之前require过，即模块的factory被执行过,则直接返回
            return mod.exports;
        }

        //
        // init module
        //
        //第一次require,则执行模块对应的回调函数factory，来初始化对应的module
        var factory = factoryMap[id];
        if (!factory) {
            throw '[ModJS] Cannot find module `' + id + '`';
        }

        mod = modulesMap[id] = {
            exports: {}
        };

        //
        // factory: function OR value
        //
        //执行模块对应的回调函数factory，并初始化对应的module
        var ret = (typeof factory == 'function') ? factory.apply(mod, [require, mod.exports, mod]) : factory;

        if (ret) {
            mod.exports = ret;
        }
        return mod.exports;
    };

	//异步调用，分为两步,会先动态创建script标签，模块被异步加载后，模块中的define方法被调用执行，相应的factoryMap被初始化，所有依赖的模块都加载后，会调用require()方法
	//，require方法的传递参数为字符串，即所有被依赖的模块的id，然后初始化所有被依赖的模块，即给modulesMap赋值
    require.async = function(names, onload, onerror) {
        if (typeof names == 'string') {
            names = [names];
        }

        var needMap = {};
        var needNum = 0;

        function findNeed(depArr) {
            for (var i = 0, n = depArr.length; i < n; i++) {
                //
                // skip loading or loaded
                //
                var dep = require.alias(depArr[i]);

                if (dep in factoryMap) {
                    // check whether loaded resource's deps is loaded or not
                    var child = resMap[dep] || resMap[dep + '.js'];
                    if (child && 'deps' in child) {	//如果模块dep依赖于其他模块，则递归
                        findNeed(child.deps);
                    }
                    continue;
                }

                if (dep in needMap) {
                    continue;
                }

                needMap[dep] = true;
                needNum++;
                loadScript(dep, updateNeed, onerror);	//核心部分

                var child = resMap[dep] || resMap[dep + '.js'];
                if (child && 'deps' in child) {
                    findNeed(child.deps);
                }
            }
        }

        function updateNeed() {
            if (0 == needNum--) {
                var args = [];
                for (var i = 0, n = names.length; i < n; i++) {
                    args[i] = require(names[i]);
                }

                onload && onload.apply(global, args);
            }
        }

        findNeed(names);
        updateNeed();
    };
	//加载resourceMap
    require.resourceMap = function(obj) {
        var k, col;

        // merge `res` & `pkg` fields
        col = obj.res;
        for (k in col) {
            if (col.hasOwnProperty(k)) {
                resMap[k] = col[k];
            }
        }

        col = obj.pkg;
        for (k in col) {
            if (col.hasOwnProperty(k)) {
                pkgMap[k] = col[k];
            }
        }
    };

    require.loadJs = function(url) {
        createScript(url);
    };

    require.loadCss = function(cfg) {
        if (cfg.content) {
            var sty = document.createElement('style');
            sty.type = 'text/css';

            if (sty.styleSheet) { // IE
                sty.styleSheet.cssText = cfg.content;
            } else {
                sty.innerHTML = cfg.content;
            }
            head.appendChild(sty);
        } else if (cfg.url) {
            var link = document.createElement('link');
            link.href = cfg.url;
            link.rel = 'stylesheet';
            link.type = 'text/css';
            head.appendChild(link);
        }
    };

	//将后缀.js去掉
    require.alias = function(id) {
        return id.replace(/\.js$/i, '');
    };
	//异步加载默认的超时时间
    require.timeout = 5000;

})(this);
