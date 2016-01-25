@extends('layout.least')
@section('title')
    优惠券-趣吃饭
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/common.css"/>
    <!--STYLE_PLACEHOLDER-->
@endsection
@section('content')
	<link rel="import" href="/public/widget/noResult/noResult.html?__inline">
	<link rel="import" href="/public/widget/header/header.html?__inline">
	<link rel="import" href="widget/detail/detail.html?__inline">
@endsection
@section('after_javascript')
	<script src="/public/js/viewport.js" data-loader type="text/javascript" charset="utf-8"></script>
	<script src="../../public/js/jquery.js" data-loader type="text/javascript" charset="utf-8"></script>
	<script src="/public/js/mod.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		require('/public/widget/header/header').setTitle('优惠券');
		require('widget/detail/detail');
	</script>
	<!--RESOURCEMAP_PLACEHOLDER-->
	<!--SCRIPT_PLACEHOLDER-->
@endsection