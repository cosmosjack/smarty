*上拉加载下拉刷新插件*

demo存放地址：public\resource\plugins\dist\index.html

使用说明：

*1、调用插件js,css*

<script src='js/jquery-1.8.3.min.js' type="text/javascript"></script><!--jq的js,必调，1.8以上版本-->
<link rel="stylesheet" type="text/css" href="css/style.css" /><!--个人样式，自己写，可不必调用-->
<link rel="stylesheet" href="dist/dropload.css">  <!--插件样式,必须调用-->
<script src="dist/dropload.min.js"></script><!--插件js,必须调用-->

*2、接口数据调用*

<script>
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
            domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>',
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
</script>

*接口数据调用*