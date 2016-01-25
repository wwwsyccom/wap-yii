define('views/coupon/widget/detail/detail', function(require, exports, module) {

  exports.renderData = function(data){
  	var template = require('public/js/artTemplate').template;
  	return template('coupon-detail-script', data);
  }
  exports.drawShade = drawShade;
  //优惠券底部底纹
  function drawShade(){
  	var $lis = $('#coupon-detail li');
  	var liWidth = $lis.width();
  	var dist = liWidth * 0.015;
  	var radius = liWidth * 0.02;
  	for(var i=0,len=$lis.length;i<len;i++){
  		var $canvas = $('<canvas width='+liWidth+' height='+radius+'></canvas>');
  		var canvas = $canvas[0];
  		$lis[i].appendChild(canvas);
  	    var context = canvas.getContext('2d');
  		var sum = 0;
  		var temp = sum + dist + 2 * radius;
  		while(temp < liWidth){
  			console.log('..');
  	        context.beginPath();
  	        context.arc(sum+dist+radius, radius, radius, 0, Math.PI , true);
  	        //不关闭路径路径会一直保留下去，当然也可以利用这个特点做出意想不到的效果
  	        context.closePath();
  	        context.fillStyle = 'rgb(240,240,240)';
  			context.fill();
  			context.save();
  			sum = sum + dist + 2 * radius;
  			temp = sum + dist + 2 * radius;
  		}
  	}
  }

});
