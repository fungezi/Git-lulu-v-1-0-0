<?php require "header.php" ?>
<div class="row">
	<div class="questionList col-md-10 col-md-offset-1">
		<table class="table table-hover">
		      <label>已有的课程</label>
		      <thead>
		        <tr>
		          <th style="width:100px;">课程名</th>
		          <th style="width:350px;">描述</th>
		          <th>选择</th>
		        </tr>
		      </thead>
		      <tbody id="cateTable">
		        
		        
		      </tbody>
		    </table>
		    <div class="shijuan"></div>
	</div>
	<script type="text/javascript">
		$(function(){
			$.ajax({
				type:"POST",
				url: "http://localhost/thinkphp-cms/index.php/v1/role/selectCourse",
				data:{
					courseId:"",
				},
				dataType:"json",
				success:function(data){
					if(data.flag){
						console.log(data.content);
						var html = "";
						for(var i = 0;i<data.content.length;i++){
							html += "<li><a href = 'question.php?questionId="+ data.content[i].examid +"'>"+ data.content[i].questionname +"</a></li>"
						}
						$(".shijuan").html(html);
					}
				}
			})
		$.ajax({
			type:"GET",
			url:"http://localhost/thinkphp-cms/index.php/v1/course/list",
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
					          "<th><a class='btn shanchubtn btn-primary' data-cid="+content[i].cid+" role='button'>选择</a></th>"+
					        "</tr>";
				    }
				    $("#cateTable").append(htmlc);
					$(".shanchubtn").click(function(){
						var cid = $(this).attr("data-cid");
						$.ajax({
							type:"POST",
							url: "http://localhost/thinkphp-cms/index.php/v1/role/selectCourse",
							data:{
								courseId:cid,
							},
							dataType:"json",
							success:function(data){
								if(data.flag){
									console.log(data.content);
									var html = "";
									for(var i = 0;i<data.content.length;i++){
										html += "<li><a href = 'question.php?questionId="+ data.content[i].examid +"'>"+ data.content[i].questionname +"</a></li>"
									}
									$(".shijuan").html(html);
								}
							}
						})
					})
				}
			}
		})})

	</script>
</div>