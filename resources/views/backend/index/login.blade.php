<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/ch-ui/css/ch-ui.admin.css">
	<link rel="stylesheet" href="/ch-ui/font/css/font-awesome.min.css">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>tata博客管理平台</h2>
		<div class="form">
			@if(session('msg'))
			<p style="color:red">{{session('msg')}}</p>
			@endif
			<form action="{{ asset('/back/login') }}" method="post">
				{{ csrf_field() }}
				<ul>
					<li>
					<input type="text" name="username" class="text"/>
						<span><i class="fa fa-user"></i></span>

					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span></li>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{ url('/back/setCode') }}" alt="验证码" title="点击切换" onclick=" this.src = '{{ url('/back/setCode') }}?' + Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by tata</a></p>
		</div>
	</div>
</body>
</html>
<script>
	$(function(){
		var model = {
			initial:function(){
				model.global();
				model.bind();
			},
			global:function(){
				model.login = new Vue({
					el:"login_box",
					data:{

					},
					method:{
						submit_form:function(){
							var username = $.trim($("input[name=username]").val())
							var password = $.trim($("input[name=password]").val())
							var code = $.trim($("input[name=code]").val())
							console.log(username,password,code)
							return false;
						}
					},
					created:function(){
						model.query()
					}
				})
			},
			query()
		}

	})
</script>