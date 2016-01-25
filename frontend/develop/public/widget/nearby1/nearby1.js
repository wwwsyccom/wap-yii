exports.renderData = function(data){
	var template = require('/public/js/artTemplate').template;
	var $nearby = $('#index-nearby');
	//template('index-nearby-script', data);
	$nearby.append(template('index-nearby-script', data)).removeClass('hide');
}
exports.isShow = function(){
	return $nearby.isShow();
}
exports.remove = function(){
	var $nearby = $('#index-nearby');
	var $lis = $nearby.find('li');
	if($lis.length > 0){
		$nearby.addClass('hide');
		$lis.remove();
	}
}