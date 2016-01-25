require('public/widget/header/header').setTitle('确认订单');
var $confirm = $('#confirm-order-ul');
var $phone = $confirm.find('.phone');
var $phoneHint = $confirm.find('.phone-hint');
var phoneHintText = $phoneHint.text();
var $arrivalTime = $confirm.find('.arrival-time');
var $arrivalTimeHint = $confirm.find('.arrival-time-hint');
var timeHintText = $arrivalTimeHint.text();
var $arrivalNum = $confirm.find('.arrival-num');
var $arrivalNumHint = $confirm.find('.arrival-num-hint');
var $comment = $confirm.find('.comment');
var $commentHint = $confirm.find('.comment-hint');
var commentHintTxt = $confirm.find('.comment-hint').text();
var numHintText = $arrivalNumHint.text();
$phone.bind('input',function(){
	if($phone.val() == ''){
		$phoneHint.text(phoneHintText);
	}else{
		$phoneHint.text('');
	}
});
$comment.bind('input',function(){
	if($comment.val() == ''){
		$commentHint.text(commentHintTxt);
	}else{
		$commentHint.text('');
	}
});
$arrivalTime.bind('change',function(){
	if($arrivalTime.val() == ''){
		$arrivalTimeHint.text(timeHintText);
	}else{
		$arrivalTimeHint.text('');
	}
});
$arrivalNum.bind('change',function(){
	if($arrivalNum.val() == ''){
		$arrivalNumHint.text(numHintText);
	}else{
		$arrivalNumHint.text('');
	}
});
var $checks = $confirm.find('.check');
$checks.bind('click',function(){
	for(var i=0,len=$checks.length;i<len;i++){
		$checks[i].className = 'check bdColor-10 color-4';
	}
	this.className = 'bgColor-5 bdColor-5 color-4 check';
});
var $confirmButton = $('#confirm-order-footer .confirm-button');
$confirmButton.bind('click',function(){
	var phoneReg = /^1[34578]\d{9}$/;
	var phone = $phone.val();
	if(phone == ''){
		var dialog = require('public/widget/dialog/dialog');
		dialog.init({'title':'手机号未填写'});
		dialog.show();
	}else if(!phoneReg.test(phone)){
		var dialog = require('public/widget/dialog/dialog');
		dialog.init({'title':'手机号填写错误'});
		dialog.show();
	}
});
