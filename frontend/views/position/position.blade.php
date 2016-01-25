@extends('layout.least')
@section('title')
    定位-趣吃饭
@endsection
@section('css')
        <link rel="stylesheet" type="text/css" href="/static/css/header_49208f4.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/search_592b7b4.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/dialog_6473546.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/toCurrent_f914f48.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/searchHist_49b687a.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/noResult_23ff162.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/position.blade_39c5595.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/reset_10560ec.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/common_543ad2b.css" />
@endsection
@section('content')
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
	<p id="position-toCurrent" class="color-5"><span class="iconfont">&#xe617;</span><span class="address">定位到当前位置</span></p>
	<script type="text/html" id="position-result-script">
		<ul id="position-result">
		<% for(var i=0,len=data.length;i<len;i++){ %>
			<li>
				<p class="name color-1"><%=data[i].name %></p>
				<p class="address color-3"><%=data[i].address %></p>
			</li>
		<% } %>
		</ul>
	</script>
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
@endsection
@section('after_javascript')
	
	<script type="text/javascript" data-loader src="http://webapi.amap.com/maps?v=1.3&key=35ba206d77530c8ac7deb2862dd86cc9&plugin=AMap.Geocoder"></script>
<script type="text/javascript" src="/static/js/header_d21e26d.js"></script>
<script type="text/javascript" src="/static/js/search_51f1a89.js"></script>
<script type="text/javascript" src="/static/js/dialog_a0d768a.js"></script>
<script type="text/javascript" src="/static/js/toCurrent_b402448.js"></script>
<script type="text/javascript" src="/static/js/artTemplate_d9f3ee1.js"></script>
<script type="text/javascript" src="/static/js/searchHist_2284a6f.js"></script>
<script type="text/javascript" src="/static/js/noResult_f7fb249.js"></script>
<script type="text/javascript" src="/static/js/location_9e72c42.js"></script>
<script type="text/javascript" src="/static/js/position.blade_60be770.js"></script>
@endsection