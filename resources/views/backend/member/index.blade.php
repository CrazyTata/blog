@include('backend.header',['title'=>'用户页'])
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container " id="member-list">
	<div class="text-l"> 初次登陆时间：
		<input type="text" class="layui-input" id="time1" name='time1' style="height: 31px; width:100px!important;display: inline;border-color:#bbb;"> -
		<input type="text" class="layui-input" id="time2" name='time2' style="height: 31px; width:100px!important;display: inline;border-color:#bbb;">
		<!-- <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;"> -->
		<input type="text" class="input-text" style="width:100px" placeholder="输入用户名称" v-model.trim="search.name">
		<input type="text" class="input-text" style="width:100px" placeholder="输入用户电话" v-model.trim="search.telephone">
		<div class="btn btn-success"  @click='submitForm()'><i class="Hui-iconfont">&#xe665;</i> 搜索</div>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" @click="adminAdd()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong>@{{memberLists.count}}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="90">手机</th>
				<th>角色</th>
				<th width="130">加入时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="sonList in memberLists.info" class="text-c">
				<td><input type="checkbox" value="2" name=""></td>
				<td>@{{ sonList.id }}</td>
				<td>@{{ sonList.name }}</td>
				<td>@{{ sonList.telephone }}</td>
				<td>@{{ sonList.group_name }}</td>
				<td>@{{ sonList.create_at }}</td>
				<td v-if="sonList.is_delete == 2" class="td-status"><span class="label radius">已停用</span></td>
				<td v-if="sonList.is_delete == 1" class="td-status"><span class="label label-success radius">已启用</span></td>
				<td class="td-manage">
					<a v-if="sonList.is_delete == 1" style="text-decoration:none" @click="adminStart(sonList.id,sonList.is_delete)" href="javascript:;" title="禁用"><i class="Hui-iconfont">&#xe706;</i>
					</a> 
					<a v-if="sonList.is_delete == 2" style="text-decoration:none" @click="adminStart(sonList.id,sonList.is_delete)" href="javascript:;" title="启用"><i  class="Hui-iconfont">&#xe615;</i>
					</a> 
					<a title="编辑" href="javascript:;" @click="adminEdit(sonList)" data-toggle="modal" data-target="#myModal" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
					<!-- <a title="删除" href="javascript:;" @click="admin_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td> -->
			</tr>
		</tbody>
	</table>
	<div id="pages"></div>

	<div class="modal fade" id="myModal">
	<div class="modal-dialog" style="width: 70%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
				<h4 class="modal-title">编辑</h4>
			</div>
			<div class="modal-body">
				<article class="page-container" id='member-add'>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" class="input-text" :value="editLists.name" placeholder="" id="adminNames" name="adminNames">
						</div>
					</div>
					<br>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" class="input-text" :value="editLists.telephone" placeholder="" id="phones" name="phones">
						</div>
					</div>
					<br>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色：</label>
						<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
							<select id="" class="select" v-model="adminRole" size="1">
								<option value="">--请选择--</option>
							    <option v-for="sonList in groupLists" :value=" sonList.id ">@{{ sonList.group_name }}</option>
							</select></span>
						</div>
					</div>
				</article>
			</div>
			
			<div class="modal-footer">
				<button name="" id="" class="btn btn-primary" @click="submitEdit">保存</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</button>
			</div>
		</div>
	</div>
</div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/out/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/out/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/out/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
	(function(){
	    var model = {
	        initial:function(){
				model.global();
				model.bind();
            },
			global:function(){
				model.memberList = new Vue({
					el:'#member-list',
					data:{
                        size:10,
						page:1,
						search:{name:'',telephone:'',time2:'',time1:''},
						memberLists:{},
						groupLists:{},
						editLists:{},
						adminRole:'',
						originRole:''
					},
					methods:{
						submitForm:function(){
							this.search.time1 = $.trim($("input[name=time1]").val());
							this.search.time2 = $.trim($("input[name=time2]").val());
							model.query(this.page,this.size,this.search)
						},
						adminStart:function (id,status) {
							var msg = '您确定要禁用吗？';
							if(status==2){
								msg = '您确定要启用吗？';
							}
							var index = layer.confirm(msg, {icon: 3, title:'提示'}, function(){
								model.modifyAccess(id,status)
								layer.close(index);
							},function(){
								layer.close(index);
							}) 
							
						},
						adminAdd:function(){
							layer_show('添加管理员','/back/member/1','800','500');
						},
						adminEdit:function(id){
							this.editLists=id
							this.adminRole=id.user_group
							this.originRole=id.user_group
							model.doGetGroupList()
						},
						submitEdit:function(){
							var id=this.editLists.id
							var adminNames=$.trim($("input[name=adminNames]").val())
							var phones=$.trim($("input[name=phones]").val())
							var adminRole=this.adminRole
							console.log(id,adminNames,phones,adminRole)
							if(adminNames==''||adminRole==''||phones==''||id==''){
								layer.msg('请先填写必填项',{icon:5})
							}
							if(this.originRole==adminRole && adminNames== this.editLists.name&& phones==this.editLists.telephone){
								layer.msg('您没有做任何修改',{icon:5})
							}
							model.doSubmitEdit(id,adminNames,phones,adminRole)
						}
					},
					created:function () {
						model.query(this.page,this.size,this.search)
                    }
				})
			},
			query:function (page,size,search) {
				$.ajax({
					url:'{{ asset("/back/member") }}',
					type:'post',
					dataType:'json',
					data:{page:1,size:size,search:search,_token:"{{csrf_token()}}"},
					success:function (msg) {
						model.memberList.page=1
						model.memberList.memberLists = msg
						model.doPage(msg.count);
                    }
				})
            },
            modifyAccess:function (id,status) {
            	var type = 2
            	if(status==2){
            		type = 1
            	}
            	$.ajax({
					url:'{{ asset("/back/member/create") }}',
					type:'get',
					dataType:'json',
					data:{id:id,is_delete:type},
					success:function (msg) {
						if(msg.code==1){
							layer.msg(msg.msg,{icon:6})
							model.query(model.memberList.page,model.memberList.size,model.memberList.search)
						}else{
							layer.msg(msg.msg,{icon:5})
						}
                    }
				})
            },
            doGetGroupList:function(){
            	$.ajax({
					url:'{{ asset("/back/member/1/edit") }}',
					type:'get',
					dataType:'json',
					data:{},
					success:function (msg) {
						model.memberList.groupLists=msg
                    }
				})
            },
			doSubmitEdit:function(id,name,phone,role){
				$.ajax({
					url:'{{ asset("/back/member/1/edit") }}',
					type:'get',
					dataType:'json',
					data:{},
					success:function (msg) {
						model.memberList.groupLists=msg
					}
				})
			},
            doPage:function(list){
            	layui.use('laypage', function(){
					var laypage = layui.laypage;
					//执行一个laypage实例
					laypage.render({
						elem: 'pages' //注意，这里的 test1 是 ID，不用加 # 号
						,count: list //数据总数，从服务端得到
						,limit: model.memberList.size
						,jump: function(obj, first){
						    //obj包含了当前分页的所有参数，比如：
						    //console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
						    //console.log(obj.limit); //得到每页显示的条数
						    //首次不执行
						    if(!first){
						    	model.memberList.page=obj.curr
						    	model.memberList.size=obj.limit
						      	model.query(model.memberList.page,model.memberList.size,model.memberList.search)
						    }
						  }
					});
				});
            },
            bind:function () {
            	
            }
        }
        model.initial()
	})();
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*管理员-编辑*/
// function admin_edit(title,url,id,w,h){
// 	layer_show(title,url,w,h);
// }
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}
</script>
<script>
layui.use('laydate', function(){
  var laydate1 = layui.laydate;
  var laydate2 = layui.laydate;
  //执行一个laydate实例
  laydate1.render({
    elem: '#time1' //指定元素
  });
  laydate2.render({
    elem: '#time2' //指定元素
  });
});
</script>
@include('backend.footer')