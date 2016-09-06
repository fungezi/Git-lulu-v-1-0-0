<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登录</title>
	<script src="assets/js/jquery.min.js"></script>
	<style type="text/css">
		.loginBtn{
			display: block;
			width: 100px;
			padding: 7px 4px;
			text-align: center;
			font-size: 20px;
			text-decoration: none;
			cursor: pointer;
			background-color: #009688;
			color: white;
			font-family: "Microsoft YaHei";
			border-radius: 5px;
			margin-top: 0px;
			float: left;
		}
		.loginBtn:hover{
			box-shadow: 0px 0px 3px gray;
			background-color: #037B70;
		}
		.login form input{
			width: 250px;
			height: 24px;
			margin-top: 20px;
		}
		.login form input:hover{
			border-color:none;

		}
		.login{
			width: 260px;
			overflow: hidden;
			padding: 5px;
			margin: 0px auto;
		}
		.regBtn{
			display: block;
			border:1px solid gray;
			padding: 7px 4px;
			width: 100px;
			text-align: center;
			font-size: 20px;
			text-decoration: none;
			border-radius: 5px;
			cursor: pointer;
			/*float: right;*/
			width: 250px;
			color: white;
			margin:20px auto;
			background-color: #009688;
		}
		.regBtn:hover{
			/*color: black;*/
			background-color: #03756B;
		}
		.login h3{
			text-align: center;
			font-size: 35px;
			font-weight: 700;
			background:url("./assets/images/bac2.png") no-repeat left top;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			font-family: "Microsoft YaHei";
		}
		.login span{
			overflow: hidden;
			line-height: 65px;
			display: block;
			font-size: 14px;
			color: gray;
		}
		.login span input{
			float: left;
			width: 20px;
		}
		.logcode{
			width: 110px !important;
		}
		.sincode{
			float: right;
			margin-top: 20px;
			width: 130px;
			margin-right: 5px;
		}
	</style>
</head>
<body>
<div class="login">
	<h3>YXL-Blog 注册</h3>
	<form id="singin">
		<input type="text" name="username" placeholder=" 用户名">
		<input type="text" name="pwd" placeholder=" 密码">
		<input type="text" name="email" placeholder=" 邮箱">
		<input class="logcode" type="text" name="code" placeholder="验证码">
		<img class="sincode" src="http://localhost/thinkphp-cms/index.php/v1/user/loginCode">
		<a class="regBtn">注册</a>
	</form>
</div>
<script type="text/javascript">
	$(function(){
		$(".login").css("margin-top",($(window).height()-$(".login").height())/2 - 70);
	})
	$(function(){
		$(".regBtn").click(function(){
			$.ajax({
				type:"post",
				url:"http://localhost/thinkphp-cms/index.php/v1/user/reg",
				data:$("#singin").serialize(),
				dataType:"json",
				success:function(data){
					if(data.flag){
						if(data.email){
							alert("邮件已经发送到邮箱，点击激活。");
							window.location.href =  "http://localhost/thinkphp-cms/webblog/admin/login.php";
						}
						console.log(data.content);
						// location.href = "./index.php";
					}
				}
			})
		})
	})
</script>
</body>
</html>