<?php
	require "header.php";
?>
<style type="text/css">
	.title{
		text-align: center;
		font-weight: 200;
		font-size: 27px;
		margin-bottom: 20px;
	}
	.artcontent{
		text-indent: 2em;
		font-size: 17px;
	}
	.artbox{
		background-color: white;
		padding: 20px;
		line-height: 25px;
		font-size: 16px;

	}
	.artbox img{
		max-width: 100%;
	}
	.artcon span{
		font-size: 12px;
    	color: #BBB8B8;
	}
</style>
<div class="container">
	<div class="artbox row">
		<div class="artcon col-md-12">
			
		</div>
	</div>
<script type="text/javascript">
	$(function(){
		//获取url中的参数
        function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null) return unescape(r[2]); return null; //返回参数值
        }
		var aid = getUrlParam("aid");
		$.ajax({
			type:"GET",
			url:"http://localhost/thinkphp-cms/index.php/v1/index/single",
			data:{
				"aid":aid,
			},
			dataType:"json",
			success:function(data){
				if(data.flag){
					console.log(data.content);
					var content = data.content[0];
					var html =
					'<h3 class="title">'+ content['title'] +'</h3>'+
					'<span>作者：'+ content['author'] +' 时间：'+ content['addtime'] +' 评论：'+ content['click'] +'</span>'+
					'<div class="col-md-12 artcontent">'+content["content"]+
					'</div>';
					// html = $(html).find(".artcontent").html(content["content"]);
					console.log(html);
					$(".artcon").html(html);
				}
			}
		})
	})
</script>
<?php
	require "comment.php";
?>
</div>
<?php
	require "footer.php";
?>