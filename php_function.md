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
### 根据选中类别ID，返回数据格式，获取无限极分类数据
#### get_cls_html
##### 参数:![默认选中的分类ID不填为0，类型为1时返回HTML代码，类型为2时返回数组数据]
##### 返回值:![HTML代码 或 数组]
```php
/* 获取无限级分类方法 start */
function get_cls_html($cls_id=0,$type=1,$level=1,&$data=array()){
    $db = D('news_cls');
    // type 1 是 HTML 数据  2 是原始数据
    if($level == 1){
        //原始初级
        $data = $db->where(array('level'=>$level))->order("sort asc")->select();
        //html 数据
        $data_html = '<select name="test" class="form-control">';

        if($data){
            foreach($data as $k=>$v){
                if($v['news_cls_id'] == $cls_id){
//                    $data_html .= "<option selected value='".$v['news_cls_id']."'>{$v['level']}级".str_repeat(' ',$v['level']).$v['news_cls_name']."</option>";
                    $data_html .= "<option selected value='".$v['news_cls_id']."'>".str_repeat(' ',$v['level']).$v['news_cls_name']."</option>";
                }else{
                    $data_html .= "<option value='".$v['news_cls_id']."'>".str_repeat(' ',$v['level']).$v['news_cls_name']."</option>";
                }
                $temp_data = $db->where(array('cls_pid'=>$v['news_cls_id']))->order("sort asc")->select();
                if($temp_data){
                    $son_level = $temp_data[0]['level'];
                    if($type == 1){
                        $data_html .= get_cls_html($cls_id,$type,$son_level,$temp_data);
                    }else{
                        $data[$k]['son'] = get_cls_html($cls_id,$type,$son_level,$temp_data);

                    }
                }
            }
            $data_html .= '</select>';
            if($type == 1){
                return $data_html;

            }else{
                return $data;
            }

        }
    }else{
        $data = $data;
        $data_html = '';
        foreach($data as $k=>$v){
            if($v['news_cls_id'] == $cls_id){
                $data_html .= "<option selected value='".$v['news_cls_id']."'>".str_repeat(' |-',$v['level']).$v['news_cls_name']."</option>";
            }else{
                $data_html .= "<option value='".$v['news_cls_id']."'>".str_repeat(' |-',$v['level']).$v['news_cls_name']."</option>";
            }
            $temp_data = $db->where(array('cls_pid'=>$v['news_cls_id']))->order("sort asc")->select();
            if($temp_data){
                $son_level = $temp_data[0]['level'];
                if($type == 1){
                    $data_html .= get_cls_html($cls_id,$type,$son_level,$temp_data);
                }else{
                    $data[$k]['son'] = get_cls_html($cls_id,$type,$son_level,$temp_data);

                }
            }
        }
        if($type == 1){
            return $data_html;

        }else{
            return $data;
        }
    }

}
/* 获取无限级分类方法 end */
```
---

### 判断是PC端还是手机端
#### is_mobile_request
##### 返回值:![true 或者 false]
```php
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
```
---

### 输出各种类型的数据，调试程序时打印数据使用
#### p
##### 参数:![可以是一个或多个任意变量或值]
##### 返回值:![数组或者值]
```php
function p(){
        $args=func_get_args();  //获取多个参数
        if(count($args)<1){
            Debug::addmsg("<font color='red'>必须为p()函数提供参数!");
            return;
        }   
        echo '<div style="width:100%;text-align:left"><pre>';
        //多个参数循环输出
        foreach($args as $arg){
            if(is_array($arg)){  
                print_r($arg);
                echo '<br>';
            }else if(is_string($arg)){
                echo $arg.'<br>';
            }else{
                var_dump($arg);
                echo '<br>';
            }
        }
        echo '</pre></div>';    
    }
```
---

### 快速实例化Model类库
#### D
##### 参数:![$className 类名或表名，$app 应用名,访问其他应用的Model]
##### 返回值:![数据库连接对象]
```php
function D($className=null,$app=""){
        $db=null;   
        //如果没有传表名或类名，则直接创建DB对象，但不能对表进行操作
        if(is_null($className)){
            $class="D".DRIVER;
            $db=new $class;
        }else{
            $className=strtolower($className);
            $model=Structure::model($className, $app);  
            $model=new $model();
            //如果表结构不存在，则获取表结构
            $model->setTable($className);       
            $db=$model;
        }
        if($app=="")
            $db->path=APP_PATH;
        else
            $db->path=PROJECT_PATH.strtolower($app).'/';
        return $db;
}
```
---

### 文件尺寸转换，将大小将字节转为各种单位大小
#### tosize
##### 参数:![$bytes 字节大小]
##### 返回值:![转换后带单位的大小]
```php
function tosize($bytes) {    //自定义一个文件大小单位转换函数
        if ($bytes >= pow(2,40)) {   //如果提供的字节数大于等于2的40次方，则条件成立
            $return = round($bytes / pow(1024,4), 2);    //将字节大小转换为同等的T大小
            $suffix = "TB";    //单位为TB
        } elseif ($bytes >= pow(2,30)) {    //如果提供的字节数大于等于2的30次方，则条件成立
            $return = round($bytes / pow(1024,3), 2);    //将字节大小转换为同等的G大小
            $suffix = "GB";   //单位为GB
        } elseif ($bytes >= pow(2,20)) {  //如果提供的字节数大于等于2的20次方，则条件成立
            $return = round($bytes / pow(1024,2), 2);    //将字节大小转换为同等的M大小
            $suffix = "MB";   //单位为MB
        } elseif ($bytes >= pow(2,10)) {   //如果提供的字节数大于等于2的10次方，则条件成立
            $return = round($bytes / pow(1024,1), 2);    //将字节大小转换为同等的K大小
            $suffix = "KB";   //单位为KB
        } else {     //否则提供的字节数小于2的10次方，则条件成立
            $return = $bytes;   //字节大小单位不变
            $suffix = "Byte";   //单位为Byte
        }
        return $return ." " . $suffix; //返回合适的文件大小和单位
}
```
---

### 关闭调试模式
#### debug
##### 参数:![$falg 调式模式的关闭开关]
##### 返回值:![--]
```php
function debug($falg=0){
        $GLOBALS["debug"]=$falg;
}
```
---

### 创建多级目录
#### createFolder
##### 参数:![$path 参数是一个包含有指向一个文件的全路径的字符串]
##### 返回值:![--]
```php
function createFolder($path) {
        if (!file_exists($path)) {
            createFolder(dirname($path));
            @mkdir($path, 0755);
        }
}
```
---

### 删除文件夹
#### bro_dirdel
##### 参数:![$dir_path 参数是一个包含有指向一个文件的全路径的字符串]
##### 返回值:![--]
```php
function bro_dirdel($dir_path) {
        if (is_file($dir_path)) {
            unlink($dir_path);
        } else {
            $dir_arr = glob(trim($dir_path).'/*');
            if (is_array($dir_arr)) {
                foreach ($dir_arr as $k => $v) {
                    bro_dirdel($v, $type);
                }   
            }
            @rmdir($dir_path);
        }
}
```
---

### 遍历目录
#### bdirs
##### 参数:![$dir 规定要打开的目录路径]
##### 返回值:![索引数组]
```php
function bdirs($dir) {
        $dir = rtrim($dir, "/");
        $d = opendir($dir);
        $dirs = array();
        while($filename= readdir($d)) {
            if($filename !="." && $filename!="..") {
                if(is_dir($dir."/".$filename)) {
                    $dirs[] = $filename;
                }   
            }
        }
        return $dirs;
}
```
---

### 获取ip
#### bro_ip
##### 参数:![--]
##### 返回值:![地址]
```php
function bro_ip() {
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                 $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                 $realip = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $realip = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $realip = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $realip = getenv("HTTP_CLIENT_IP");
            } else {
                $realip = getenv("REMOTE_ADDR");
            }
        }
        return $realip;
}
```
---

### 获取当前网址为下个地址的fromto
#### bro_fromto
##### 参数:![--]
##### 返回值:![fromto=值]
```php
function bro_fromto() {
        $host = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        stripos($host, 'fromto') !== false && $host = substr($host, 0, stripos($host, 'fromto')-1);
        return 'fromto='.urlencode($host);
}
```
---

### 多久以前
#### bro_dayago
##### 参数:![$dmtime 参数是时间戳]
##### 返回值:![多少天前 或者 多少小时前 或者 多少分钟前 或者 多少秒前]
```php
function bro_dayago($dmtime) {
        if (!$dmtime) return '≠';
        if ((time()-$dmtime) > 86400) {
            return intval((time()-$dmtime)/86400).'天前';
        } elseif ((time()-$dmtime) > 3600) {
            return intval((time()-$dmtime)/3600).'小时前';
        } elseif ((time()-$dmtime) > 60) {
            return intval((time()-$dmtime)/60).'分钟前';
        } elseif ((time()-$dmtime) > 0) {
            return (time()-$dmtime).'秒前';
        }   
}
```
---

### 获取文件夹大小
#### bro_dirsize
##### 参数:![$dir_path 参数是一个包含有指向一个文件的全路径的字符串]
##### 返回值:![大小]
```php
function bro_dirsize($dir_path)
    {
        $size = 0;
        if (is_file($dir_path)) {
            $size = filesize($dir_path);
        } else {
            $dir_arr = glob(trim($dir_path).'/*');
            if (is_array($dir_arr)) {
                foreach ($dir_arr as $k => $v) {
                    $size += bro_dirsize($v);
                }
            }
        }
        return $size;
}
```
---