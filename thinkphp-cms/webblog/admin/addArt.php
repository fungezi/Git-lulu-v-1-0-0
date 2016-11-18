<?php require "header.php" ?>
<div class="row">
	<div class="col-md-8 col-md-offset-1">
		<form id="addArt" action="localhost/thinkphp-cms/index.php/v1/article/add" method="POST">
			  <!-- <div class="form-group">
				    <label for="exampleInputEmail1">文章标题</label>
				    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="标题">
				    <input type="hidden" name="aid" class="form-control" id="exampleInputEmail0" placeholder="标题">
			  </div> -->
			  <div class="form-group">
				    <label for="exampleInputPassword1">作者</label>
				    <input type="text" name="author" class="form-control" id="exampleInputPassword1" placeholder="作者">
			  </div>

			  <!-- <div class="form-group">
				    <label for="exampleInputPassword2">文章关键字</label>
				    <input type="text" name="keywords" class="form-control" id="exampleInputPassword2" placeholder="文章关键字">
			  </div> -->

			  <div class="form-group" style="position:relative">
				    <label for="exampleInputPassword5">发表时间</label>
					<input type="text" name="addtime" id="dt" placeholder="time">
					<div id="dd"></div>
					<script type="text/javascript" src="assets/js/calendar.js"></script>
					<script type="text/javascript">
						$('#dd').calendar({
					        trigger: '#dt',
					        zIndex: 999,
							format: 'yyyy-mm-dd',
					        onSelected: function (view, date, data) {
					            console.log('event: onSelected')
					        },
					        onClose: function (view, date, data) {
					            console.log('event: onClose')
					            console.log('view:' + view)
					            console.log('date:' + date)
					            console.log('data:' + (data || 'None'));
					        }
					    });
					</script>
			  </div>

			  <div class="form-group">
				    <label for="exampleInputPassword3">题目描述</label>
				    <input type="text" name="description" class="form-control" id="exampleInputPassword3" placeholder="文章描述">
			  </div>

			  <!-- <label class="radio-inline">
				  <input type="radio" name="is_top" id="inlineRadio1" value="1">置顶
			  </label> -->
				<!-- <label class="radio-inline">
				  <input type="radio" name="is_top" id="inlineRadio2" value="0" checked> 不置顶(默认)
				</label> -->

			  <div class="checkbox catecb">
			  	<h3 style="font-size:14px;margin-bottom:0px">题目分类</h3><br>
			    	<!-- <label>
				      	<input name="cid[]" type="checkbox" value="1"> 分类1
				    </label>
				    <label>
				      	<input name="cid[]" type="checkbox" value="2"> 分类2
				    </label>
				    <label>
				      	<input name="cid[]" type="checkbox" value="3"> 分类3
				    </label>
				    <label>
				      	<input name="cid[]" type="checkbox" value="4"> 分类4
				    </label> -->
			  </div>


			  
			   <!-- 加载编辑器的容器 -->
			    <script id="container" name="content" type="text/plain">
			    </script>
			    <!-- 配置文件 -->
			    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
			    <!-- 编辑器源码文件 -->
			    <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
			    <!-- 实例化编辑器 -->
			    <script type="text/javascript">
			    	
			    </script>
			    <!-- Button trigger modal -->
				<button type="button" class="btn btn1 btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
				  添加
				</button>
		</form>
	</div>


</div>
<script type="text/javascript">
	$(function(){
		var UEDITOR_HOME_URL = "/thinkphp-cms/webblog/admin/";
		var ue = UE.getEditor('container');
		$.ajax({
			type:"GET",
			url:"http://localhost/thinkphp-cms/index.php/v1/category/list",
			data:{
				"condition":"cid,cname",
			},
			dataType:"json",
			success: function(data){
				if(data.flag){
					var content = data.content;
					html = "";
					for(var i = 0;i<content.length;i++){
						
						html = html + "<label>"+
				      		"<input name='cid[]' type='checkbox' value="+content[i].cid +"> "+content[i].cname+
				    	"</label>";
					}
					$(".catecb").append($(html));
				}
			}
		})
		var aid = getUrlParam("aid");
		if(aid){
			$(".btn1").html("更新");
			$.ajax({
				type:"get",
				url:"http://localhost/thinkphp-cms/index.php/v1/article/list",
				data:{
					"aid":aid,
				},
				dataType:"json",
				success: function(data){
					if(data.flag){
						var content = (data.content)[0];
						$("#exampleInputEmail0").val(content.aid);
						$("#exampleInputEmail1").val(content.title);
						$("#exampleInputPassword1").val(content.author);
						$("#exampleInputPassword2").val(content.keywords);
						$("#dt").val(content.addtime);
						$("#exampleInputPassword3").val(content.description);
						if(content.is_top){
							$("#inlineRadio1").attr("checked","checkded");

						}else{
							$("#inlineRadio1").attr("checked","");
							$("#inlineRadio2").attr("checked","checkded");
						}
						ue.addListener("ready", function () {
					        // editor准备好之后才可以使用
					        ue.setContent(content.content);

					    });
					    var cateList = $(".catecb").find("input");
					    cate = (content.cid).toString();
					    cate = cate.split(",");
					    console.log(cate);
					    for(var i=0;i<cateList.length;i++){
					    	var cc = 0;
					    	for(var j=0;j<cate.length;j++){
					    		if(cate[j] == $(cateList[i]).val()){
					    			cc++;
					    		}
					    	}
					    	if(cc != 0){
					    		$(cateList[i]).attr("checked","checked");
					    	}
					    }
					}
				}
			})
			$(".btn1").click(function(){
			$.ajax({
				type: "PUT",
            	url: "http://localhost/thinkphp-cms/index.php/v1/article/upd",
            	data: $("#addArt").serialize(),
            	dataType: "json",
            	success: function(data){
            		if(data.flag){
            			$("#myModal").find("#myModalLabel").html("文章添加状态");
            			$("#myModal").find(".modal-body").html(data.content);

            		}
            	}
			})
		})
		}else{
			$(".btn1").click(function(){
			$.ajax({
				type: "POST",
            	url: "http://localhost/thinkphp-cms/index.php/v1/article/add",
            	data: $("#addArt").serialize(),
            	dataType: "json",
            	success: function(data){
            		if(data.flag){
            			$("#myModal").find("#myModalLabel").html("文章添加状态");
            			$("#myModal").find(".modal-body").html(data.content);
            			$(".btn1").html("更新");
            			$("#exampleInputEmail0").val(data.aid);
            			$(".btn1").unbind("click");
			            $(".btn1").click(function(){
							$.ajax({
								type: "PUT",
				            	url: "http://localhost/thinkphp-cms/index.php/v1/article/upd",
				            	data: $("#addArt").serialize(),
				            	dataType: "json",
				            	success: function(data){
				            		if(data.flag){
				            			$("#myModal").find("#myModalLabel").html("文章添加状态");
				            			$("#myModal").find(".modal-body").html(data.content);
				            			
				            		}
				            	}
							})
						})
            		}
            	}
			})
		})
		}
	})
</script>
