
// npm install [-g] fis3-hook-commonjs
fis.hook('commonjs');
fis.set('project.ignore', [
  '/fis-conf.js'
]);
fis.match('*.{html,php}', {
	useMap: true
});
fis.match('*.js', {
    isMod: true
});
fis.match('{jquery,mod,viewport}.js', {
    isMod: false
});
fis.match('views/*/*.js', {
    isMod: false
});
fis.match('*/(*).js', {
    release : 'web/static/js/$1' , 
    url: '/static/js/$1',
    useHash: true  
});  
fis.match('layout/(*)', {
    release : 'views/layout/$1' , 
});  
fis.match('/index.php', {
    release : 'web/index.php' , 
});  
fis.match('/public/font/(*)', {
    release : 'web/static/font/$1' , 
    url: '/static/font/$1'
});  
fis.match('/test/(*)', {
    release : 'web/test/$1' , 
});  
fis.match('*/(*).css', { 
    url: '/static/css/$1',
    release : 'web/static/css/$1',  
    useHash: true
});
fis.match('*/(*).png', { 
    url: '/static/img/$1',
    release : 'web/static/img/$1',  
    useHash: true
});
fis.match('*/(*).gif', { 
    url: '/static/img/$1',
    release : 'web/static/img/$1',  
    useHash: true
});
fis.match('*/(*).jpg', { 
    url: '/static/img/$1',
    release : 'web/static/img/$1',  
    useHash: true
});
fis.match('::package', {  
    // npm install [-g] fis3-postpackager-loader
    // 分析 __RESOURCE_MAP__ 结构，来解决资源加载问题
    postpackager: fis.plugin('loader', {
        resourceType: 'commonJs',
        useInlineMap: true, // 资源映射表内嵌
        allInOne: false
    })
})
//css压缩
/*
fis.match('*.css', {
  // compress css invoke fis-optimizer-clean-css
  optimizer: fis.plugin('clean-css', {
  })
});
//js压缩
fis.match('*.js', {
  // 指定压缩插件 fis-optimizer-uglify-js 
  optimizer: fis.plugin('uglify-js', {
    // option of uglify-js
  })
});
*/
//将项目发布到根目录的www目录下 
fis.match('*', {
  deploy: fis.plugin('local-deliver', {
    to: '../'
  })
});
//开启组件同名依赖
fis.match('*.{html,js,php}', {
  useSameNameRequire: true
});
/*
fis.match('{banner,footer}.js', {
	packTo: '/static/bf.js'
});
fis.match('{banner,index}.js', {
	packTo: '/static/bi.js'
});
*/

// fis3 release prod 产品发布，进行合并
/*
fis.media('prod')
    .match('*.js', {
        packTo: '/static/aio.js'
});
*/
//sass
//先安装python2.7,设置path
//npm install fis-parser-node-sass -g
//fis.match('**/*.scss', {
 //   rExt: '.css', // from .scss to .css
  //  parser: fis.plugin('node-sass', {
        //fis-parser-sass option
   // })
//});

//html压缩
// You need install it.
// npm i fis-optimizer-html-minifier [-g]
/*
fis.match('*.html', {
  //invoke fis-optimizer-html-minifier
  optimizer: fis.plugin('html-minifier')
});
*/