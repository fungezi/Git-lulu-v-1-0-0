<?php 
	define("APP_DEBUG","true");
	define("APP_NAME","YCMS");
	define("APP_PATH","./APP/");
	// define("CSS_PATH","public/admin/css");
	// define("IMG_PATH","public/images");
	// define("IMG_UPLOAD","public/");
	if(APP_DEBUG){
	    header("Access-Control-Allow-Origin:*");
	    header("Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS");
	}
	require("./thinkphp/thinkPHP.php");