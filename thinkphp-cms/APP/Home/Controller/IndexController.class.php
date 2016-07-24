<?php

// 首页控制器

namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('我的blog','utf-8');
    }

    public function category(){
    	$this->show("分类页","utf-8");
    }

    public function  articleList(){
    	$this->show("文章列表页");
    }

    public function tag(){
    	$this->show("标签页","utf-8");
    }

    public function article(){
    	$this->show("文章页","utf-8");
    }

    public function search(){
    	$this->show("搜索页","utf-8");
    }
}