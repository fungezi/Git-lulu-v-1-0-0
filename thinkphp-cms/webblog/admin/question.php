<?php require "header.php" ?>
<div class="row">
	<div class="questionList col-md-10 col-md-offset-1">
		
	</div>
	<script type="text/javascript">
		$(function(){
			var aid = getUrlParam("questionId");
			$.ajax({
				type:"GET",
				url:"http://localhost/thinkphp-cms/index.php/v1/exam/list",
				data:{
					"aid":aid
				},
				dataType:"json",
				success: function(data){
					if(data.flag){
						var content = data.content;
						var liList = "";
						for(var i = 0;i < content[0]["question"].length;i++){
							liList += "<li>"+ content[0]["question"][i]["content"] +"</li>";
						}
				        liList = "<h3>"+content[0]["questionname"]+"</h3>"+liList;
						$(".questionList").html(liList);
					}
				}
			});

			


		})

	</script>
</div>