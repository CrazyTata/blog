@include('backend.header',['title'=>'基本设置'])
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	站长设置
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container system-boss">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						昵称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" v-model.trim="systemBase.nickname" class="input-text">
					</div>
				</div>
				<br>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						姓名：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" v-model.trim="systemBase.name" class="input-text">
					</div>
				</div>
				<br>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						描述：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" v-model.trim="systemBase.description" class="input-text">
					</div>
				</div>
				<br>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						工作：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" v-model.trim="systemBase.job" class="input-text">
					</div>
				</div>
				<br>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						mail：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" v-model.trim="systemBase.mail" class="input-text">
					</div>
				</div>
				<br>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>QQ：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" v-model.trim="systemBase.qq" class="input-text">
					</div>
				</div>
				<br>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>微信：</label>
					
					<div class="formControls col-xs-8 col-sm-9">
						<div class="uploader-thum-container">
							<div id="fileList" class="uploader-list"></div>
							<button type="button" class="layui-btn btn-primary" id="uploadFiles">
									<i class="Hui-iconfont">&#xe642;</i>上传图片
								</button>
							<img width="400" height="400" id="fileSrc" :src="systemBase.src" />
						</div>
					</div>
					
				</div>
			<br>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input type="button" @click="configSave" class="btn btn-primary radius" value="保存" name="">
			</div>
		</div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="out/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="out/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="out/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="out/lib/jquery.validation/1.14.0/messages_zh.js"></script>

<script type="text/javascript">
$(function(){
	var model = {
		initial:function(){
			model.global();
			model.bind();
		},
		global:function(){
			model.father = new Vue({
				el:'.system-boss',
				data:{
					list:{},
					systemBase:{
						nickname:'',
						name:'',
						job:'',
						description:'',
						mail:'',
						qq:'',
						wechat:'',
						src:''
					}
				},
				methods:{
					configSave:function(){
						this.systemBase.src=$('#fileSrc').attr('src')
						model.doConfigSave(this.systemBase)
					}
				},
				created:function(){
					model.query()
				}
			})
		},
		query:function(){
			$.get("{{ asset('/back/system/2') }}",{},function(msg){
				model.father.systemBase=msg
			})
		},
		doConfigSave:function(info){
			info._token="{{ csrf_token() }}"
			info.id=2
			$.post("{{ asset('/back/system') }}",info,function(msg){
				console.log(msg)
				if(msg.code==1){
					layer.msg(msg.msg,{icon:6})
					model.query()
				}else{
					layer.msg(msg.msg,{icon:5})
				}
			})
		},
		bind:function(){

		}
	}

	model.initial()
});
</script>

<script type="text/javascript">
	layui.use('upload', function(){
	var upload = layui.upload;
	//执行实例
	var uploadInst = upload.render({
	elem: '#uploadFiles' //绑定元素
	,url: '/back/product/upload' //上传接口
	,data: {'_token':"{{ csrf_token() }}"}
	,done: function(res){
		if(res.code==1){
			$('#fileSrc').attr('src',res.msg)
			layer.msg('上传成功',{icon:6})
		}else{
			layer.msg(res.msg,{icon:5})
		}
	  
	  console.log(res)
	}
	,error: function(){
	  //请求异常回调
	}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
@include('backend.footer')
