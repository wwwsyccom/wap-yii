@extends('layout.least')
@section('title')
    趣吃饭
@endsection
@section('css')
        <link rel="stylesheet" type="text/css" href="/static/css/dialog_6473546.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/header_49208f4.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/login.blade_6eb1a67.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/reset_10560ec.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/common_543ad2b.css" />
@endsection
@section('content')
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
	<header id="common-header" class="bgColor-5 color-4">
	<a id="common-header-back" class="iconfont" onclick="javascript: window.location.href=document.referrer;">&lt;</a>
	<span id="common-header-title" class="size-E"></span>
</header>
	<div id="login" class="color-3">
		<p class="bdColor-8">
			<span class="phone-hint input-hint color-3">请输入手机号码</span>
			<input type="number" class="phone" />
		</p>
		<p>
			<input type="text" class="code-input" readonly="true" />
			<span class="code-input-hint input-hint color-3">请输入手机中的短信验证码</span>
			<span class="code-send color-5 bdColor-5">发送验证码</span>
		</p>
	</div>
	<p id="login-button" class="bgColor-5 color-4">登录</p>
@endsection
@section('after_javascript')
	
	<script data-loader type="text/javascript" charset="utf-8" src="/static/js/viewport_7ef41b1.js"></script>
<script data-loader type="text/javascript" charset="utf-8" src="/static/js/jquery_1d9a295.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/js/mod_f179b58.js"></script>
<script type="text/javascript" src="/static/js/dialog_a0d768a.js"></script>
<script type="text/javascript" src="/static/js/header_d21e26d.js"></script>
<script type="text/javascript" src="/static/js/login.blade_4366852.js"></script>
@endsection