@extends('layout.least')
@section('title')
    商户搜索-趣吃饭
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/common.css"/>
    <!--STYLE_PLACEHOLDER-->
@endsection
@section('content')
	<!-- 初始显示的组件 -->	
	<link rel="import" href="/public/widget/header/header.html?__inline">
	<link rel="import" href="/public/widget/search/search.html?__inline">
	<!-- 初始隐藏的组件 -->	
	<link rel="import" href="/public/widget/dialog/dialog.html?__inline">
	<link rel="import" href="/public/widget/nearby1/nearby1.html?__inline">
	<link rel="import" href="/public/widget/searchHist/searchHist.html?__inline">
	<link rel="import" href="/public/widget/noResult/noResult.html?__inline">
	<link rel="import" href="widget/asso/asso.html?__inline">
	<!--
	<link rel="import" href="/public/widget/dialog/dialog.html?__inline">
	<link rel="import" href="widget/asso/asso.html/?__inline">
	-->
@endsection
@section('after_javascript')
	<!--RESOURCEMAP_PLACEHOLDER-->
	<!--SCRIPT_PLACEHOLDER-->
@endsection
