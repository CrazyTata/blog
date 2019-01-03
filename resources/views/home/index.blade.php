@include('home.header',['title'=>'首页'])
<article>
  <div class="banner">
    <div id="sucaihuo" class="fader"> <img class="slide" src="home/images/banner01.jpg"> <img class="slide" src="home/images/banner02.jpg"> <img class="slide" src="home/images/banner03.jpg">
      <div class="fader_controls">
        <div class="page prev" data-target="prev">&lsaquo;</div>
        <div class="page next" data-target="next">&rsaquo;</div>
        <ul class="pager_list">
        </ul>
      </div>
    </div>
    <script>
        $(function() {
            $('#sucaihuo').easyFader();
        });
    </script>
  </div>

  <div class="newblogs">
    <h2 class="hometitle">最新文章</h2>
    <ul>
        @foreach($article['info'] as $k=>$v)
        <li>
            <h3 class="blogtitle"><span><a href="{{ url($cate_url.'/'.$v->id) }}" title="css3" target="_blank"  class="classname">{{ $v->cate_name }}</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >{{ $v->title }}</a></h3>
            <div class="bloginfo"><span class="blogpic"><a href="{{ url($cate_url.'/'.$v->id) }}" title="{{ $v->title }}"><img src="home/images/t01.jpg" alt="{{ $v->title }}" /></a></span>
              <p><div style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:450px;height: 180px;">{!! $v->content !!}</div></p>
            </div>
            <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">{{ $v->create_at }}</span><span class="viewnum f_l">浏览（<a href="{{ url($cate_url.'/'.$v->id) }}">{{ $v->number }}</a>）</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">阅读原文>></a></span></div>
            <div class="line"></div>
        </li>
        @endforeach
            <li> <span class="blogpic"><a href="{{ url($cate_url.'/'.$v->id) }}"><img src="home/images/text02.jpg"></a></span>
                <h2 class="blogtitle"><a href="{{ url($cate_url.'/'.$v->id) }} ">{{ $v->title }}</a></h2>
                <div class="bloginfo">
                    <p><div style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:450px;height: 180px;">{!! $v->content !!}</div></p>
                </div>
                <div class="autor"><span class="lm"><a href="{{ url($cate_url.'/'.$v->id) }}" title="{{ $v->title }}" target="_blank" class="classname">{{ $v->cate_name }}</a></span><span class="dtime">{{ $v->create_at }}</span><span class="viewnum">浏览（<a href="{{ url($cate_url.'/'.$v->id) }}">{{ $v->create_at }}</a>）</span><span class="readmore"><a href="{{ url($cate_url.'/'.$v->id) }}">阅读全文</a></span></div>
            </li>

    </ul>
  </div>
  <div class="rbox">
    <div class="paihang">
      <h2 class="hometitle">人气排行</h2>
      <ul>
          @foreach($hit['info'] as $k=>$v)
              <li><b><a href="{{ url($cate_url.'/'.$v->id) }}" target="_blank"><span style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:200px;">{{ $v->title }}</span></a></b>
                  <p><div style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:300px;height: 100px;">{!! $v->content !!}  </div>...</p>
              </li>
          @endforeach
      </ul>
    </div>
    <div class="paihang">
      <h2 class="hometitle">站长推荐</h2>
      <ul>
          @foreach($hot['info'] as $k=>$v)
              <li><b><a href="{{ url($cate_url.'/'.$v->id) }}" target="_blank"><span style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:200px;">{{ $v->title }}</span></a></b>
                  <p><div style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:300px;height: 100px;">{!! $v->content !!}  </div>...</p>
              </li>
          @endforeach
      </ul>
    </div>
    <div class="links">
      <h2 class="hometitle">友情链接</h2>
      <ul>
          @foreach($links as $k=>$v)
              <li><a href="{{ url($v['link']) }}" title="{{ $v['name'] }}">{{ $v['name'] }}</a></li>
          @endforeach
      </ul>
    </div>
    <div class="weixin">
      <h2 class="hometitle">官方微信</h2>
      <ul>
        <img src="home/images/wx.jpg">
      </ul>
    </div>
  </div>
</article>
@include('home.footer')
