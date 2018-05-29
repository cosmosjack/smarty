<?php
	/**
	 * 单一入口文件
	 */
    define(DS,DIRECTORY_SEPARATOR);
    define("SHOP_SITE_URL","http://".$_SERVER['HTTP_HOST']);
    define("BAIDU_API", "http://data.zz.baidu.com/urls?site=www.hzjftsp.com&token=qHlho16rlfwHhPXJ");//
	define("TPLSTYLE", "default");                        //默认模板存放的目录
	define("APP", "admin");           //设置当前应用的目录
	require('./brophp/bro.php'); //加载框架的入口文件



