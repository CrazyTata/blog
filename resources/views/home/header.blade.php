<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}_tata个人博客 - 一个站在php代码中学习的个人博客网站</title>
    <meta name="keywords" content="个人博客,tata个人博客,个人博客模板,tata" />
    <meta name="description" content="tata个人博客" />
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
                <li><a href="/">网站首页</a></li>
                {{--<li><a href="/share">模板分享</a></li>--}}
                {{--<li><a href="/study">学无止境</a></li>--}}
                {{--<li><a href="/life">慢生活</a></li>--}}
                <li><a href="/message">留言</a></li>
                <li><a href="/about">关于我</a></li>
            </ul>
        </div>
        <nav class="topnav" id="topnav">
            <ul>
                <li><a href="/">网站首页</a></li>
                {{--<li><a href="/share">模板分享</a></li>--}}
                {{--<li><a href="/study">学无止境</a></li>--}}
                {{--<li><a href="/life">慢生活</a></li>--}}
                <li><a href="/message">留言</a></li>
                <li><a href="/about">关于我</a></li>
            </ul>
        </nav>
    </div>
</header>