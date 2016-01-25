var $noResult = $('#noResult');
/*
exports.init = function(){
	var wHeight = $(window).height();
	var toTop = $noSearch.offset().top;
	$noSearch.height(wHeight - toTop);
}
*/
exports.hide = function(){
	$noResult.addClass('hide');
}
exports.show = function(){
	$noResult.removeClass('hide');
}
/*
 * config为json格式
 * {
 * 		'icon': '',
 * 		'tip': ''
 * }
 */
exports.init = function(config){
	var $icon = $noResult.find('.iconfont');
	var $tip = $noResult.find('.tip');
	$icon.text(config.icon);
	$tip.text(config.tip);
}
