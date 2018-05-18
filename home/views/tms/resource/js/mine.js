$(".wwxx").hover(
  function () {
    $(".floatwx").fadeIn();
  },
  function () {
    $(".floatwx").fadeOut();
  }
);


$(".ttel").hover(
  function () {
    $(".floattel").fadeIn();
  },
  function () {
    $(".floattel").fadeOut();
  }
);

$(function(){
	$("#dftop").click(function(){
		$('html,body').animate({'scrollTop':0},1000);
		})
		
var navH = $(".floatright").offset().top;

//滚动条事件

$(window).scroll(function(){

//获取滚动条的滑动距离

var scroH = $(this).scrollTop();

//滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定

if(scroH>=navH){
$(".floatright").stop().animate({top:scroH});
}else if(scroH<navH){
$(".floatright").stop().animate({top:navH});
}

/*end*/	
	
	
});		
	
		
		
	})