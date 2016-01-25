$.ajax({
	type:"get",
	url:"/test/coupon.json",
	async:true,
	dataType: 'text',
	success: function(data){
		data = JSON.parse(data);
		var data2 = data.data;
		if(data2.length > 0){
			var detail = require('views/coupon/widget/detail/detail');
			$('body').append(detail.renderData(data));
			detail.drawShade();
		}else{
			var noResult = require('public/widget/noResult/noResult');
			var noResultConfig = {
				'tip': '暂时还没有优惠券可用额',
				'icon': 'C'
			};
			noResult.init(noResultConfig);
			noResult.show();
		}
	}
});