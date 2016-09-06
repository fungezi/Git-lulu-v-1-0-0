<?php
	require "header.php";
?>
<style type="text/css">
	.artLists{
		width: 80%;
		margin:0px auto;
		
		margin-bottom: 30px;
	}
	.artLists ul li{
		margin-top: 20px;
		background-color: white;
		transition: all 0.5s;
		-webkit-transition: all 0.5s;
	}
	.artLists ul li:hover{
		box-shadow: 0px 0px 5px #98A09D;
	}
	.artLists a{
		display: block;
		text-decoration: none;
		padding: 14px;
	}
	.artLists a:hover{
		color: black;
	}
	.artcontent{
		overflow: hidden;
		padding: 12px;
	}
	.artcontent img{
		display: block;
		width: 48%;
		float: left;
	}
	.artccon{
		width: 50%;
		float: right;
		position: relative;
		height: 100%;
	}
	.artccon h3{
		font-size: 20px;
		margin: 25px 0px 15px 0px;
		height: 100%;
	}
	.artccon p{
		text-indent: 2em;
		font-weight: 200;
		letter-spacing: 1px;
		height: 110px;
		overflow: hidden;

	}
	.artccon strong{
		display: block;
		font-size: 14px;
		line-height: 20px;
		position: relative;
		margin-top: 10px;
		text-indent: 1em;
		background-color: #F6F7F6;
		padding: 7px 0px;
	}
	.artccon strong i{
		display: inline-block;
		width: 5px;
		height: 34px;
		/*shape-margin: -5px;*/
		background-color: #12AB6F;
		position: absolute;
		left: 0px;
		top: 0px;
	}
	.artmes{
		position: absolute;
		top:0px;
		right: 10px;
		display: block;
		font-size: 12px;
		color: #BBB8B8;
	}
</style>
<div class="container">
	<div class="col-md-12">
		<div class="artLists">
			<ul>
				<li>
					<div class="artcontent">
						<img src="./images/ceshi.jpg">
						<div class="artccon">
							<h3><a href="#">网页占位图服务推荐</a></h3>
							<p>原曲是日本的《风车》，河图的《寒衣调》也用过原曲是日本的《风车》，河图的《寒衣调》也用过原曲是日本的《风车》，河图的《寒衣调》也车》，河图的《寒衣调》也车》，河图的《寒衣调》也车》，河图的《寒衣调》也用过</p>
							<span class="artmes">时间：2103-12-12 作者：GHH 点击次数：32</span>
							<strong><i></i>所属分类 JS、PHP</strong>
							<strong><i></i>关键字 HHHH、LLLLL</strong>
						</div>
					</div>
				</li>
				<li>
					<div class="artcontent">
						<img src="./images/ceshi.jpg">
						<div class="artccon">
							<h3><a href="#">网页占位图服务推荐</a></h3>
							<p>原曲是日本的《风车》，河图的《寒衣调》也用过原曲是日本的《风车》，河图的《寒衣调》也用过原曲是日本的《风车》，河图的《寒衣调》也用过</p>
							<span class="artmes">时间：2103-12-12 作者：GHH 点击次数：32</span>
							<strong><i></i>所属分类 JS、PHP</strong>
							<strong><i></i>关键字 HHHH、LLLLL</strong>
						</div>
					</div>
				</li>
				<li>
					<div class="artcontent">
						<img src="./images/ceshi.jpg">
						<div class="artccon">
							<h3><a href="#">网页占位图服务推荐</a></h3>
							<p>原曲是日本的《风车》，河图的《寒衣调》也用过原曲是日本的《风车》，河图的《寒衣调》也用过原曲是日本的《风车》，河图的《寒衣调》也用过</p>
							<span class="artmes">时间：2103-12-12 作者：GHH 点击次数：32</span>
							<strong><i></i>所属分类 JS、PHP</strong>
							<strong><i></i>关键字 HHHH、LLLLL</strong>
						</div>
					</div>
				</li>
			</ul>
		</div>
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
		$.ajax({
			type:"get",
			url:"http://localhost/thinkphp-cms/index.php/v1/index/category",
			data:{
				"cid":getUrlParam("cid"),
			},
			dataType:"json",
			success:function(data){
				if(data.flag){
					var content = data.content;
					var html = "";
					for(var item in content){
						html = html + 
						'<li>'+
							'<div class="artcontent">'+
								'<img src="'+ content[item]['firstimg'] +'">'+
								'<div class="artccon">'+
									'<h3><a href="single.php?aid='+ content[item]['aid'] +'">'+ content[item]['title'] +'</a></h3>'+
									'<p>'+ content[item]['description'] +'</p>'+
									'<span class="artmes">时间：'+ content[item]['addtime']+' 作者：'+content[item]['author']+' 点击次数：'+content[item]['click']+'</span>'+
									'<strong><i></i>所属分类 JS、PHP</strong>'+
									'<strong><i></i>关键字 '+content[item]['keywords']+'</strong>'+
								'</div>'+
							'</div>'+
						'</li>';
					}
					$(".artLists").find("ul").html(html);
					console.log(data.content);
				}
			}
		})
	})
</script>
<?php
	require "footer.php";
?>