@include('backend.header',['title'=>'文章页'])
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 博客管理 <span class="c-gray en">&gt;</span> 博客管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container " id="category-list">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" data-toggle="modal" data-target="#addModal" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加博客</a></span> <span class="r">共有数据：<strong>@{{memberLists.count}}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="11">博客列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">作者</th>
				<th width="">标题</th>
				<th>浏览次数</th>
				<th>回复次数</th>
				<th>所属分类</th>
				<th>最近修改时间</th>
				<th>创建时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="sonLists in memberLists.info" class="text-c">
				<td><input type="checkbox" value="2" name=""></td>
				<td>@{{ sonLists.id }}</td>
				<td>@{{ sonLists.name }}</td>
				<td>@{{ sonLists.title }}</td>
				<td>@{{ sonLists.number }}</td>
				<td>@{{ sonLists.reply_num }}</td>
				<td>@{{ sonLists.cate_name }}</td>
				<td>@{{ sonLists.update_at }}</td>
				<td>@{{ sonLists.create_at }}</td>
				<td v-if="sonLists['is_delete'] == 2" class="td-status"><span class="label radius">已停用</span></td>
				<td v-if="sonLists['is_delete'] == 1" class="td-status"><span class="label label-success radius">已启用</span></td>
				<td class="td-manage">
					<a title="查看" href="javascript:;" @click="productShow(sonLists)" data-toggle="modal" data-target="#showModal" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe667;</i></a>
					<a v-if="sonLists['is_delete'] == 1" style="text-decoration:none" @click="productStart(sonLists.id,sonLists['is_delete'])" href="javascript:;" title="禁用"><i class="Hui-iconfont">&#xe706;</i>
					</a> 
					<a v-if="sonLists.is_delete == 2" style="text-decoration:none" @click="productStart(sonLists.id,sonLists.is_delete)" href="javascript:;" title="启用"><i  class="Hui-iconfont">&#xe615;</i>
					</a> 
					<a title="编辑" href="javascript:;" @click="productEdit(sonLists)" data-toggle="modal" data-target="#myModal" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> </td>
					
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
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类名：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" class="input-text" :value="editLists.name" placeholder="" id="name" name="name">
						</div>
					</div>
					<br>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" class="input-text" :value="editLists.sort" placeholder="" id="sort" name="sort">
						</div>
					</div>
					<br>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>描述：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" class="input-text" :value="editLists.description" placeholder="" id="description" name="description">
						</div>
					</div>
					<br>
					
				</article>
			</div>
			
			<div class="modal-footer">
				<button name="" id="" class="btn btn-primary" @click="submitEdit">保存</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addModal">
	<div class="modal-dialog" style="width: 70%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
				<h4 class="modal-title">增加</h4>
			</div>
			<div class="modal-body">
				<article class="page-container" id='member-add'>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" class="input-text" value="" placeholder="请填写文章标题" name="add_title">
	</div>
</div>
<br>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">关键词：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" class="input-text" value="" placeholder="多个关键字用英文逗号隔开，限10个关键字" name="add_key_words">
	</div>
</div>
<br>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类：</label>
	<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
		<select v-model='cate_id' class="select">
			<option value="0">一级分类</option>
			<option value="1">一级分类</option>
			<option value="11">├二级分类</option>
			<option value="12">├二级分类</option>
			<option value="13">├二级分类</option>
		</select>
		</span> </div>
</div>
<br>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">排序值：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" class="input-text" value="0" placeholder="" name="add_sort">
	</div>
</div>
<br>
<!-- <div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">允许评论：</label>
	<div class="formControls col-xs-8 col-sm-9 skin-minimal">
		<div class="check-box">
			<input type="checkbox" id="checkbox-1">
			<label for="checkbox-1">&nbsp;</label>
		</div>
	</div>
</div> 
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">产品规格：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" name="" id="" placeholder="输入长度" value="" class="input-text" style=" width:25%">
		MM
		<input type="text" name="" id="" placeholder="输入宽度" value="" class="input-text" style=" width:25%">
		MM
		<input type="text" name="" id="" placeholder="输入高度" value="" class="input-text" style=" width:25%">
		MM </div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">产地：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" name="" id="" placeholder="" value="" class="input-text">
	</div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">材质：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" name="" id="" placeholder="" value="" class="input-text">
	</div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">所属供应商：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" name="" id="" placeholder="" value="" class="input-text">
	</div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">价格计算单位：</label>
	<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
		<select class="select">
			<option>请选择</option>
			<option value="1">件</option>
			<option value="2">斤</option>
			<option value="3">KG</option>
			<option value="4">吨</option>
			<option value="5">套</option>
		</select>
		</span> </div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">产品重量：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" name="" id="" placeholder="" value="" class="input-text" style="width:90%">
		kg</div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">产品展示价格：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" name="" id="" placeholder="" value="" class="input-text" style="width:90%">
		元</div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">市场价格：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" name="" id="" placeholder="" value="" class="input-text" style="width:90%">
		元</div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">成本价格：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" name="" id="" placeholder="" value="" class="input-text" style="width:90%">
		元</div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">最低销售价格：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" name="" id="" placeholder="" value="" class="input-text" style="width:90%">
		元</div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">销售开始时间：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:180px;">
	</div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">销售结束时间：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:'#F{$dp.$D(\'datemin\')}' })" id="datemax" class="input-text Wdate" style="width:180px;">
	</div>
</div>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">产品关键字：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<input type="text" name="" id="" placeholder="多个关键字用英文逗号隔开，限10个关键字" value="" class="input-text">
	</div>
</div>-->
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">产品摘要：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)"></textarea>
		<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
	</div>
</div>
<br>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<div class="uploader-thum-container">
			<div id="fileList" class="uploader-list"></div>
			<div id="filePicker">选择图片</div>
			<button id="btn-star" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
		</div>
	</div>
</div>
<br>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">图片上传：</label>
	<div class="formControls col-xs-8 col-sm-9">
		<div class="uploader-list-container">
			<div class="queueList">
				<div id="dndArea" class="placeholder">
					<div id="filePicker-2"></div>
					<p>或将照片拖到这里，单次最多可选300张</p>
				</div>
			</div>
			<div class="statusBar" style="display:none;">
				<div class="progress"> <span class="text">0%</span> <span class="percentage"></span> </div>
				<div class="info"></div>
				<div class="btns">
					<div id="filePicker2"></div>
					<div class="uploadBtn">开始上传</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row cl">
	<label class="form-label col-xs-4 col-sm-2">详细内容：</label>
	<div class="formControls col-xs-8 col-sm-9"> 
		<script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
	</div>
</div>
<br>	
				</article>
			</div>
			
			<div class="modal-footer">
				<button name="" id="" class="btn btn-primary" @click="submitAdd">保存</button>
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
					el:'#category-list',
					data:{
                        size:10,
						page:1,
						search:{name:'',telephone:'',time2:'',time1:''},
						memberLists:{},
						groupLists:{},
						editLists:{}
					},
					methods:{
						submitForm:function(){
							this.search.time1 = $.trim($("input[name=time1]").val());
							this.search.time2 = $.trim($("input[name=time2]").val());
							model.query(this.page,this.size,this.search)
						},
						productStart:function (id,status) {
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
						submitAdd:function(){
							var name=$.trim($("input[name=add_name]").val())
							var sort=$.trim($("input[name=add_sort]").val())
							var desc=$.trim($("input[name=add_desc]").val())
							if(name==''||sort==''||desc=='') {
								layer.msg('请先填写必填项',{icon:2});return;
							}
							model.doSubmitAdd(name,sort,desc)
						},
						productEdit:function(id){
							this.editLists=id
						},
						submitEdit:function(){
							var id=this.editLists.id
							var name=$.trim($("input[name=name]").val())
							var sort=$.trim($("input[name=sort]").val())
							var desc=$.trim($("input[name=description]").val())
							console.log(id,name,sort,desc)
							if(name==''||sort==''||desc=='') {
								layer.msg('请先填写必填项',{icon:2});return;
							}
							if(desc==this.editLists.desc && name== this.editLists.name&& sort==this.editLists.sort){
								layer.msg('您没有做任何修改',{icon:5})
							}
							model.doSubmitEdit(id,name,sort,desc)
						}
					},
					created:function () {
						model.query(this.page,this.size,this.search)
                    }
				})
			},
			query:function (page,size,search) {
				$.ajax({
					url:'{{ asset("/back/product") }}',
					type:'post',
					dataType:'json',
					data:{page:1,size:size,search:search,_token:"{{csrf_token()}}"},
					success:function (msg) {
						console.log(msg)
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
					url:'{{ asset("/back/category/modify") }}',
					type:'post',
					dataType:'json',
					data:{id:id,is_del:type,_token:"{{csrf_token()}}"},
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
            doSubmitAdd:function(name,sort,desc){
            	$.ajax({
					url:'{{ asset("/back/category/add") }}',
					type:'post',
					dataType:'json',
					data:{name:name,sort:sort,description:desc,_token:"{{csrf_token()}}"},
					success:function (msg) {
						console.log(msg)
						if(msg.code==1){
							layer.msg(msg.msg,{icon:6})
							model.query(model.memberList.page,model.memberList.size,model.memberList.search)
							$('#addModal').hide()
						}else{
							layer.msg(msg.msg,{icon:5})
						}
                    }
				})
            },
			doSubmitEdit:function(id,name,sort,desc){
				$.ajax({
					url:'{{ asset("/back/category/modify") }}',
					type:'post',
					dataType:'json',
					data:{id:id,name:name,sort:sort,description:desc,_token:"{{ csrf_token() }}"},
					success:function (msg) {
						if(msg.code==1){
							layer.msg(msg.msg,{icon:6})
							model.query(model.memberList.page,model.memberList.size,model.memberList.search)
							$('#myModal').hide()
						}else{
							layer.msg(msg.msg,{icon:5})
						}
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