define('public/widget/footer/footer', function(require, exports, module) {

  console.log('this is footer.js of public');
  var $ = require('public/js/jquery');
  var $number = $('#number').find('span');
  exports.getNumber = function(){
  	return $number.text();
  }
  exports.setNumber = function(number){
  	$number.text(number);
  }
  

});
