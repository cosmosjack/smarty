﻿# 这是这个框架的前台公共方法的说明
### 悬浮框插件
### 参数是：移动对象，横向移动的速度，纵向移动的速度

//给悬浮框添加样式，其他样式可以不添加
<style type="text/css">
	html,body{
	   height:2000px;
	   padding: 0;
	   margin: 0;
	   overflow-x: hidden;
	}
	.elasticity{
		background:#4081db;
		position: absolute;<!-- 必须添加决定悬浮框的初始位置 -->
		top: 0;<!-- 必须添加决定悬浮框的初始位置 -->
		left: 0;<!-- 必须添加决定悬浮框的初始位置 -->
		border-radius: 20px;
		color:#FFF;
	}
	.elasticity>img{
		display: block;
		height: 80px;
		width: 200px;
		cursor: pointer;
	}
</style>
//悬浮框对象,一定要放在body下，不能有父级包在中间
><div class="col-sm-4 elasticity">
	><img src=""  />
></div>//悬浮框对象
//悬浮框对象
    <script type="text/javascript" src="./jquery.min.js"></script><!-- 必须引用jq -->
    <script type="text/javascript">
    		var Time = null;//定时器名称
    		var body_h = document.documentElement.clientHeight;//获取当前屏幕的高度
    		var t_judge0 = 0;//用于限制悬浮框移出到顶部的条件
    		var t_judge1 = document.documentElement.clientHeight;//用于限制悬浮框移出到底部的条件

		  	function elast(o,l,t){
			  	var speed_left = l;//横向移动的速度
			  	var speed_top = t;//纵向移动的速度
			  	//设置定时器
			  	var obj = o;//悬浮对象
			  	Time = setInterval(function(){
			  		//获取广告牌的left值和top值
			  		var obj_left =obj.position().left;
			  		var obj_top =obj.position().top;
			  		//------------------------------------
			  		if(obj.position().left < 0){
	                    speed_left *= -1;//判断当广告牌的left小于0时，speed_left乘于-1;
			  		}else if(obj.position().left >= (document.body.clientWidth - obj.width())){
	                    speed_left *= -1;//判断当广告牌的left大于屏幕减去本身的宽度时，speed_left乘于-1;
			  		}
			  		if(obj.position().top < t_judge0){
	                    speed_top *= -1;//判断当广告牌的top小于0时，speed_left乘于-1;
			  		}else if(obj.position().top >= t_judge1 - obj.height()){
			  			console.log(obj.position().top,(document.body.clientHeight - obj.height()))
	                    speed_top *= -1;//判断当广告牌的top大于屏幕减去本身的高度时，speed_left乘于-1;
			  		}
			  		//每次执行定时器广告牌的left值等于当前的left值 + speed_left ，top值等于当前的top值 + speed_top；
		           $('.elasticity').css({'left':obj_left + speed_left,'top':obj_top + speed_top});
			  	},100);
		    }
		    elast($('.elasticity'),5,3); //函数调用
		    //鼠标移入移出时
		    function hover(o){
		    	o.hover(function(){
		    		clearInterval(Time);
		    	},function(){
                    elast($('.elasticity'),5,3); //函数调用
		    	})
		    }
            hover($('.elasticity'));//调用函数
            //页面滚动监听
            $(document).ready(function(){
				$(window).scroll(function(){
                    clearInterval(Time);//滚动时清除定时器
                    t_judge0 = $(window).scrollTop();//改变限制悬浮框移出到顶部的条件
                    t_judge1 = body_h+$(window).scrollTop();//改变限制悬浮框移出到底部的条件
                    $('.elasticity').css('top',$(window).scrollTop())//使悬浮框移动到当前屏幕的位置
                    elast($('.elasticity'),5,3);//重新启动悬浮框移动函数
				});
			});
    </script>

### 悬浮框插件end-----------------------
### 发布者：奔腾的骆驼

### 动画插件
### 参数是：移动对象，横向移动的速度，纵向移动的速度
###<link rel="stylesheet" type="text/css" href="<{$res}>/css/animate.min.css" />引用animate.min.css
###<script type="text/javascript" src="<{$res}>/js/wow.min.js"></script>引用wow.min.js
	//动画设置
        Animation:function(){
            new WOW().init(); //new 一个动画对象
            var wow = new WOW({  
                boxClass: 'wow', //调用class名称 
                animateClass: 'animated',   //// default 为animate.css触发css动画的库 
                offset: 0,  // 滚动条与对象的距离触发
                mobile: true,// 是否支持手机  
                live: true  // 检查新元素
            });  
            wow.init();//调用函数
        },
//调用《span class=" wow bounceInUp"》
更多《/span》//改按钮便会从底部移动上来
//动画效果有多种，具体请查看new WOW()动画文档

### 动画插件 ------------
### 发布者：奔腾的骆驼

###轮播图插件Swiper,本人使用的是Swiper3版本
###参数：o:作用对象 ,l:滚动方向等等
###<link rel="stylesheet" href="../swiper-3.4.2.min.css">引用swiper.min.css
###<script src="path/to/jquery.js"></script>必须引用jquery.js
###<script type="text/javascript" src="../swiper-3.4.2.min.js"></script>引用swiper.min.js
html写上这段代码
《div class="swiper-container">
    《div class="swiper-wrapper">
        《div class="swiper-slide">Slide 1《/div>
        《div class="swiper-slide">Slide 2《/div>
        《div class="swiper-slide">Slide 3《/div>
    《/div>
    <!-- 如果需要分页器 -->
    《div class="swiper-pagination">《/div>
    
    <!-- 如果需要导航按钮 -->
    《div class="swiper-button-prev">《/div>
    《div class="swiper-button-next">《/div>
    
    <!-- 如果需要滚动条 -->
    《div class="swiper-scrollbar">《/div>
《/div>
//------------------------------
JS添加
<script> 
function oSwiper(o,l){
	var mySwiper = new Swiper (o, {
    direction: l,
    loop: true,//是否循环
    
    // 如果需要分页器
    pagination: '.swiper-pagination',
    
    // 如果需要前进后退按钮
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    
    // 如果需要滚动条
    scrollbar: '.swiper-scrollbar',
  })        
}
  
  </script>
//---------------------------------------
### 轮播图插件Swiper ------------
### 发布者：奔腾的骆驼























