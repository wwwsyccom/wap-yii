define('public/widget/loading-footer/loading', function(require, exports, module) {

  exports.show = function(){
  	$('#loading-footer').removeClass('hide');
  }
  exports.hide = function(){
  	$('#loading-footer').addClass('hide');
  }
  

});
