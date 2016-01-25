require('public/widget/header/header').setTitle('登录');
var $phone = $('#login .phone');
var $codeInput = $('#login .code-input');
var $codeSend = $('#login .code-send');
var $phoneHint = $('#login .phone-hint');
var $codeHint = $('#login .code-input-hint');
var $loginButton = $('#login-button');
$phone.bind('input',function(){
	if($phone.val() == ''){
		$phoneHint.text('请输入手机号码');
	}else{
		$phoneHint.text('');
	}
});
$codeInput.bind('input',function(){
	if($codeInput.val() == ''){
		$codeHint.text('请输入手机中的短信验证码');
	}else{
		$codeHint.text('');
	}
});
function sendCode(){
	var number = $phone.val();
	var phoneReg = /^1[34578]\d{9}$/;
	if(!phoneReg.test(number)){
		var dialog = require('public/widget/dialog/dialog');
		var config = {
			title : '请输入正确的手机号码',
			ask : ['确定'],
			callbacks : [
						function(){
							dialog.hide();
						}
						]
		};
		dialog.init(config);
		dialog.show();
	}else{
		$codeInput.prop('readonly',false);
		$codeSend.unbind('click');
		var $this = $(this);
		timeCount();
	}
}
function timeCount(){
	$codeSend[0].className = 'code-send color-3 bdColor-3';
	var time = 5;
	var timeInterval = setInterval(inner, 1000);
	inner();
	function inner(){
		if(time == 0){
			clearInterval(timeInterval);
			var className = 'code-send color-5 bdColor-5'
			$codeSend.html('发送验证码').bind('click', sendCode)[0].className = className;
		}else{
			$codeSend.html('('+ time-- +')'+'重新获取');
		}
	}
}
$codeSend.bind('click', sendCode);
$loginButton.bind('click',function(){
	if(true){
		var dialog = require('public/widget/dialog/dialog');
		var config = {
			title : '验证码错误'
			/*
			ask : ['确定'],
			callbacks : [
						function(){
							dialog.hide();
						}
						]
						*/
		};
		dialog.init(config);
		dialog.show();
	}
});