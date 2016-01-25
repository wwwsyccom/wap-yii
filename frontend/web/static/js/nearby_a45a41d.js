define('views/index/widget/nearby/nearby', function(require, exports, module) {

  exports.renderData = function(data){
  	var nearby1 = require('public/widget/nearby1/nearby1');
  	nearby1.renderData(data);
  	$('#index-nearby-section').removeClass('hide');
  }

});
