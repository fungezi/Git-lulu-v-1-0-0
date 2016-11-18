<?php require "header.php" ?>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<form id="exam">
			<div class="form-group">
				<label>试卷名</label>
				<input class="" type="text" name="examName" placeholder="试卷名">
			</div>
			<div class="form-group pagecate">
				
			</div>
			<table style="text-align:left;" class="table table-hover">
		      <thead>
		        <tr style="text-align:center;">
		          <th>题目</th>
		          <th>题目作者</th>
		          <th>日期</th>
		          <th>选择</th>
		        </tr>
		      </thead>
		      <tbody class="artlistBox">
		      </tbody>
		    </table>
		</form>
		<a class="btn questionBtn btn-primary">生成试卷</a>
	</div>
</div>
<script type="text/javascript">

	$(function(){
		$.ajax({
			type:"GET",
			url:"http://localhost/thinkphp-cms/index.php/v1/course/list",
			data:{
				"condition":"cid,cname",
			},
			dataType:"json",
			success:function(data){
				if(data.flag){
					console.log(data.content);
					var html = "";
					for(var i = 0;i<data.content.length;i++){
						html += "<label style='width:50px'>"+data.content[i].cname+"<input type='radio' name='cid' value="+ data.content[i].cid +"></label>" 
					}
					$(".pagecate").html(html);
				}
			}
		});
		$.ajax({
			type:"GET",
			url:"http://localhost/thinkphp-cms/index.php/v1/article/list",
			data:{
				"page":1,//显示的页码
				"num":10,//默认显示的是10条
			},
			dataType:"json",
			success: function(data){
				if(data.flag){
					var content = data.content;
					var html =  "";
					for(var item in content){
						 html = html +
							"<tr class='artlistcon primary'>"+
					          "<td>"+content[item].title+"</td>"+
					          "<td>"+content[item].author+"</td>"+
					          "<td>"+content[item].addtime+"</td>"+
					          "<td><input type='checkbox' name='questionId"+ content[item].aid +"' value="+ content[item].aid +"></td>"+
					        "</tr>";
					}
					$(".artlistBox").html(html);
				}else{
					var html = "<h3 style='text-align:center'>"+data.content+"</h3>";
					$(".artlistBox").html(html);
				}
				for(var i = 0;i<$(".shanchubtn").length;i++){
					$(".shanchubtn")[i].index = i;
					$($(".shanchubtn")[i]).click(function(){
						var that = this;
						var aid = $(this).attr("data-aid");
						$.ajax({
							type:"delete",
							url:"http://localhost/thinkphp-cms/index.php/v1/article/del",
							data:{
								"aid":aid,
							},
							dataType:"json",
							success: function(data){
								if(data.flag){
									$($(".artlistcon")[that.index]).animate({"height":0},400,function(){
										$($(".artlistcon")[that.index]).remove();
										
									})
									alert(data.content);
								}
							}
						})
					})
					$($(".bianjibtn")[i]).click(function(){
						var that = this;
						var aid = $(this).attr("data-aid");
						window.location.href = "addArt.php?aid="+aid;
						
					})
				}
				$(".questionBtn").click(function(){
					$.ajax({
						type:"post",
						url:"http://localhost/thinkphp-cms/index.php/v1/exam/add",
						data:$("#exam").serialize(),
						dataType:"json",
						success:function(data){
							if(data.flag){
								alert(data.content);
							}
						}
					})
				})

			}
		});

		


	})

</script>