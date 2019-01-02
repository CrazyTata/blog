@include('backend.header',['title'=>'友链设置'])
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统设置 <span class="c-gray en">&gt;</span> 友链设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container " id="category-list">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" data-toggle="modal" data-target="#addModal" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加友链</a></span> <span class="r">共有数据：<strong>@{{memberLists.count}}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
		<tr>
			<th scope="col" colspan="9">友链列表</th>
		</tr>
		<tr class="text-c">
			<th width="25"><input type="checkbox" name="" value=""></th>
			<th width="40">ID</th>
			<th width="">友链名</th>
			<th>链接</th>
			<th>排序</th>
			<th>是否删除</th>
			<th width="100">操作</th>
		</tr>
		</thead>
		<tbody>
		<tr v-for="sonLists in memberLists.info" class="text-c">
			<td><input type="checkbox" value="2" name=""></td>
			<td>@{{ sonLists.id }}</td>
			<td>@{{ sonLists.name }}</td>
			<td>@{{ sonLists.link }}</td>
			<td>@{{ sonLists.sort }}</td>
			<td>@{{ sonLists.is_delete==1 ?'否':'是' }}</td>
			<td class="td-manage">
				<a v-if="sonLists['is_delete'] == 1" style="text-decoration:none" @click="productStart(sonLists.id,sonLists['is_delete'])" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe706;</i>
				</a>
				<a v-if="sonLists.is_delete == 2" style="text-decoration:none" @click="productStart(sonLists.id,sonLists.is_delete)" href="javascript:;" title="正常"><i  class="Hui-iconfont">&#xe615;</i>
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
							<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名称：</label>
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
							<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>链接：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" class="input-text" :value="editLists.link" placeholder="" id="link" name="link">
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
					<h4 class="modal-title">添加</h4>
				</div>
				<div class="modal-body">
					<article class="page-container" id='member-add'>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>友链名：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" class="input-text" value="" placeholder="请填写友链名" name="add_name">
							</div>
						</div>
						<br>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" class="input-text" placeholder="请填写排序，数字越大排序越靠前" name="add_sort">
							</div>
						</div>
						<br>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>链接：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" class="input-text" placeholder="请填写链接" name="add_link">
							</div>
						</div>
						<br>
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
                        memberLists:{},
                        editLists:{}
                    },
                    methods:{
                        productStart:function (id,status) {
                            var msg = '您确定删除吗？';
                            if(status==2){
                                msg = '您确定不删除吗？';
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
                            var link=$.trim($("input[name=add_link]").val())
                            if(name==''||link=='') {
                                layer.msg('请先填写必填项',{icon:2});return;
                            }
                            model.doSubmitAdd(name,sort,link)
                        },
                        productEdit:function(id){
                            this.editLists=id
                        },
                        submitEdit:function(){
                            var id=this.editLists.id
                            var name=$.trim($("input[name=name]").val())
                            var sort=$.trim($("input[name=sort]").val())
                            var link=$.trim($("input[name=link]").val())
                            if(name==''||link=='') {
                                layer.msg('请先填写必填项',{icon:2});return;
                            }
                            if(name== this.editLists.name&& sort==this.editLists.sort&& link==this.editLists.link){
                                layer.msg('您没有做任何修改',{icon:5});return;
                            }
                            model.doSubmitEdit(id,name,sort,link)
                        }
                    },
                    created:function () {
                        model.query()
                    }
                })
            },
            query:function () {
                $.get('{{ asset("/back/system/linkList") }}',{},function(msg){
                    console.log(msg);
                    model.memberList.memberLists = msg
				})
            },
            modifyAccess:function (id,status) {
                var type = 2
                if(status==2){
                    type = 1
                }
                $.ajax({
                    url:'{{ asset("/back/system/modifyLink") }}',
                    type:'post',
                    dataType:'json',
                    data:{id:id,is_delete:type,_token:"{{csrf_token()}}"},
                    success:function (msg) {
                        if(msg.code==1){
                            layer.msg(msg.msg,{icon:6})
                            setTimeout(function(){
                                model.query(model.memberList.page,model.memberList.size,model.memberList.search)
                            },1200)
                        }else{
                            layer.msg(msg.msg,{icon:5})
                        }
                    }
                })
            },
            doSubmitAdd:function(name,sort,link){
                $.ajax({
                    url:'{{ asset("/back/system/addLink") }}',
                    type:'post',
                    dataType:'json',
                    data:{name:name,sort:sort,link:link,_token:"{{csrf_token()}}"},
                    success:function (msg) {
                        console.log(msg)
                        if(msg.code==1){
                            layer.msg(msg.msg,{icon:6})
                            setTimeout(function(){
                                model.query(model.memberList.page,model.memberList.size,model.memberList.search)
                                $('#addModal').hide()
                            },1200)
                        }else{
                            layer.msg(msg.msg,{icon:5})
                        }
                    }
                })
            },
            doSubmitEdit:function(id,name,sort,link){
                $.ajax({
                    url:'{{ asset("/back/system/modifyLink") }}',
                    type:'post',
                    dataType:'json',
                    data:{id:id,name:name,sort:sort,link:link,_token:"{{ csrf_token() }}"},
                    success:function (msg) {
                        if(msg.code==1){
                            layer.msg(msg.msg,{icon:6})
                            setTimeout(function(){
                                model.query(model.memberList.page,model.memberList.size,model.memberList.search)
                                $('#myModal').hide()
                            },1200)
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