@extends('layout.least')
@section('title')
    优惠券-趣吃饭
@endsection
@section('css')
        <link rel="stylesheet" type="text/css" href="/static/css/noResult_23ff162.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/header_49208f4.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/detail_cf9d54c.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/reset_10560ec.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/common_543ad2b.css" />
@endsection
@section('content')
	<div id="noResult" class="hide">
	<p class="iconfont bgColor-7"></p>
	<p class="tip color-3"></p>
</div>
	<header id="common-header" class="bgColor-5 color-4">
	<a id="common-header-back" class="iconfont" onclick="javascript: window.location.href=document.referrer;">&lt;</a>
	<span id="common-header-title" class="size-E"></span>
</header>
	<script type="text/html" id="coupon-detail-script">
	<div id="coupon-detail">
		<p class="color-1">支付订单时会自动加载优惠券，请在有效期内尽快使用哦~</p>
		<ul>
			<%for(var i=0,len=data.length;i<len;i++){%>
				<%if(data[i].used!=1 && data[i].expired!=1){%>
				<li class="bgColor-11">
					<span class="rmb color-4">¥</span><span class="color-4 money"><%=data[i].amount %></span>
					<span class="color-4 desc1">使用此优惠券可减免<%=data[i].amount %>元</span>
					<span class="color-4 desc2">有效期至<%=data[i].end_at %></span>
				</li>
				<%}else{%>
					<li class="bgColor-8">
						<span class="rmb color-12">¥</span><span class="color-12 money"><%=data[i].amount %></span>
						<span class="color-12 desc1">使用此优惠券可减免<%=data[i].amount %>元</span>
						<span class="color-12 desc2">有效期至<%=data[i].end_at %></span>
						<span class="state bgColor-10 color-4"><%=data[i].used==1?'已使用':'已过期'%></span>
					</li>
				<%}%>
			<%}%>
		</ul>
	</div>
</script>
<!--
<div id="coupon-detail">
	<p class="color-1">支付订单时会自动加载优惠券，请在有效期内尽快使用哦~</p>
	<ul>
		<li class="bgColor-11">
			<span class="rmb color-4">¥</span><span class="color-4 money">8</span>
			<span class="color-4 desc1">使用此优惠券可减免8元</span>
			<span class="color-4 desc2">有效期至2015-12-12</span>
		</li>
		<li class="bgColor-8">
			<span class="rmb color-12">¥</span><span class="color-12 money">8</span>
			<span class="color-12 desc1">使用此优惠券可减免8元</span>
			<span class="color-12 desc2">有效期至2015-12-12</span>
			<span class="state bgColor-10 color-4">已过期</span>
		</li>
	</ul>
</div>
-->

@endsection
@section('after_javascript')
	
	<script data-loader type="text/javascript" charset="utf-8" src="/static/js/viewport_7ef41b1.js"></script>
<script data-loader type="text/javascript" charset="utf-8" src="/static/js/jquery_1d9a295.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/js/mod_f179b58.js"></script>
<script type="text/javascript" src="/static/js/noResult_f7fb249.js"></script>
<script type="text/javascript" src="/static/js/header_d21e26d.js"></script>
<script type="text/javascript" src="/static/js/artTemplate_d9f3ee1.js"></script>
<script type="text/javascript" src="/static/js/detail_713b80a.js"></script>
<script type="text/javascript" src="/static/js/coupon.blade_b257d3f.js"></script>
<script type="text/javascript">
		require('public/widget/header/header').setTitle('优惠券');
		require('views/coupon/widget/detail/detail');
	</script>
@endsection