@include('home.header',['title'=>'文章详情页'])
<link href="{{ asset('home/css/info.css') }}" rel="stylesheet">

<article>
    <div class="infos">
        <div class="newsview">
            <h2 class="intitle">您现在的位置是：<a href="{{ url('/') }}">网站首页</a>&nbsp;&gt;&nbsp;<a href="/">{{ $data->cate_name }}</a></h2>
            <h3 class="news_title">{{ $data->title }}</h3>
            <div class="news_author"><span class="au01">{{ $data->name }}</span><span class="au02">{{ $data->create_at }}</span><span class="au03">共<b>{{ $data->number }}</b>人围观</span></div>
            <div class="tags">@foreach( explode(',',$data->key_words) as $v)<a href="#">{{ $v }}</a> @endforeach</div>
            <div class="news_infos">
               {!! $data->content !!}
            </div>
        </div>
    </div>
    <div class="nextinfo">
        <p>上一篇：@if($pre)<a href="{{ url($product_url.'/'.$pre['id']) }}" >{{ $pre->title }}</a>@else 已经是第一篇了 @endif</p>
        <p>下一篇：@if($nex)<a href="{{ url($product_url.'/'.$nex['id']) }}" >{{ $nex->title }}</a>@else 已经是最后一篇了 @endif</p>
    </div>
    <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
            @foreach($other_article as $k=>$v)
            <li><a href="{{ url($product_url.'/'.$v->id) }}" target="_blank" title="{{ $v->title }}">{{ $v->title }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="news_pl">
        <h2>文章评论</h2>
        <ul>
            @foreach($comment as $k=>$v)
                <li>&emsp;<b>【 游客 | {{ $v->create_at }}】：</b>{{ $v->content }}</li>
            @endforeach
        </ul>
        <div class="tags"><a href="{{ url('/message/'.$data->id) }}">我要评论</a> </div>
    </div>


</article>
@include('home.footer')
