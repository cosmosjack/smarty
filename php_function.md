# 这是这个框架的后台公共方法的说明

### 获取详情页的上一篇和下一篇
#### get_pre_next
##### 参数:![文章的ID],![返回DIV的class名字]
##### 返回值:![自带链接的上一篇下一篇html代码，默认 div 的class 为wh_pre_next]
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

### 获取详情页的面包屑
#### whshow_position
##### 参数:![文章或内容或产品ID],![返回DIV的class名字]
##### 返回值:![面包屑的html代码 默认div 的class 为 whshow_position]
```php
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
```
---

### 获取某个分类的信息和它所有子分类的信息，不传参数则默认查所有分类信息
#### getChildArr
##### 参数:![分类的父级id，0查所有],![当前分类的id，有的话就会返回当前分类信息，否则只返回所有子类信息]
##### ![递归返回的分类数组信息，可不用传]，![递归的层级，可不用传]
##### 返回值:![分类的数组信息]
```php
function getChildArr($pid=0,$init_cid=false,$data_cls=array(),$level=0){
    $db_cls = D('news_cls');
    $rows = $db_cls
        ->field('news_cls_id,news_cls_name,cls_pid,level,news_cls_pic')
        ->where(array("cls_pid"=>$pid))
        ->select(); //21 产品
    //返回结果集
    if($init_cid){
        $data_init = $db_cls->where(array('news_cls_id'=>$init_cid))->find();
        array_unshift($data_cls,$data_init);
    }
    //p($rows);return false;exit();
    //判断程序执行的条件
    if(!empty($rows) && $level<20){
        //递归调用，得到下一级的节点集
        foreach($rows as $key=>$value){
            $data_cls[]=$value;
            $pid=$value['news_cls_id'];
            $next_level=$level+1;
            $data_cls=getChildArr($pid,$init_cid=false,$data_cls,$next_level);
        }
    }
    return $data_cls;
}
```
---

### 百度主动推送接口，在使用时需在admin.php里面定义常量BAIDU_API，这是百度推送的接口地址
### 登录百度站长后可以获取到
#### tuisong_baidu
##### 参数:![要推送的链接，数组形式]
##### 返回值:![推送的结果，数组形式]
```php
function tuisong_baidu($urls = array()){
    // $urls = array(
    //     'http://www.example.com/1.html',
    //     'http://www.example.com/2.html',
    // );
    // $api = 'http://data.zz.baidu.com/urls?site=https://www.shikexu.com&token=oLeKZk0QV85zoxXF';
    $ch = curl_init();
    $options =  array(
        CURLOPT_URL => BAIDU_API,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => implode("\n", $urls),
        CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
    );
    // p($options);
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    return $result;
}
```
---
### 根据经纬度获取点与点之间的距离
#### distance
##### 参数:![第一个点的经度，第一个点的纬度,第二个点的经度，第二个点的纬度,单位 K]
##### 返回值:![距离单位（米）]
```php
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}
```
---
