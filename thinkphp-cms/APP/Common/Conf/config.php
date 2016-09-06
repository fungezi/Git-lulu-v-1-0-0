<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL'				=>	2,
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'testBlog',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀


     'SYSTEM_EMAIL' => array(
        'SMTP_HOST' => 'smtp.163.com', //SMTP服务器
        'SMTP_PORT' => '25', //SMTP服务器端口
        'SMTP_USER' => '13296694844@163.com', //SMTP服务器用户名//填写自己的用户名
        'SMTP_PASS' => '4228011016yxl', //SMTP服务器密码//自己邮箱的密码
        'FROM_EMAIL' => '13296694844@163.com', //发件人EMAIL
        'FROM_NAME' => 'YXL-blog', //发件人名称
        'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
        'REPLY_NAME' => '', //回复名称（留空则为发件人名称）
        ),


    'URL_ROUTER_ON'			=>	true,	//开启restful路由配置
    'URL_ROUTE_RULES' => array(
    	'v1/article/add'=>'admin/article/index',
    	'v1/article/list'=>'admin/article/index',
    	'v1/article/del'=>'admin/article/index',
    	'v1/article/upd'=>'admin/article/index',
    	'v1/user/reg'=>'user/index/reg',
    	'v1/user/login'=>'user/index/login',
        'v1/user/activeCode'=>'user/index/activeCode',
    	'v1/user/logout'=>'user/index/logout',
        'v1/user/loginCode'=>'user/code/loginCode',
    	'v1/user/regCode'=>'user/code/regCode',
        'v1/role/add'=>'user/role/index',
        'v1/role/list'=>'user/role/index',
        'v1/role/upd'=>'user/role/index',
        'v1/role/delete'=>'user/role/index',
        'v1/sendmail'=>'admin/article/sendMail',
        'v1/category/list'=>'admin/article/category',
        'v1/category/add'=>'admin/article/category',
        'v1/category/del'=>'admin/article/category',
        'v1/category/upd'=>'admin/article/category',
        'v1/comment/add'=>'home/comment/index',
        'v1/comment/list'=>'home/comment/index',
        'v1/index/index'=>'home/index/index',
        'v1/index/single'=>'home/index/single',
        'v1/index/category'=>'home/index/category',
        'v1/admin/list'=>'admin/admin/index',
    ),

);