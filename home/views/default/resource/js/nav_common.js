/**
 * Created by Administrator on 2017/11/16.
 */
$(".mobile_nav").children("li").each(function(k,v){
    console.log(k);
    if(k==1){
        $(v).click(function(){
            location.href = "http://www.zhongguoyuncai.com/index.php/goods_list/index/type/news/cls_id/2/hover_id/1";
        });
    }else if(k==2){
        $(v).click(function(){
            location.href = "http://www.zhongguoyuncai.com/index.php/goods_list/index/type/news/cls_id/23/hover_id/2";
        });
    }else if(k==3){
        $(v).click(function(){
            location.href = "http://www.zhongguoyuncai.com/index.php/goods_list/index/type/news/cls_id/26/hover_id/3";
        });
    }else if(k==4){
        $(v).click(function(){
            location.href = "http://www.zhongguoyuncai.com/index.php/goods_list/index/type/news/cls_id/19/hover_id/4";
        });
    }else if(k==5){
        $(v).click(function(){
            location.href = "http://www.zhongguoyuncai.com/index.php/user/login";
        });
    }else{
        $(v).click(function(){
            $(this).find('ul').slideToggle();
            $('.mobile_nav li').find('ul').not($(this).find('ul')).slideUp();
        });
    }

});
