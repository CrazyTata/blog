@include('home.header',['title'=>'首页'])
<!-- <div class="picshow">
  <ul>
    <li><a href="/"><i><img src="home/images/b01.jpg"></i>
        <div class="font">
          <h3>个人博客模板《早安》</h3>
        </div>
      </a></li>
    <li><a href="/"><i><img src="home/images/b02.jpg"></i>
        <div class="font">
          <h3>个人博客模板《早安》</h3>
        </div>
      </a></li>
    <li><a href="/"><i><img src="home/images/b03.jpg"></i>
        <div class="font">
          <h3>个人博客模板《早安》</h3>
        </div>
      </a></li>
    <li><a href="/"><i><img src="home/images/b04.jpg"></i>
        <div class="font">
          <h3>个人博客模板《早安》</h3>
        </div>
      </a></li>
    <li><a href="/"><i><img src="home/images/b05.jpg"></i>
        <div class="font">
          <h3>个人博客模板《早安》</h3>
        </div>
      </a></li>
  </ul>
</div> -->
<div class="picshow">
  <div>
    <a href="/"><i><img width="100%" height="476px" src="home/images/timg3.jpg"></i></a>
  </div>
</div>
<article>
  <div class="blogs">
    @foreach($article['info'] as $k=>$v)
    <li> <span class="blogpic"><a href="{{ url($cate_url.'/'.$v->id) }}"><img src="home/images/text02.jpg"></a></span>
      <h2 class="blogtitle"><a href="{{ url($cate_url.'/'.$v->id) }} ">{{ $v->title }}</a></h2>
      <div class="bloginfo">
        <p><div style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:500px;height: 180px;">{!! $v->content !!}</div></p>
      </div>
      <div class="autor"><span class="lm"><a href="{{ url($cate_url.'/'.$v->id) }}" title="{{ $v->title }}" target="_blank" class="classname">{{ $v->cate_name }}</a></span><span class="dtime">{{ $v->create_at }}</span><span class="viewnum">浏览（<a href="{{ url($cate_url.'/'.$v->id) }}">{{ $v->create_at }}</a>）</span><span class="readmore"><a href="{{ url($cate_url.'/'.$v->id) }}">阅读全文</a></span></div>
    </li>
    @endforeach
  </div>
  <div class="sidebar">
    <div class="about">
      <div class="avatar"> <img src="home/images/avatar.jpg" alt=""> </div>
      <p class="abname">{{ $boss['nickname'] }} | {{ $boss['name'] }}</p>
      <p class="abposition">{{ $boss['job'] }}</p>
      <div class="abtext"> {{ $boss['description'] }} </div>
    </div>
    <div class="search">
      <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
        <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字'}" type="text">
        <input name="show" value="title" type="hidden">
        <input name="tempid" value="1" type="hidden">
        <input name="tbname" value="news" type="hidden">
        <input name="Submit" class="input_submit" value="搜索" type="submit">
      </form>
    </div>
    <div class="cloud">
      <h2 class="hometitle">标签云</h2>
      <ul>
        @foreach($cate['info'] as $k=>$v)
        <a href="#">{{ $v->name }}</a>
        @endforeach
      </ul>
    </div>
    <div class="paihang">
      <h2 class="hometitle">点击排行</h2>
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