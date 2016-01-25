@extends('layout.least')
@section('title')
    商户搜索-趣吃饭
@endsection
@section('css')
        <link rel="stylesheet" type="text/css" href="/static/css/header_49208f4.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/search_592b7b4.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/dialog_6473546.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/nearby1_0dbd72b.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/searchHist_49b687a.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/noResult_23ff162.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/asso_3f29b17.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/busiSearch.blade_85ea4e0.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/reset_10560ec.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/common_543ad2b.css" />
@endsection
@section('content')
	<!-- 初始显示的组件 -->	
	<header id="common-header" class="bgColor-5 color-4">
	<a id="common-header-back" class="iconfont" onclick="javascript: window.location.href=document.referrer;">&lt;</a>
	<span id="common-header-title" class="size-E"></span>
</header>
	<div id="search">
	<div class="search-input-wrap color-3 bgColor-6">
		<i class="iconfont">&#xe617;</i>
		<span class="input-wrap">
			<span class="input-hint"></span>
			<input type="text" id="search-input" />
		</span>
	</div>
	<div id="search-button" class="color-4 bgColor-5">搜索</div>
</div>
	<!-- 初始隐藏的组件 -->	
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

	<script type="text/html" id="searchHist-script">
	<section id="searchHist">
		<h1 class="color-3 bgColor-6">历史搜索记录</h1>
		<ul>
		    <%for(var i = 0, len = data.length; i < len; i++){%>
			<li><a href="<%=data[i].url %>"></a><span class="iconfont color-3"><%=icon %></span><span class="name color-1"><%=data[i].name %></span></li>
			<%}%>
		</ul>
		<footer class="clear color-3">清空历史搜索记录</footer>
	</section>
</script>
	<div id="noResult" class="hide">
	<p class="iconfont bgColor-7"></p>
	<p class="tip color-3"></p>
</div>
	<script type="text/html" id="busi-asso-script">
	<ul id="busi-asso">
	<%for(var i=0,len=data.length;i<len;i++){%>
		<li><span class="name color-1"><%=data[i].name %></span><span class="state color-3"><%=data[i].distance %></span></li>
	<%}%>
	</ul>
</script>
	<!--
	<link rel="import" href="/public/widget/dialog/dialog.html?__inline">
	<link rel="import" href="widget/asso/asso.html/?__inline">
	-->
@endsection
@section('after_javascript')
	
	<script type="text/javascript" src="/static/js/header_d21e26d.js"></script>
<script type="text/javascript" src="/static/js/search_51f1a89.js"></script>
<script type="text/javascript" src="/static/js/dialog_a0d768a.js"></script>
<script type="text/javascript" src="/static/js/artTemplate_d9f3ee1.js"></script>
<script type="text/javascript" src="/static/js/nearby1_241c5c2.js"></script>
<script type="text/javascript" src="/static/js/searchHist_2284a6f.js"></script>
<script type="text/javascript" src="/static/js/noResult_f7fb249.js"></script>
<script type="text/javascript" src="/static/js/asso_846ad72.js"></script>
<script type="text/javascript" src="/static/js/busiSearch.blade_bbae585.js"></script>
@endsection
