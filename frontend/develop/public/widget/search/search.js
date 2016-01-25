var $input = $('#search-input');
var $inputHint = $('#search .input-hint');
var tip = '';
/*
 * config格式如下
 * 	{
 * 		'tip': '',
 * 		'asso': callback1,	//输入搜索关键字 联想监听函数
 * 		'click': callback2	//点击搜索按钮监听函数
 * 	}
 */
exports.init = function(config){
	tip = config.tip;
	$inputHint.text(tip);
	$input.bind('input',function(){
		if($input.val() == ''){
			$inputHint.text(tip);
		}else{
			$inputHint.text('');
		}
		if(config.asso){
			config.asso('asso');
		}
	});
	$('#search-button').bind('click', function(){
		if(config.click){
			config.click('click');
		}
	});
};
exports.getSearchKey = function(){
	return $input.val();
}
