var TouchSlide = require('/public/js/TouchSlide.js').TouchSlide;
exports.start = function(){
	TouchSlide({ 
		slideCell:"#banner-wrap",
		titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd ul", 
		effect:"leftLoop", 
		autoPlay:true,//自动播放
		autoPage:true //自动分页
	});
}

