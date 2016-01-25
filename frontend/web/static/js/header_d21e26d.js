define('public/widget/header/header', function(require, exports, module) {

  var $title = $('#common-header-title');
  exports.setTitle = function(title){
  	$title.text(title);
  }
  

});
