require('widget/banner/banner').start();
require('widget/header/header');
//附近无店铺
/* 
var noResult = require('/public/widget/noResult/noResult');
noResult.init({'tip':'附近暂无店铺','icon':'L'});
noResult.show();
*/
//定位失败
/*
var dialog = require('/public/widget/dialog/dialog');
var dialogConfig = {
	'title': '定位失败，是否显示上次地理位置',
	'ask': ['确定','手动输入'],
	'callbacks':[function(){
		dialog.hide();
	},function(){
		window.location.href = '/position'
	}]
};
dialog.init(dialogConfig);
dialog.show();
*/
//距离稍远
/*
var dialog = require('/public/widget/dialog/dialog');
var dialogConfig = {
	'title': '您当前位置距离该店铺1km，是否继续点餐',
	'ask': ['看看其他店铺','继续点餐'],
	'callbacks':[function(){
		dialog.hide();
	},function(){
		dialog.hide();
	}]
};
dialog.init(dialogConfig);
dialog.show();
*/
$.ajax({
	type:"get",
	url:"/test/restaurant.json",
	dataType: "text",
	async:true,
	success: function(data){
		data = JSON.parse(data);
		data2 = data.data;
		if(data2.length > 0){
			for(var i=0,len=data2.length;i<len;i++){
				if(data2[i].book == 0){
					data2[i].reservableHide = 'hide';
				}
			}
			var nearby = require('widget/nearby/nearby');
			nearby.renderData(data);
		}
	}
});
//滚动条在Y轴上的滚动距离
function getScrollTop(){
　　var scrollTop = 0, bodyScrollTop = 0, documentScrollTop = 0;
　　if(document.body){
　　　　bodyScrollTop = document.body.scrollTop;
　　}
　　if(document.documentElement){
　　　　documentScrollTop = document.documentElement.scrollTop;
　　}
　　scrollTop = (bodyScrollTop - documentScrollTop > 0) ? bodyScrollTop : documentScrollTop;
　　return scrollTop;
}
//文档的总高度
function getScrollHeight(){
　　var scrollHeight = 0, bodyScrollHeight = 0, documentScrollHeight = 0;
　　if(document.body){
　　　　bodyScrollHeight = document.body.scrollHeight;
　　}
　　if(document.documentElement){
　　　　documentScrollHeight = document.documentElement.scrollHeight;
　　}
　　scrollHeight = (bodyScrollHeight - documentScrollHeight > 0) ? bodyScrollHeight : documentScrollHeight;
　　return scrollHeight;
}
//浏览器视口的高度
function getWindowHeight(){
　　var windowHeight = 0;
　　if(document.compatMode == "CSS1Compat"){
　　　　windowHeight = document.documentElement.clientHeight;
　　}else{
　　　　windowHeight = document.body.clientHeight;
　　}
　　return windowHeight;
}
window.onscroll = function(){
　　if(getScrollTop() + getWindowHeight() == getScrollHeight()){
		var loading = require('/public/widget/loading-footer/loading');
		loading.show();
		setTimeout(function(){
			$.ajax({
				type:"get",
				url:"/test/restaurant.json",
				dataType: "text",
				async:true,
				success: function(data){
					data = JSON.parse(data);
					data2 = data.data;
					if(data2.length > 0){
						for(var i=0,len=data2.length;i<len;i++){
							if(data2[i].book == 0){
								data2[i].reservableHide = 'hide';
							}
						}
						var nearby = require('widget/nearby/nearby');
						nearby.renderData(data);
						loading.hide();
					}
				}
			});
		},200);
　　}
}
