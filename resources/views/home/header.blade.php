<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }} {{ $base['website_title'] }}</title>
    <meta name="keywords" content="{{ $base['website_keywords'] }}" />
    <meta name="description" content="{{ $base['website_description'] }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="home/css/base.css" rel="stylesheet">
    <link href="home/css/index.css" rel="stylesheet">
    <link href="home/css/m.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="home/js/modernizr.js"></script>
    <![endif]-->
    <script>
        window.onload = function ()
        {
            var oH2 = document.getElementsByTagName("h2")[0];
            var oUl = document.getElementsByTagName("ul")[0];
            oH2.onclick = function ()
            {
                var style = oUl.style;
                style.display = style.display == "block" ? "none" : "block";
                oH2.className = style.display == "block" ? "open" : ""
            }
        }
    </script>
</head>
<body>
<header>
    <div class="tophead">
        <div class="logo"><a href="/">tata个人博客</a></div>
        <div id="mnav">
            <h2><span class="navicon"></span></h2>
            <ul>
                @foreach($nav as $k=>$v)
                <li><a href=" {{url($v->url)}} ">{{ $v->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <nav class="topnav" id="topnav">
            <ul>
                @foreach($nav as $k=>$v)
                <li><a href=" {{url($v->url)}} ">{{ $v->name }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>