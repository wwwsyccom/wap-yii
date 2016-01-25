define('public/widget/noSearch/noSearch', function(require, exports, module) {

  var $noSearch = $('#noSearch');
  exports.init = function(){
  	var wHeight = $(window).height();
  	var toTop = $noSearch.offset().top;
  	$noSearch.height(wHeight - toTop);
  }
  exports.show = function(){
  	$noSearch.removeClass('hide');
  }
  

});
