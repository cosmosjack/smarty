<?php
	//全局可以使用的通用函数声明在这个文件中.
function is_mobile_request()
{
    $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
    $mobile_browser = '0';
    if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))
        $mobile_browser++;
    if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))
        $mobile_browser++;
    if(isset($_SERVER['HTTP_X_WAP_PROFILE']))
        $mobile_browser++;
    if(isset($_SERVER['HTTP_PROFILE']))
        $mobile_browser++;
    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
    $mobile_agents = array(
        'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
        'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
        'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
        'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
        'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
        'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
        'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
        'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
        'wapr','webc','winw','winw','xda','xda-'
    );
    if(in_array($mobile_ua, $mobile_agents))
        $mobile_browser++;
    if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)
        $mobile_browser++;
    // Pre-final check to reset everything if the user is on Windows
    if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)
        $mobile_browser=0;
    // But WP7 is also Windows, with a slightly different characteristic
    if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)
        $mobile_browser++;
    if($mobile_browser>0)
        return true;
    else
        return false;
}
/*  通过cls_id  来查询自己的下级cls_id  列表 默认是产品ID 21 start */
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
/*  通过cls_id  来查询自己的下级cls_id  列表 默认是产品ID 21 start */

/* 百度主动推送 start*/
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
/* 百度主动推送 end*/

/* 根据内容ID获取上一篇 和下一篇 start */
function get_pre_next($id=1,$class='wh_pre_next'){
    $str = '';
    $str .= '<div class="'.$class.'">';
    $db = D('news');
    $data_pre = $db->where(array('news_id <'=>$id))->order("news_id desc")->find();
    $data_next = $db->where(array('news_id >'=>$id))->order("news_id asc")->find();

    if($data_pre){
        $pre_id = $data_pre['news_id'];
        $pre_desc = $data_pre['news_name'];
        $str .= '<span>上一篇:</span><a href="'.SHOP_SITE_URL.'/whshow?id='.$pre_id.'">'.$pre_desc.'</a>';
    }else{
        $str .='<span>上一篇:</span><a href="javascript:;">没有上一篇</a>';
    }

    if($data_next){
        $next_id = $data_next['news_id'];
        $next_desc = $data_next['news_name'];
        $str .= '<span>下一篇:</span><a href="'.SHOP_SITE_URL.'/whshow?id='.$next_id.'">'.$next_desc.'</a>';
    }else{
        $str .='<span>下一篇:</span><a href="javascript;">没有下一篇</a>';
    }

    $str .='</div>';
    return $str;
}
/* 根据内容ID获取上一篇 和下一篇 end */

/* 获取详情页的定位 面包屑 start */
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
/* 获取详情页的定位 面包屑 end */
