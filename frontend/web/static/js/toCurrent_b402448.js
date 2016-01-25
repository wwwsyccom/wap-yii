define('views/position/widget/toCurrent/toCurrent', function(require, exports, module) {

  exports.setAddress = function(address){
  	$('#position-toCurrent .address').text(address);
  }

});
