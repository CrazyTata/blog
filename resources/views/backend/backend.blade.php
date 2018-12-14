<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/out/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/out/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/out/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/out/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/out/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/out/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/out/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/out/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>@yield('title')</title>
    <meta name="keywords" content="tata 博客后台管理系统">
    <meta name="description" content="tata 博客后台管理系统。">
</head>
<body>
@section('content')
@show
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/out/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/out/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/out/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/out/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/out/static/h-ui/js/H-ui.min.js"></script>
@section('js')
@show
</body>
</html>