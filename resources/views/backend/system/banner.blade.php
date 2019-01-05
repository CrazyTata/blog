@include('backend.header',['title'=>'banner设置'])
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统设置 <span class="c-gray en">&gt;</span> banner设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container " id="category-list">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" data-toggle="modal" data-target="#addModal" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加banner</a></span> <span class="r">共有数据：<strong>@{{memberLists.count}}</strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th scope="col" colspan="11">博客列表</th>
        </tr>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="40">ID</th>
            <th width="">描述</th>
            <th>banner</th>
            <th width="100">是否已启用</th>
            <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="sonLists in memberLists.info" class="text-c">
            <td><input type="checkbox" value="2" name=""></td>
            <td>@{{ sonLists.id }}</td>
            <td>@{{ sonLists.desc }}</td>
            <td><img :src="sonLists.url" width="100px" height="100px"></td>
            <td v-if="sonLists['is_delete'] == 2" class="td-status"><span class="label radius">已停用</span></td>
            <td v-if="sonLists['is_delete'] == 1" class="td-status"><span class="label label-success radius">已启用</span></td>
            <td class="td-manage">
                <a title="查看" href="javascript:void(0)" @click="productShow(sonLists)" data-toggle="modal" data-target="#showModal" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe667;</i></a>
                <a v-if="sonLists['is_delete'] == 1" style="text-decoration:none" @click="productStart(sonLists.id,sonLists['is_delete'])" href="javascript:void(0)" title="禁用"><i class="Hui-iconfont">&#xe706;</i>
                </a>
                <a v-if="sonLists.is_delete == 2" style="text-decoration:none" @click="productStart(sonLists.id,sonLists.is_delete)" href="javascript:void(0)" title="启用"><i  class="Hui-iconfont">&#xe615;</i>
                </a>
                <a title="编辑" href="javascript:void(0)" @click="productEdit(sonLists)" data-toggle="modal" data-target="#editModal" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> </td>

        </tr>

        </tbody>
    </table>
	<div id="pages"></div>

    <!-- pageAdd start-->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog" style="width: 70%;max-height: 88%;overflow-y: scroll;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                    <h4 class="modal-title">增加</h4>
                </div>
                <div class="modal-body">
                    <article class="page-container" id='member-add'>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>描述：</label>
                            <div class="formControls col-xs-8 col-sm-9">
                                <input type="text" class="input-text" placeholder="请填写图片描述" name="desc">
                            </div>
                        </div>
                        <br>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">图片上传：</label>
                            <div class="formControls col-xs-8 col-sm-9">
                                <div class="uploader-thum-container">
                                    <div id="fileList" class="uploader-list"></div>
                                    <button type="button" class="layui-btn btn-primary" id="uploadFiles">
                                        <i class="Hui-iconfont">&#xe642;</i>上传图片
                                    </button>
                                    <img width="200" height="200" id='uploadSrc' src='/no-picture.png' />
                                </div>
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
    <!-- pageAdd end-->

    <!-- pageEdit start-->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog" style="width: 70%;max-height: 88%;overflow-y: scroll;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                    <h4 class="modal-title">修改</h4>
                </div>
                <div class="modal-body">
                    <article class="page-container" id='member-add'>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>banner ID：</label>
                            <div class="formControls col-xs-8 col-sm-9">
                                <input type="text" class="input-text" v-model.trim="editLists.id" placeholder="" name="">
                            </div>
                        </div>
                        <br>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>描述：</label>
                            <div class="formControls col-xs-8 col-sm-9">
                                <input type="text" class="input-text" v-model.trim="editLists.desc" placeholder="" name="">
                            </div>
                        </div>
                        <br>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">图片上传：</label>
                            <div class="formControls col-xs-8 col-sm-9">
                                <div class="uploader-thum-container">
                                    <div id="fileList" class="uploader-list"></div>
                                    <button type="button" class="layui-btn btn-primary" id="uploadFiles_edit">
                                        <i class="Hui-iconfont">&#xe642;</i>上传图片
                                    </button>
                                    <img width="200" height="200" id='uploadSrc_edit' :src='editLists.url' />
                                </div>
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
    <!-- pageEdit end-->

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
                            var msg = '您确定不显示吗？';
                            if(status==2){
                                msg = '您确定要显示吗？';
                            }
                            var index = layer.confirm(msg, {icon: 3, title:'提示'}, function(){
                                model.modifyAccess(id,status)
                                layer.close(index);
                            },function(){
                                layer.close(index);
                            })

                        },
                        submitAdd:function(){
                            var desc=$.trim($("input[name=desc]").val())
                            // var sort=$.trim($("input[name=add_sort]").val())
                            // var url=$('#uploadSrc_edit').attr('src')
                            var url=$('#uploadSrc').attr('src')
                            if(desc==''||url=='') {
                                layer.msg('请先填写必填项',{icon:2});return;
                            }
                            model.doSubmitAdd(desc,url)
                        },
                        productEdit:function(id){
                            this.editLists=id
                        },
                        submitEdit:function(){
                            var id=this.editLists.id
                            var url=$('#uploadSrc_edit').attr('src')
                            var desc=$.trim($("input[name=desc]").val())
                            if(desc==''||url=='') {
                                layer.msg('请先填写必填项',{icon:2});return;
                            }
                            model.doSubmitEdit(desc,url,id)
                        }
                    },
                    created:function () {
                        model.query()
                    }
                })
            },
            query:function () {
                $.get('{{ asset("/back/system/bannerList") }}',{},function(msg){
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
                    url:'{{ asset("/back/system/modifyBanner") }}',
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
            doSubmitAdd:function(desc,url){
                $.ajax({
                    url:'{{ asset("/back/system/addBanner") }}',
                    type:'post',
                    dataType:'json',
                    data:{desc:desc,url:url,_token:"{{csrf_token()}}"},
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
            doSubmitEdit:function(desc,url,id){
                $.ajax({
                    url:'{{ asset("/back/system/modifyBanner") }}',
                    type:'post',
                    dataType:'json',
                    data:{id:id,url:url,desc:desc,_token:"{{ csrf_token() }}"},
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
    $(function(){
        var ue = UE.getEditor('editor');
    });

    layui.use('upload', function(){
        var upload = layui.upload;
        var upload1 = layui.upload;
        //执行实例
        var uploadInst = upload.render({
            elem: '#uploadFiles' //绑定元素
            ,url: '/back/product/upload' //上传接口
            ,data: {'_token':"{{ csrf_token() }}",'type':1}
            ,done: function(res){
                if(res.code==1){
                    $('#uploadSrc').attr('src',res.msg.origin)
                    $('input[name=add_pic_small]').val(res.msg.small)
                    $('input[name=add_pic_big]').val(res.msg.big)
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


        //执行实例
        var uploadInst1 = upload1.render({
            elem: '#uploadFiles_edit' //绑定元素
            ,url: '/back/product/upload' //上传接口
            ,data: {'_token':"{{ csrf_token() }}",'type':1}
            ,done: function(res){
                if(res.code==1){
                    $('#uploadSrc_edit').attr('src',res.msg.origin)
                    $('input[name=edit_pic_small]').val(res.msg.small)
                    $('input[name=edit_pic_big]').val(res.msg.big)
                    layer.msg('上传成功',{icon:6})
                }else{
                    layer.msg(res.msg,{icon:5})
                }

                console.log(res)
                console.log(res.msg.small)
            }
            ,error: function(){
                //请求异常回调
            }
        });
    });

</script>
@include('backend.footer')