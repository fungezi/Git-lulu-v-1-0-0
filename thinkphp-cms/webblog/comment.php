<style type="text/css">
	.replay{
		width: 40px;
		/*height: 20px;*/
		display: block;
		background-color: #1FC192;
		color: white;
		padding: 3px 6px;
		float: right;
		margin-top: -20px;
		color: white;
		border-radius: 4px;
		cursor: pointer;
		color: white !important;

	}
	.comment{
		background-color: white;
		margin-top: 10px;
		padding: 10px;
		overflow: hidden;
		width: 60%;
	}
	.comment h3{
		float: left;
		line-height: 20px;
		color: #09966D;
	}
	.comment p{
		font-size: 12px;
		text-indent: 10px;
		width: 94%;
		letter-spacing: 1px;
	}
	.comment a{
		color: white;
	}
	.comment .comment{
		width: 88%;
		margin-left: 40px;
		border:1px solid #DAD2D3;
		padding: 5px;
	}
	.comment .comment .replay{
		display: none;
	}
	.comment .comment p{
		width: 100%;
	}
	#username{
		width: 200px;
	}
	#mcomment{
		/*margin: 0px auto;*/
		margin-top: 20px;
	}
	#mcomment textarea{
		width: 685px;
	}
.submitBtn{
	padding: 5px 7px;
	color: white !important;
}
#cccList{
	margin-bottom: 30px;
}

</style>
<form class="row" id="mcomment" >
	<div class="form-group">
		<!-- <label for="username">用户名</label> -->
		<input type="text" name="username" class="form-control" id="username" placeholder="用户名">
		<input type="hidden" name="pid" value = '0' class="form-control">
		<input type="hidden" name="artid" value = '0' class="form-control">
	</div>
	<div class="form-group">
		<!-- <label for="content">评论</label> -->
		<textarea name="content" placeholder="评论" class="form-control" rows="3"></textarea>
	</div>
	<a class="btn submitBtn btn-info">提交</a>
</form>
<div id="cccList" class="row">

	<div class="comment">
		<h3>XXXX</h3>
		<span style='display:none'>1</span>
		<p>评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容。</p>
		<a class="replay">回复</a>
		<div class="comment">
			<h3>YYY</h3>
			<span style='display:none'>1</span>
			<p>评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容评论内容。</p>
		</div>
		<div class="comment">
			<h3>VVVVV</h3>
			<span style='display:none'>1</span>
			<p>评论内容评论内容评论内容评论内容。</p>
		</div>
	</div>
	<div class="comment">
		<h3>XXXX</h3>
		<span style='display:none'>1</span>
		<p>评论内容评论内容评论内容评论内容。</p>
		<a class="replay">回复</a>
	</div>
	<div class="comment">
		<h3>XXXX</h3>
		<span style='display:none'>1</span>
		<p>评论内容评论内容评论内容评论内容。</p>
		<a class="replay">回复</a>
		<div class="comment">
			<h3>XXXX</h3>
			<span style='display:none'>1</span>
			<p>评论内容评论内容评论内容评论内容。</p>
		</div>
	</div>
	
</div>
<script type="text/javascript">
	$(function(){
		function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null) return unescape(r[2]); return null; //返回参数值
        }
        $("input[name='artid']").val(getUrlParam("aid"));
        $("#mcomment").find(".submitBtn").click(function(){
        	$.ajax({
				type:"POST",
				url:"http://localhost/thinkphp-cms/index.php/v1/comment/add",
				data:$("#mcomment").serialize(),
				dataType:"json",
				success: function(data){
					if(data.flag){
						console.log(data.content);
						var html = 
						'<div class="comment">'+
							'<h3>'+ $("input[name='username']").val() +'</h3>'+
							'<span style="display:none">'+ data.content +'</span>'+
							'<p>'+ $("textarea[name='content']").val() +'</p>'+
							'<a class="replay">回复</a>'+
						'</div>';
						$("#cccList").append($(html));
						$("input[name='username']").val("");
						$("textarea[name='content']").val("");
						$(".replay").click(replaybtn);
					}
				}
			})
        })
        function getCommentList(aid){
        	$.ajax({
        		type:"GET",
        		url:"http://localhost/thinkphp-cms/index.php/v1/comment/list",
        		data:{"artid":aid},
        		dataType:"json",
        		success:function(data){
        			var html = "";
        			var content = data.content;
        			console.log(content);
        			for(var item in content){
        				var sonhtml = "";
        				if(content[item]["son"]){
        					var son = content[item]["son"];
        					for(var key in son){
        						sonhtml = sonhtml + 
        						'<div class="comment">'+
									'<h3>'+ son[key]["username"] +'</h3>'+
									'<span style="display:none">'+ son[key]["cid"] +'</span>'+
									'<p>'+ son[key]["content"] +'</p>'+
								'</div>';
        					}
        					
        				}
        				if(!sonhtml){
        					sonhtml = "";
        				}
        				html = html + 
        				'<div class="comment">'+
							'<h3>'+ content[item]["username"] +'</h3>'+
							'<span style="display:none">'+ content[item]["cid"] +'</span>'+
							'<p>'+ content[item]["content"] +'</p>'+
							'<a class="replay">回复</a>'+
							sonhtml+
						'</div>';
        			}
        			$("#cccList").html(html);
        			// console.log(html);
        			// console.log(content);
        			$(".replay").click(replaybtn);
        		}
        	})
        }
        function replaybtn(){
					var html = 
					'<form id="comment" class="col-md-12">'+
						'<div class="form-group">'+
						    '<label for="username">用户名</label>'+
						    '<input type="text" name="username" class="username form-control" id="username" placeholder="用户名">'+
						    '<input type="hidden" name="pid" value = '+ $(this).parent().children("span").html() +
						    ' "class="form-control">'+
						    '<input type="hidden" name="artid" value = '+ getUrlParam("aid") +
						    ' "class="form-control">'+
					  	'</div>'+
					  	'<div class="form-group">'+
						    '<label for="username">评论</label>'+
						    '<textarea name="content" class="form-control textarea" rows="3"></textarea>'+
					  	'</div>'+
						'<a class="btn submitBtn btn-info">提交</a>'+
						'<a class="btn closeBtn btn-default">取消</a>'+
					'</form>';
					if(!$(this).parent().find("form")[0]){
						$(this).parent().append($(html));
					}
					$(".closeBtn").click(function(){
						if($(this).parent()[0]){
							$(this).parent().remove();
						}
					})
					$(".submitBtn").click(function(){
						var that = this;
						$.ajax({
							type:"POST",
							url:"http://localhost/thinkphp-cms/index.php/v1/comment/add",
							data:$("#comment").serialize(),
							dataType:"json",
							success: function(data){
								if(data.flag){
									var html = 
									'<div class="comment">'+
										'<h3>'+ $(".username").val() +'</h3>'+
										'<span style="display:none">'+ data.content +'</span>'+
										'<p>'+ $(".textarea").val() +'</p>'+
									'</div>';
									$(that).parent().parent().append($(html));
									$(that).parent().remove();

								}
							}
						})
					})
				}
        getCommentList(getUrlParam("aid"));

		

	})
</script>

