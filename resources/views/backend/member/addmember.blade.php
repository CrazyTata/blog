@include('backend.header',['title'=>'添加管理员'])
<article class="page-container" id='member-add'>
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="adminName" name="adminName">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="phones" name="phone">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="select1" class="select" name="adminRole" size="1">
				<option value="">--请选择--</option>
				@foreach($info as $sonList)
				    <option value="{{ $sonList->id }}">{{ $sonList->group_name }}</option>
				@endforeach
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="button" @click='submitForm()' value="提交">
		</div>
	</div>
	</form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="out/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="out/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="out/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
// $(function(){
// 	$('.skin-minimal input').iCheck({
// 		checkboxClass: 'icheckbox-blue',
// 		radioClass: 'iradio-blue',
// 		increaseArea: '20%'
// 	});
	
// 	$("#form-admin-add").validate({
// 		rules:{
// 			adminName:{
// 				required:true,
// 				minlength:4,
// 				maxlength:16
// 			},
// 			password:{
// 				required:true,
// 			},
// 			password2:{
// 				required:true,
// 				equalTo: "#password"
// 			},
// 			sex:{
// 				required:true,
// 			},
// 			phone:{
// 				required:true,
// 				isPhone:true,
// 			},
// 			email:{
// 				required:true,
// 				email:true,
// 			},
// 			adminRole:{
// 				required:true,
// 			},
// 		},
// 		onkeyup:false,
// 		focusCleanup:true,
// 		success:"valid",
// 		submitHandler:function(form){
// 			$(form).ajaxSubmit({
// 				type: 'post',
// 				url: "xxxxxxx" ,
// 				success: function(data){
// 					layer.msg('添加成功!',{icon:1,time:1000});
// 				},
//                 error: function(XmlHttpRequest, textStatus, errorThrown){
// 					layer.msg('error!',{icon:1,time:1000});
// 				}
// 			});
// 			var index = parent.layer.getFrameIndex(window.name);
// 			parent.$('.btn-refresh').click();
// 			parent.layer.close(index);
// 		}
// 	});
// });
(function(){
	var model = {
		initial:function(){
			model.global();
		},
		global:function(){
			model.indexInfo = new Vue({
				el:'#member-add',
				data:{
					groupInfo:{}
				},
				methods:{
					submitForm:function(){
						var adminName = $.trim($("input[name=adminName]").val())
						var password = $.trim($("input[name=password]").val())
						var password2 = $.trim($("input[name=password2]").val())
						var phone = $.trim($("input[name=phone]").val())
						var adminRole = $("#select1 option:selected").val()
						if(adminName==''||password==''|| password2=='' || phone=='' || adminRole==''){
							layer.msg('请把必填项填写完整',{icon:5}); return;
						}
						if(password != password2){
							layer.msg('两次填写的密码不一致',{icon:5}); return;
						}
						model.doSubmit(adminName,password,password2,phone,adminRole)
					}
				},
				created:function(){

				}
			})
		},
		query:function(){
			
		},
		doSubmit:function(adminName,password,password2,phone,adminRole){
			$.ajax({
				url:'{{ asset("/back/member/add") }}',
				type:'post',
				data:{name:adminName,password:password,password_confirmation:password2,telephone:phone,user_group:adminRole,_token:"{{ csrf_token() }}"},
				dataType:'json',
				success:function(msg){
					console.log(msg)
					if(msg.code==0){
						layer.msg(msg.msg,{icon:5}); return;
					}else{
						layer.msg(msg.msg,{icon:6});
						window.location.reload()
					}
				}
			})
		}
	}
	model.initial()
})()
</script> 
<!--/请在上方写此页面业务相关的脚本-->
@include('backend.footer')