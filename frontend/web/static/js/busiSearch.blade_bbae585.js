require('public/widget/header/header').setTitle('搜索商户');
var search = require('public/widget/search/search');	//搜索条模块 
var nearby = require('public/widget/nearby1/nearby1');		//店铺搜索结果模块
var noResult = require('public/widget/noResult/noResult');	//无搜索结果模块
var dialog = require('public/widget/dialog/dialog');	//对话框模块
var searchHist = require('public/widget/searchHist/searchHist');	//历史记录模块
var asso = require('views/busiSearch/widget/asso/asso');	//输入联想

//店铺搜索逻辑
function searchClick(bindType){
	var key = search.getSearchKey();
	if($.trim(key) == ''){
		if(bindType == 'asso'){
			noResult.hide();
			asso.remove();
			nearby.remove();
		}
	}
	if($.trim(key) !== ''){
		$.ajax({
			type:"get",
			url:"/test/restaurant.json",
			data:{'key':key},
			dataType: 'text',
			async:true,
			success:function(data){
				data = JSON.parse(data);
				data2 = data.data;
				if(data2.length > 0){	//有搜索结果
					//如果之前渲染过，则先将之前的删除掉
					nearby.remove();
					asso.remove();
					searchHist.remove();
					noResult.hide();
					if(bindType == 'click'){
						for(var i=0,len=data2.length;i<len;i++){
							if(data2[i].book == 0){
								data2[i].reservableHide = 'hide';
							}
						}
						nearby.renderData(data);
					}else if(bindType == 'asso'){
						var busiList = asso.renderData(data);
						$('body').append(busiList);
					}
				}else{ 	//没有搜索结果
					if(bindType == 'click'){
						var noResultConfig = {
							'tip': '抱歉，没有相关搜索结果',
							'icon': 'U'
						}
						searchHist.remove();
						nearby.remove();
						noResult.init(noResultConfig);
						noResult.show();
					}
				}
			}
		});  
	}
}
var searchConfig = {'tip':'输入商户名称', 'asso':searchClick, 'click':searchClick};
search.init(searchConfig);
//清除历史记录对话框
/*
var config = {
	'title': '清除历史记录',
};
dialog.init(config);
*/  

//历史记录
localStorage.setItem('busiSearchHist', '');
var temp = {'icon':'&#xe617;', 'data':[{'name':'百姓家','url':'/'},{'name':'百姓家2','url':'/'}]};
localStorage.setItem('busiSearchHist', JSON.stringify(temp));
var busiSearchHist = localStorage.getItem('busiSearchHist');
if(busiSearchHist){
	busiSearchHist = JSON.parse(busiSearchHist);
	$('body').append(searchHist.renderData(busiSearchHist));
	searchHist.bindClear(function(){
		var dialogConfig = {
			'title': '清除历史记录',
			'ask': ['确定','取消'],
			'callbacks': [
				function(){
					localStorage.setItem('busiSearchHist', '');
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
