@extends('layout.least')
@section('title')
    趣吃饭
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/common.css"/>
    <!--STYLE_PLACEHOLDER-->
@endsection
@section('content')
	<link rel="import" href="widget/header/header.html?__inline">
	<link rel="import" href="widget/banner/banner.html?__inline">
	<link rel="import" href="widget/nearby/nearby.html?__inline">
	<link rel="import" href="/public/widget/loading-footer/loading.html?__inline">
	<!--
	<link rel="import" href="/public/widget/noResult/noResult.html?__inline">
	-->
	<link rel="import" href="/public/widget/dialog/dialog.html?__inline">
@endsection
@section('after_javascript')
	<!--RESOURCEMAP_PLACEHOLDER-->
	<!--SCRIPT_PLACEHOLDER-->
@endsection