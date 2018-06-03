# 这是这个框架的后台公共方法的说明
### 获取详情页的上一篇和下一篇
#### get_pre_next
##### 参数:![文章的ID],![返回DIV的class名字]
##### 返回值:![自带链接的上一篇下一篇html代码]
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
---
