define('public/widget/searchHist/searchHist', function(require, exports, module) {

  /*
   *  data为json格式
   * 	{
   * 		'icon': '',	//图标样式iconfont
   * 		'data': [
   * 					{'name':'name1','url':'url1'},
   * 					{'name':'name2','url':'url2'}
   * 					...
   * 				]
   * }
   */
  exports.renderData = function(data){
  	var template = require('public/js/artTemplate').template;
  	return template('searchHist-script', data);
  }
  exports.bindClear = function(callback){
  	var $clear = $('#searchHist .clear');
  	$clear.bind('click',callback);
  }
  exports.hide = function(){
  	$('#searchHist').addClass('hide');
  }
  exports.show = function(){
  	$('#searchHist').removeClass('hide');
  }
  exports.remove = function(){
  	var $searchHist = $('#searchHist');
  	if($searchHist){
  		$searchHist.remove();
  	}
  }
  

});
