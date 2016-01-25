define('views/busiSearch/widget/asso/asso', function(require, exports, module) {

  exports.remove = function(){
  	var $asso = $('#busi-asso');
  	if($asso){
  		$asso.remove();
  	}
  }
  exports.renderData = function(data){
  	var template = require('public/js/artTemplate').template;
  	return template('busi-asso-script', data);
  }
  

});
