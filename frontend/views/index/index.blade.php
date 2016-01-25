@extends('layout.least')
@section('title')
    趣吃饭
@endsection
@section('css')
        <link rel="stylesheet" type="text/css" href="/static/css/dialog_6473546.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/header_bfe288e.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/banner_c8896d0.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/nearby1_0dbd72b.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/nearby_d3e6510.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/loading_0f8db7c.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/index.blade_a331cec.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/reset_10560ec.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/common_543ad2b.css" />
@endsection
@section('content')
	<div id="index-header">
	<i  id="index-header-drop" class="iconfont">&#xe6fe;</i>
	<a href="/position" class="address"><i class="iconfont">&#xe604;</i><span>嘉华大厦</span><i class="iconfont">&#xe604;</i></a>
	<a class="iconfont" href="/busiSearch">&#xe617;</a>
</div>
<div id="index-header-side-wraper" class="hide">
	<div id='index-header-side'>
		<a>我的订单</a>
		<a href="/coupon">优惠券</a>
		<a class="contact">联系我们</a>
		<a id="index-header-logout">退出登录</a>
	</div>
</div>
	<div id="banner-wrap">
	<div class="hd">
		<ul></ul>
	</div>
	<div class="bd">
		<ul>
				<li><a><img src="/static/img/tb1_3ebe5e6.jpg" /></a></li>
		</ul>
	</div>
</div>
	<section id="index-nearby-section" class="hide">
<h1 class="section-title color-5"><span class="iconfont">&#xe6fe;</span><span class="color-1">附近店铺</span></h1>
<ul id="index-nearby">
<script type="text/html" id="index-nearby-script">
	    <%for(var i = 0, len = data.length; i < len; i++){%>
			<li>
				<div>
					<div class="busi-img">
						<img src = "<%=data[i].photo %>" />
					</div>
					<div>
						<div class="name-wrapper"><span class="name"><%=data[i].name %></span><span class="reservable <%=data[i].reservableHide %>">可订座</span></div>
						<div class="address"><%=data[i].location_info %></div>
					</div>
					<div>
						<div class="state"><%=data[i].status==0?'营业中':'休息中' %></div>
						<div class="distance"><%=data[i].distance %></div>
					</div>
				</div>
				<div class="hide">
					特价菜品限时秒杀
				</div>
			</li>
		<%}%>
</script>
</ul>
<!--
<section id="index-nearby">
	<ul>
		<li>
			<div>
				<div class="busi-img">
					<img src = "img/busi.jpg" />
				</div>
				<div>
					<div><span class="name">瓦罐香沸</span><span class="reservable">可订座</span></div>
					<div class="address">苏州街78号中关村购物中心</div>
				</div>
				<div>
					<div class="state">营业中</div>
					<div class="distance">50m</div>
				</div>
			</div>
			<div>
				特价菜品限时秒杀
			</div>
		</li>
	</ul>
</section>
-->

</section>
	<div class="color-1 hide" id="loading-footer">
	<span class="circle bdColor-5"></span><span>正在加载...</span>
</div>
	<!--
	<link rel="import" href="/public/widget/noResult/noResult.html?__inline">
	-->
	<div id="dialog-wraper" class="hide">
	<div class="outer">
		<h1 class="title color-1"></h1>
		<div class="ask color-13">
			<!--
			<span id="dialog-confirm">确定</span>
			<span id="dialog-cancel">取消</span>
			-->
		</div>
	</div>
</div>
@endsection
@section('after_javascript')
	
	<script type="text/javascript" src="/static/js/dialog_a0d768a.js"></script>
<script type="text/javascript" src="/static/js/header_a3c9719.js"></script>
<script type="text/javascript" src="/static/js/TouchSlide_9724ff1.js"></script>
<script type="text/javascript" src="/static/js/banner_55caaf3.js"></script>
<script type="text/javascript" src="/static/js/artTemplate_d9f3ee1.js"></script>
<script type="text/javascript" src="/static/js/nearby1_241c5c2.js"></script>
<script type="text/javascript" src="/static/js/nearby_a45a41d.js"></script>
<script type="text/javascript" src="/static/js/loading_71180bd.js"></script>
<script type="text/javascript" src="/static/js/index.blade_a2c745f.js"></script>
@endsection