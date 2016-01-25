<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    @yield('meta')
    <title>
    @yield('title')
    </title>
     <!--STYLE_PLACEHOLDER-->
    <link rel="stylesheet" type="text/css" href="/public/css/theme.css">
    @yield('css')
</head>
<body>
    @yield('content')
    @yield('before_javascript')
     <!--SCRIPT_PLACEHOLDER-->
	<script type="text/javascript" src="/public/js/jquery.js"></script>
    <script type="text/javascript" src="/public/js/viewport.js"></script>
    <script type="text/javascript" src="/public/js/mod.js"></script>
    @yield('after_javascript')
</body>
</html>
