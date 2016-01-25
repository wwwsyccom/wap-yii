var $dialog = $('#dialog-wraper');
$dialog.bind('touchstart',function(event){
	if(this == event.target){
		$dialog.addClass('hide');
	}
});
exports.show = function(){
	$dialog.removeClass('hide');
}
exports.hide = function(){
	$dialog.addClass('hide');
}
/*
 * config 数据格式为
 * {
 * 		title: 'title',	//对话框标题
 * 		hideMask: false, //是否显示蒙层, 默认显示
 * 		ask: ['确定', '取消',...], //可点击按钮数组
 * 		callbacks: [callback1, callback2,...],	//可点击按钮回调函数, 回调函数和按钮一一对应
 * }
 */
exports.init = function(config){
	var $title = $dialog.find('.title');
	var $askWrap = $dialog.find('.ask');
	var title = config.title;
	var hideMask = config.hideMask;
	var ask = config.ask;
	var callbacks = config.callbacks;
	$dialog.find('.title').text(title);
	$askWrap.html('');
	if(ask){
		for(var i=0,len=ask.length;i<len;i++){
			var $span = $('<span>' + ask[i] + '</span>');
			$span.bind('click', callbacks[i]);
			$askWrap.append($span);
		}
	}
	if(hideMask){
		$dialog.css('backgroundColor','transparent');
	}
}
