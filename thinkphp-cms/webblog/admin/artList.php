<?php require "header.php" ?>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<table style="text-align:left;" class="table table-hover">
	      <thead>
	        <tr style="text-align:center;">
	          <th style="width:400px;">文章标题</th>
	          <th>文章作者</th>
	          <th>文章日期</th>
	          <th>点击量</th>
	          <th>编辑</th>
	          <th>删除</th>
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
					          "<td>"+content[item].click+"</td>"+
					          "<td><a class='btn bianjibtn btn-primary' data-aid="+content[item].aid+" role='button'>编辑</a></td>"+
					          "<td><a class='btn shanchubtn btn-danger' data-aid="+content[item].aid+" role='button'>删除</a></td>"+
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
			}
		});

		


	})

</script>