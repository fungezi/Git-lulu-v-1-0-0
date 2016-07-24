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

    'URL_ROUTER_ON'			=>	true,	//开启restful路由配置
    'URL_ROUTE_RULES' => array(
    	'v1/article/add'=>'admin/article/index',
    	'v1/article/list'=>'admin/article/index',
    	'v1/article/del'=>'admin/article/index',
    	'v1/article/upd'=>'admin/article/index',
    	'v1/user/reg'=>'user/index/reg',
    	'v1/user/login'=>'user/index/login',
    	'v1/user/logout'=>'user/index/logout',
        'v1/user/loginCode'=>'user/code/loginCode',
    	'v1/user/regCode'=>'user/code/regCode',
        'v1/role/add'=>'user/role/index',
        'v1/role/list'=>'user/role/index',
        'v1/role/upd'=>'user/role/index',
        'v1/role/delete'=>'user/role/index',
    ),

);