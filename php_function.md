<h1 align='center'> 这是这个框架的公共方法的说明</h1>

<h2 align='center'>whshow_position</h2>
<p color="#dd0000">获取详情页的面包屑</p>
<h3>参数:&nbsp;&nbsp;&nbsp;<font size="5" color="#006600">文章或内容或产品ID,返回class 的名字</font></h3>
<h3>返回值:&nbsp;&nbsp;&nbsp;<font size="5" color="#006600">面包屑的html代码 默认div 的class 为 whshow_position</font></h3>
<pre>
function whshow_position($id=1,$class='whshow_position'){
    $db_news = D('news');
    $data_news = $db_news->where(array('news_id'=>$id))->find();
    if(!$data_news){
     $data_news = $db_news->find();
    }
    $str = "";
    $str .="<div class='{$class}'>";
    $str .="<a href='".SHOP_SITE_URL."'>首页</a>";
    $str .="<a href='".SHOP_SITE_URL."/whlist?cid={$data_news['news_cls_id']}'>".$data_news['news_cls_name']."</a>";
    $str .="<a href='".SHOP_SITE_URL."/whshow?cid={$data_news['news_id']}'>".$data_news['news_name']."</a>";
    $str .="</div>";

    return $str;
}
</pre>
<hr color="#006600">

<h2 align='center'>get_pre_next</h2>
<p color="#dd0000">获取详情页的上一篇和下一篇</p>
<h3>参数:&nbsp;&nbsp;&nbsp;<font size="5" color="#006600">文章或内容或产品ID,返回外层DIV 的class 名字</font></h3>
<h3>返回值:&nbsp;&nbsp;&nbsp;<font size="5" color="#006600">返回html代码自带链接,默认 div 的class 为wh_pre_next</font></h3>
```php
function get_pre_next($id=1,$class='wh_pre_next'){
    $str = '';
    $str .= '<div class="'.$class.'">';
    $db = D('news');
    $data_pre = $db->where(array('news_id <'=>$id))->order("news_id desc")->find();
    $data_next = $db->where(array('news_id >'=>$id))->order("news_id asc")->find();

    if($data_pre){
        $pre_id = $data_pre['news_id'];
        $pre_desc = $data_pre['news_name'];
        $str .= '<a href="'.SHOP_SITE_URL.'/whshow?id='.$pre_id.'"><span>上一篇:</span>'.$pre_desc.'</a>';
    }else{
        $str .='<a href="javascript:;"><span>上一篇:</span>没有上一篇</a>';
    }

    if($data_next){
        $next_id = $data_next['news_id'];
        $next_desc = $data_next['news_name'];
        $str .= '<a href="'.SHOP_SITE_URL.'/whshow?id='.$next_id.'"><span>下一篇:</span>'.$next_desc.'</a>';
    }else{
        $str .='<a href="javascript;"><span>下一篇:</span>没有下一篇</a>';
    }

    $str .='</div>';
    return $str;
}

```
<hr color="#006600">