<?php require "header.php" ?>
<div class="row">
	<div class="col-md-12">
		<h3>课程分类</h3>
		<div class="col-md-4">
			<form id="addCate" action="localhost/thinkphp-cms/index.php/v1/category/add" method="POST">
				  <div class="form-group">
					    <label for="catename">课程名</label>
					    <input type="text" name="cname" class="form-control" id="catename" placeholder="名称">
					    <input type="hidden" name="cid" class="form-control" id="cateid" placeholder="cid">
					    
				  </div>
				  <div class="form-group">
				  		<select id="pidList" name="pid" class="form-control">
							  <option>1</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
						</select>
				  </div>
				  <div class="form-group">
				  		<label for="catedes">描述</label>
					    <textarea id="catedes" class="form-control" placeholder="描述" name="description"></textarea>
				  </div>
				  <button type="button" class="btn catebtn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
				  添加
				</button>
			</form>
		</div>
		<div class="col-md-8">
			<table class="table table-hover">
		      <label>已有的分类</label>
		      <thead>
		        <tr>
		          <th style="width:100px;">分类名</th>
		          <th style="width:350px;">描述</th>
		          <th>总数</th>
		          <th>编辑</th>
		          <th>删除</th>
		        </tr>
		      </thead>
		      <tbody id="cateTable">
		        
		        
		      </tbody>
		    </table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$.ajax({
			type:"GET",
			url:"http://localhost/thinkphp-cms/index.php/v1/course/list",
			data:{
				"condition":"cid,cname,description",
			},
			dataType:"json",
			success: function(data){
				if(data.flag){
					var content = data.content;
					var html = "<option value='0'>无</option>";
					var htmlc = "";
					for(var i=0;i<content.length;i++){
						html = html + "<option value="+ content[i].cid +">"+ content[i].cname +"</option>";
					
						htmlc = htmlc +
							"<tr>"+
					          "<td>"+ content[i].cname +"</td>"+
					          "<td>"+ content[i].description +"</td>"+
					          "<td>"+ content[i].cname +"</td>"+
					          "<th><a class='btn bianjibtn btn-primary' data-cid="+content[i].cid+" role='button'>编辑</a></th>"+
					          "<th><a class='btn shanchubtn btn-danger' data-cid="+content[i].cid+" role='button'>删除</a></th>"+
					        "</tr>";
				    }
				    $("#cateTable").append(htmlc);
					$("#pidList").html(html);
					delclickEvent();
					updclickEvent();
				}
			}
		})
		$(".catebtn").click(function(){
			$.ajax({
				type:"POST",
				url:"http://localhost/thinkphp-cms/index.php/v1/course/add",
				data:$("#addCate").serialize(),
				dataType:"json",
				success: function(data){
					if(data.flag){
						var html = 
						"<tr>"+
				          "<td>"+ $("input[name='cname']").val() +"</td>"+
				          "<td>"+ $("#catedes").val() +"</td>"+
				          "<td>"+ $("input[name='cname']").val() +"</td>"+
				          "<th><a class='btn bianjibtn btn-primary' data-cid="+data.cid+" role='button'>编辑</a></th>"+
				          "<th><a class='btn shanchubtn btn-danger' data-cid="+data.cid+" role='button'>删除</a></th>"+
				        "</tr>";

						$("#cateTable").append(html);
						delclickEvent();
						updclickEvent();
					}
				}
			})
		})
		function updclickEvent(){
			$(".bianjibtn").unbind("click");
			$(".bianjibtn").click(function(){
				var cid = $(this).attr("data-cid");
				var dataDom = $(this).parent().parent().find("td");
				$("input[name='cname']").val($(dataDom[0]).html());
				$("#catedes").html($(dataDom[1]).html());
				$("input[name='cid']").val(cid);
				$(".catebtn").html("更新");
				$(".catebtn").unbind("click");
				$(".catebtn").click(function(){
					$.ajax({
						type:"put",
						url:"http://localhost/thinkphp-cms/index.php/v1/course/upd",
						data:$("#addCate").serialize(),
						dataType:"json",
						success:function(data){
							if(data.flag){
								$(dataDom[0]).html($("input[name='cname']").val());
								$(dataDom[1]).html($("#catedes").val());
								alert(data.content);
							}else{
								alert(data.content);
							}
						}
					})
				})
				
			})
		}
		function delclickEvent(){
			$(".shanchubtn").unbind("click");
			$(".shanchubtn").click(function(){
				var aid = $(this).attr("data-cid");

				var that = this;
				$.ajax({
					type:"DELETE",
					url:"http://localhost/thinkphp-cms/index.php/v1/course/del",
					data:{
						"cid":aid,
					},
					dataType:"json",
					success:function(data){
						if(data.flag){
							alert(data.content);
							$(that).animate({"height":0},300,function(){
								$(that).parent().parent("tr").remove();
							})
						}else{
							alert(data.content);
						}
					}
				})
			})
		}
		
	})

</script>






