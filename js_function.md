# 这是这个框架的前台公共方法的说明
### 悬浮框插件
### 参数是：移动对象，横向移动的速度，纵向移动的速度
```javascript
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
```<div class="col-sm-4 elasticity">
	```<img src=""  />
```</div>//悬浮框对象
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
```
---
### 悬浮框插件end-----------------------
### 发布者：奔腾的骆驼

``` 动画插件
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
<span class=" wow bounceInUp">更多
```</span>//改按钮便会从底部移动上来
//动画效果有多种，具体请查看new WOW()动画文档

### 动画插件 ------------
### 发布者：奔腾的骆驼

###轮播图插件Swiper,本人使用的是Swiper3版本
###参数：o:作用对象 ,l:滚动方向等等
###<link rel="stylesheet" href="../swiper-3.4.2.min.css">引用swiper.min.css
###<script src="path/to/jquery.js"></script>必须引用jquery.js
###<script type="text/javascript" src="../swiper-3.4.2.min.js"></script>引用swiper.min.js
html写上这段代码
<!-- 此处是轮播图 -->
```<div class="swiper-container">
    <div class="swiper-wrapper">
	<!-- 此处是图片 -->
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
    </div>
    <!-- 如果需要分页器 -->
    <div class="swiper-pagination"></div>
    
    <!-- 如果需要导航按钮 -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    
    <!-- 如果需要滚动条 -->
    <div class="swiper-scrollbar"></div>
```</div>
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

-------------------------------------------------------------------------------------------------------------------------






//---------------------------------------
### 轮播图插件插件-带描述 ------------
### 发布者：fangmiaoji


... 轮播图插件插件-带描述,文件名(wab-sowing_map)

### 参数：宽度，高度，during(轮播时间间隔)
### <link rel="stylesheet" href="css/styles.css" type="text/css">
### <script type="text/javascript" src="js/jquery.min.js"></script>
### <script type="text/javascript" src="js/yxmobileslider.js"></script>
html代码
<!--效果html开始-->
...<div class="slider">
      <ul>
	<li><a href="" target="_blank"><img src="image/1.jpg" title="111" alt=""></a></li>
	<li><a href="" target="_blank"><img src="image/2.jpg" title="222" alt=""></a></li>
	<li><a href="" target="_blank"><img src="image/3.jpg" title="333" alt=""></a></li>
	<li><a href="" target="_blank"><img src="image/4.jpg" title="444" alt=""></a></li>
	<li><a href="" target="_blank"><img src="image/5.jpg" title="555" alt=""></a></li>
     </ul>
...</div>


//---------------------------------------
js调用
...<script>
$(".slider").yxMobileSlider({width:640,height:320,during:3000})
...</script>
//---------------------------------------
### 轮播图插件Swiper ------------
### 发布者：fangmiaoji


-----------------------------------------------------------上拉刷新下拉加载,文件名(dist)------------------


... 上拉刷新下拉加载,文件名(dist)

### 参数：loadUpFn(下拉刷新)，loadDownFn（上拉加载），me.lock();（锁定），me.noData();（无数据）
### <script src='js/jquery-1.8.3.min.js' type="text/javascript"></script>
### <link rel="stylesheet" type="text/css" href="css/style.css" />
### <link rel="stylesheet" href="dist/dropload.css"> <!--插件样式-->
### <script src="dist/dropload.min.js"></script>
html代码
<!--效果html开始-->
...<div class="lists">
      <!--内容-->
...</div>


//---------------------------------------
js调用
...<script>
$(function(){

    // dropload
    var dropload = $('.inner').dropload({
        domUp : {
            domClass   : 'dropload-up',
            domRefresh : '<div class="dropload-refresh">↓下拉刷新</div>',
            domUpdate  : '<div class="dropload-update">↑释放更新</div>',
            domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>'
        },
        domDown : {
            domClass   : 'dropload-down',
            domRefresh : '<div class="dropload-refresh">↑上拉加载更多</div>',
            domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>'
            domNoData  : '<div class="dropload-noData">暂无数据</div>'
        },
        //下拉刷新接口--数据调用
        loadUpFn : function(me){
            $.ajax({
                type: 'GET',
                url: 'json/update.json',
                dataType: 'json',
                success: function(data){
                	console.log(data)
                	var gayle=data.lists.length; //数据条数-- 判断需要
                	var result = '';
                	if(gayle>0){
                		for(var i = 0; i < data.lists.length; i++){
	                        result +=   '<a class="item opacity" href="'+data.lists[i].link+'">'
	                                        +'<img src="'+data.lists[i].pic+'" alt="">'
	                                        +'<h3>'+data.lists[i].title+'</h3>'
	                                        +'<span class="date">'+data.lists[i].date+'</span>'
	                                    +'</a>';
	                    }
                		if(gayle<6){ //数据条数达到屏幕高度判断 防止数据少时页面不断请求接口
                			// 锁定
	                        me.lock();
	                        // 无数据
	                        me.noData();
                		}
                		
                	}else{
                		// 锁定
                        me.lock();
                        // 无数据
                        me.noData();
                	}
                    
                    
                    // 为了测试，延迟1秒加载
                    setTimeout(function(){
                        $('.lists').html(result);
                        // 每次数据加载完，必须重置
                        dropload.resetload();
                    },1000);
                },
                error: function(xhr, type){
                    alert('Ajax error!');
                    // 即使加载出错，也得重置
                    dropload.resetload();
                }
            });
        },
        //下拉刷新接口--数据调用
        loadDownFn : function(me){
            $.ajax({
                type: 'GET',
                url: 'json/more.json',
                dataType: 'json',
                success: function(data){
                    console.log(data)
                	var gayle=data.lists.length; //数据条数长度 -- 判断需要
                	var result = '';
                	console.log(gayle)
                	if(gayle>0){
                		for(var i = 0; i < data.lists.length; i++){
	                        result +=   '<a class="item opacity" href="'+data.lists[i].link+'">'
	                                        +'<img src="'+data.lists[i].pic+'" alt="">'
	                                        +'<h3>'+data.lists[i].title+'</h3>'
	                                        +'<span class="date">'+data.lists[i].date+'</span>'
	                                    +'</a>';
	                    }
                		if(gayle<6){ //数据条数达到屏幕高度判断 防止数据少时页面不断请求接口
                			// 锁定
	                        me.lock();
	                        // 无数据
	                        me.noData();
                		}
                		
                	}else{
                		// 锁定
                        me.lock();
                        // 无数据
                        me.noData();
                	}
                    // 为了测试，延迟1秒加载
                    setTimeout(function(){
                        $('.lists').append(result);
                        // 每次数据加载完，必须重置
                        dropload.resetload();
                    },1000);
                },
                error: function(xhr, type){
                    alert('Ajax error!');
                    // 即使加载出错，也得重置
                    dropload.resetload();
                }
            });
        }
        
    });
});
...</script>
//---------------------------------------
### 上拉刷新下拉加载 ------------
### 发布者：fangmiaoji





















