define('public/js/location', function(require, exports, module) {

  //获取当前的经度纬度, 之后调用指定的回调函数
  exports.getPosition = function(onComplete, onError){
  	var map = new AMap.Map(""),    
  		geolocation = null;
  	map.plugin("AMap.Geolocation", function() {
  		geolocation = new AMap.Geolocation({
  			enableHighAccuracy: true,
  			timeout: 10000,
  			maximumAge: 0,
  			convert: true
  		});
  		map.addControl(geolocation);
  		AMap.event.addListener(geolocation, "complete", onComplete);
  		AMap.event.addListener(geolocation, "error", onError);
  		geolocation.getCurrentPosition();
  	});
  }
  //获取指定经度纬度的位置名称, 之后调用指定的回调函数
  exports.getAddress = function(xy, callback){
     var geocoder = new AMap.Geocoder({
          radius: 1000,
          extensions: "all"
      });        
      geocoder.getAddress(xy, function(status, result) {
          if (status === 'complete' && result.info === 'OK') {
              callback(result);
          }
      });        
  }

});
