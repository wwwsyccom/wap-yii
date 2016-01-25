require('/public/widget/header/header').setTitle('切换位置');
var noResult = require('/public/widget/noResult/noResult');
var dialog = require('/public/widget/dialog/dialog');
var searchHist = require('/public/widget/searchHist/searchHist');
var toCurrent = require('widget/toCurrent/toCurrent');
var search = require('/public/widget/search/search');
var template = require('/public/js/artTemplate').template;
var $positionToCurrent = $('#position-toCurrent');
//搜索逻辑
function searchClick(bindType){
	var key = search.getSearchKey();
	if($.trim(key) == ''){
		if(bindType == 'asso'){
			searchHist.remove();
			$positionToCurrent.addClass('hide');
			$('#position-result').remove();
		}
	}
	if($.trim(key) !== ''){
		$.ajax({
			type:"get",
			url:"/test/position.json",
			data:{'key':key},
			dataType: 'text',
			async:true,
			success:function(data){
				data = JSON.parse(data);
				data2 = data.data;
				if(data2.length > 0){
					searchHist.remove();
					$positionToCurrent.addClass('hide');
					noResult.hide();
					var $positionResult = $('#position-result');
					if($positionResult){
						$positionResult.remove();
					}
					$('body').append(template('position-result-script', data));
				}else{
					var noResultConfig = {
						'tip': '抱歉，没有相关搜索结果',
						'icon': 'P'
					}
					searchHist.remove();
					$positionToCurrent.addClass('hide');
					noResult.init(noResultConfig);
					noResult.show();
				}
			}
		});  
	}
}
var searchConfig = {
		'tip':'输入位置',
		'asso': searchClick,
		'click': searchClick
	};
search.init(searchConfig);
//历史记录
localStorage.setItem('positionSearchHist', '');
var temp = {'icon':'P','data':[{'name':'西二旗北路','url':''},{'name':'西二旗北路','url':''}]};
localStorage.setItem('positionSearchHist', JSON.stringify(temp));
var positionSearchHist = localStorage.getItem('positionSearchHist');
if(positionSearchHist){
	positionSearchHist = JSON.parse(positionSearchHist);
	$('body').append(searchHist.renderData(positionSearchHist));
	searchHist.bindClear(function(){
		var dialogConfig = {
			'title': '清除历史记录',
			'ask': ['确定','取消'],
			'callbacks': [
				function(){
					localStorage.setItem('positionSearchHist', '');
					searchHist.remove();
					dialog.hide();
				},
				function(){
					dialog.hide();
				}
			]
		};
		dialog.init(dialogConfig);
		dialog.show();
	});
}
//定位逻辑
var loc = require('/public/js/location');
//获取经度纬度
loc.getPosition(function(data){	//成功回调
	var lng = data.position.getLng();
	var lat = data.position.getLat();
	loc.getAddress([lng, lat], function(data){
		var addressComponent = data.regeocode.addressComponent;
		var province = $.trim(addressComponent.province);
		var city = $.trim(addressComponent.city);
		var district = $.trim(addressComponent.district);
		var address = data.regeocode.formattedAddress; 
		
		var regArr = [];
		if(province!=''){
			regArr.push('('+province+')');
		}
		if(city!=''){
			regArr.push('('+city+')');
		}
		if(district!=''){
			regArr.push('('+district+')');
		}
		
		var reg = new RegExp(regArr.join('|'), 'ig');
		address = address.replace(reg, '');
		toCurrent.setAddress('当前位置：'+address);
	});
},function(data){	//失败回调
	toCurrent.setAddress('获取经度纬度失败!');
});