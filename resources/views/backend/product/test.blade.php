<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--[if lt IE 9]>
	<script type="text/javascript" src="/out/lib/html5shiv.js"></script>
	<script type="text/javascript" src="/out/lib/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="/out/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="/out/static/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="/out/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="/out/static/h-ui.admin/skin/default/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="/out/static/h-ui.admin/css/style.css" />
	<link rel="stylesheet" href="/out/lib/layui/css/layui.css" media="all">

	<script type="text/javascript" src="/out/lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="/out/lib/layer/2.4/layer.js"></script>
	<script type="text/javascript" src="/out/static/h-ui/js/H-ui.min.js"></script>
	<script type="text/javascript" src="/out/static/h-ui.admin/js/H-ui.admin.js"></script>
	<script type="text/javascript" src="/js/lib/vue/vue.js"></script>
	<script src="/out/lib/layui/layui.js"></script>
	<!--[if IE 6]>
	<script type="text/javascript" src="/out/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<title>aa</title>
	<meta name="keywords" content="tata 博客后台管理系统">
	<meta name="description" content="tata 博客后台管理系统。">
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 博客管理 <span class="c-gray en">&gt;</span> 博客管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<!-- pageEdit end-->
<!-- pageShow start-->

	<div class="modal-dialog" style="width: 90%;max-height: 88%;overflow-y: scroll;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<article class="page-container" id='member-add'>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">图片上传：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<div class="uploader-thum-container">
								<div id="fileList" class="uploader-list"></div>
								<button type="button" class="layui-btn btn-primary" id="uploadFiles_edit">
									<i class="Hui-iconfont">&#xe642;</i>上传图片
								</button>
								<img width="200" height="200" id='uploadSrc_edit' :src='editLists.src' />
							</div>
						</div>
					</div>
				</article>
			</div>
			
			<div class="modal-footer">
				<button name="" id="" class="btn btn-primary" @click="submitAdd">保存</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</button>
			</div>
		</div>


<!-- pageShow end -->
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/out/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/out/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/out/lib/laypage/1.2/laypage.js"></script>

<script type="text/javascript" src="/out/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/out/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/out/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

<script>
layui.use('upload', function(){
  var upload = layui.upload;
  var upload1 = layui.upload;
  //执行实例
  var uploadInst = upload.render({
    elem: '#uploadFiles_edit' //绑定元素
    ,url: '/back/product/upload' //上传接口
    ,data: {'_token':"{{ csrf_token() }}",'type':1}
    ,done: function(res){
    	if(res.code==1){
    		$('#uploadSrc').attr('src',res.msg)
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
</body>
</html>