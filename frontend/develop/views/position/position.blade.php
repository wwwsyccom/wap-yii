@extends('layout.least')
@section('title')
    定位-趣吃饭
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/common.css"/>
    <!--STYLE_PLACEHOLDER-->
@endsection
@section('content')
	<link rel="import" href="/public/widget/header/header.html?__inline">
	<link rel="import" href="/public/widget/search/search.html?__inline">
	<link rel="import" href="/public/widget/dialog/dialog.html?__inline">
	<link rel="import" href="widget/toCurrent/toCurrent.html?__inline">
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
	<link rel="import" href="/public/widget/searchHist/searchHist.html?__inline">
	<link rel="import" href="/public/widget/noResult/noResult.html?__inline">
@endsection
@section('after_javascript')
    <script type="text/javascript" data-loader src="http://webapi.amap.com/maps?v=1.3&key=35ba206d77530c8ac7deb2862dd86cc9&plugin=AMap.Geocoder"></script>
	<!--RESOURCEMAP_PLACEHOLDER-->
	<!--SCRIPT_PLACEHOLDER-->
@endsection