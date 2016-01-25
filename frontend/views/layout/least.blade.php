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
         <link rel="stylesheet" type="text/css" href="/static/css/theme_6401b20.css" />
    @yield('css')
</head>
<body>
    @yield('content')
    @yield('before_javascript')
     <script type="text/javascript" src="/static/js/mod_f179b58.js"></script>
<script type="text/javascript" src="/static/js/jquery_1d9a295.js"></script>
<script type="text/javascript" src="/static/js/viewport_7ef41b1.js"></script>
    @yield('after_javascript')
</body>
</html>
