<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }} {{ $base['website_title'] }}</title>
    <meta name="keywords" content="{{ $base['website_keywords'] }}" />
    <meta name="description" content="{{ $base['website_description'] }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('home/css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/m.css') }}" rel="stylesheet">

    <script src="{{ asset('home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.easyfader.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/out/lib/layer/2.4/layer.js') }}"></script>
    <!--[if lt IE 9]>
    <script src="{{ asset('home/js/modernizr.js') }}"></script>
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
    <div id="mnav">
        <h2><span class="navicon"></span></h2>
        <ul>
            @foreach($nav as $k=>$v)
            <li><a href=" {{url($v->url)}} ">{{ $v->name }}</a></li>
            @endforeach
        </ul>
        </div>
    <div class="topnav">
        <nav>
            <ul>
                @foreach($nav as $k=>$v)
                <li><a href=" {{url($v->url)}} ">{{ $v->name }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>