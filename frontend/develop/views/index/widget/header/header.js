var $ = jQuery;
var $sideWraper = $('#index-header-side-wraper');
var $drop = $('#index-header-drop');
var $side = $('#index-header-side');
var $logout = $('#index-header-logout');
$drop.click(function(){
	if($sideWraper.hasClass('hide')){
		$sideWraper.removeClass('hide');
		$side.slideDown("slow");
	}else{
		$sideWraper.addClass('hide');
		$side.hide();
	}
});
$logout.click(function(){
	alert('logout');
});
$sideWraper.bind('touchstart',function(event){
	var target = event.target;
	if(target == this){
		$sideWraper.addClass('hide');
		$side.hide();
	}
});
$sideWraper.find('.contact').bind('click',function(){
	var dialog = require('/public/widget/dialog/dialog');
	var tel = '010-82433959';
	var config = {
		'title': tel,
		'showMask': false,
		'ask': ['取消','<a href="tel:'+tel+'">呼叫</a>'],
		'callbacks':[
			function(){
				dialog.hide();
			},
			function(){}
		]
	};
	dialog.init(config);
	dialog.show();
});
