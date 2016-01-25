@extends('layout.least')
@section('title')
    订单确认-趣吃饭
@endsection
@section('css')
        <link rel="stylesheet" type="text/css" href="/static/css/dialog_6473546.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/header_49208f4.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/confirm.blade_56989c8.css" />
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
<ul id="confirm-order-ul">
	<li>
		<span class="color-1 size-C">支付方式</span><span class="color-1 size-B">支付宝支付</span>
	</li>
	<li>
		<span class="color-1 size-C">备注</span><span class="color-1 size-B input-wrap"><input type="text" class="comment" /><span class="comment-hint">添加备注</span></span>
	</li>
	<li class="li-verticle">
		<div><span class="color-1 size-C">到店食用</span><span class="bgColor-5 bdColor-5 color-4 check">√</span></div>
		<div><span class="color-1 size-C">自提带走</span><span class="check bdColor-10 color-4">√</span></div>
	</li>
	<li>
		<span class="color-1 size-C">手机号</span><span class="color-3 size-A input-wrap"><input type="text" class="phone" /><span class="phone-hint">填写手机号 获取短信提醒 &gt;</span></span>
	</li>
	<li class="li-verticle">
		<div>
			<span class="color-1 size-C">到店时间</span><span class="color-3 size-A input-wrap"><select class="arrival-time"><option></option><option value="12:00">12:00</option></select><span class="arrival-time-hint">商家依据此时间备餐 &gt;</span></span>
		</div>
		<div>
			<span class="color-1 size-C">就餐人数</span>
			<span class="color-3 size-A input-wrap">
				<select class="arrival-num"><option></option><option value="1">1</option></select>
				<span class="arrival-num-hint">&gt;</span>
			</span>
		</div>
	</li>
	<li class="li-verticle menu">
		<div>
			<span class="color-1 size-C">口水鸡</span><span class="color-1 size-B"></span><span class="color-9 size-B"></span>
		</div>
		<div>
			<span class="color-1 size-C">餐盒费</span><span class="color-9 size-B"></span>
		</div>
	</li>
	<table cellspacing="0" cellpadding="0">
		<thead><th class="size-C color-1 align-left">自选双拼套餐</th><th class="align-right size-A color-1">X1</th><th class="align-right color-9 size-A">¥23</th></thead>
		<tbody>
			<tr><td class="size-A color-2 align-left">手擀面</td><td class="align-right size-A color-2">X1999</td><td class="align-right size-A color-9">¥10.00</td></tr>
		</tbody>
	</table>
</ul>	
<footer id="confirm-order-footer">
	<span>
		<span class="color-1 size-C">原价¥15</span>
		<span><span class="color-1 size-C">待支付</span><span class="color-9 size-C">¥15</span></span>
	</span>
	<span class="bgColor-5 color-4 size-C confirm-button">确认下单</span>
</footer>	

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
<script type="text/javascript" src="/static/js/header_d21e26d.js"></script>
<script type="text/javascript" src="/static/js/confirm.blade_bb10c54.js"></script>
@endsection
