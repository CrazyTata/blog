@include('home.header',['title'=>'关于我'])
<article>
  <h2 class="litle"><span>你，我生命中一个重要的过客，我们之所以是过客，因为你未曾会为我停留。</span>留言</h2>
  <div class="gbko">
  	<textarea style="width:99%;height:500px;font-size:20px;" class="message"></textarea>
  	<button onclick="doSubmit()" style="float: right; width: 5%; text-align: center; line-height: 25px; overflow: hidden; height: 30px; border: 1px solid #fff; background: #3594cb">提交</button>
  </div>
  @if($comment)
  <div class="gbko">
  	<h3>所有留言</h3>
        <ul>
            @foreach($comment as $k=>$v)
                <li>&emsp;<b>【 游客 | {{ $v->create_at }}】：</b>{{ $v->content }}</li>
            @endforeach
        </ul>
  </div>
  @endif
</article>
@include('home.footer')
<script type="text/javascript">
	function doSubmit(){
		var note = $.trim($('.message').val())
		if(note == '') {
		    layer.msg('请先填写留言内容',{icon:5});return;
        }
        var id = "{{ $id }}"
		$.post("{{ url('/message') }}",{id:id,note:note,_token:"{{ csrf_token() }}"},function(msg){
			console.log(msg)
			if(msg.code==1){
				layer.msg(msg.msg,{icon:6});
				window.setTimeout(function(){
					if(id==0){
						window.location.href="{{ url('/message') }}"
					}else{
						window.location.href="{{ url('/p/'.$id) }}"
					}
				},1500)
			}else{
				layer.msg(msg.msg,{icon:5});return;
			}
		})
	}
</script>