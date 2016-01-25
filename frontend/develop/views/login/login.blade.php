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
	<link rel="import" href="/public/widget/dialog/dialog.html?__inline">
	<link rel="import" href="/public/widget/header/header.html?__inline">
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
	<script src="/public/js/viewport.js" data-loader type="text/javascript" charset="utf-8"></script>
	<script src="../../public/js/jquery.js" data-loader type="text/javascript" charset="utf-8"></script>
	<script src="/public/js/mod.js" type="text/javascript" charset="utf-8"></script>
	<!--RESOURCEMAP_PLACEHOLDER-->
	<!--SCRIPT_PLACEHOLDER-->
@endsection