<?php require "header.php" ?>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<table style="text-align:left;" class="table table-hover">
	      <thead>
	        <tr style="text-align:center;">
	          <th style="width:80px;">试卷ID</th>
	          <th style="width:80px;"">试卷题目</th>
	          <!-- <th>题目ID列表</th> -->
	          <th>详情</th>
	        </tr>
	      </thead>
	      <tbody class="artlistBox">
	      </tbody>
	    </table>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$.ajax({
			type:"GET",
			url:"http://localhost/thinkphp-cms/index.php/v1/exam/list",
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
					          "<td>"+content[item].examid+"</td>"+
					          "<td>"+content[item].questionname+"</td>"+
					          // "<td>"+content[item].question+"</td>"+
					          "<td><a data-questionId = '"+ content[item].examid +"' class='questionBtn btn btn-primary'>查看</a></td>"+
					        "</tr>";
					}
					$(".artlistBox").html(html);
				}else{
					var html = "<h3 style='text-align:center'>"+data.content+"</h3>";
					$(".artlistBox").html(html);
				}
				for(var i = 0;i<$(".questionBtn").length;i++){
					$($(".questionBtn")[i]).click(function(){
						var that = this;
						var aid = $(this).attr("data-questionId");
						window.location.href = "question.php?questionId="+aid;
						
					})
				}
			}
		});

		


	})

</script>