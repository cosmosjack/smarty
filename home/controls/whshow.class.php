<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2018/4/21
 * Time: 15:39
 * QQ:  997823131 
 */
class whshow {
    public function index(){
        /* 判断是否是手机端 start */
        if($GLOBALS['is_mobile']){
            $this->mobile_index();
            die();
        }
        /* 判断是否是手机端 end */
        $db_news = D("news");

        $default_column = $this->get_default_column();
//            p($default_column);
        $this->assign("data_column",$default_column);

        //左侧数据 start
        $db_news_cls = D('news_cls');
        $data_news_cls = $db_news_cls->where(array('cls_pid'=>29))->select();
        foreach($data_news_cls as $k=>$v){
            $tmp_data = $db_news->field("news_id,news_name,news_cls_id")->where(array('news_cls_id'=>$v['news_cls_id']))->order("add_times desc")->limit(3)->select();
            $data_news_cls[$k]['news_data'] = $tmp_data;
        }
        $json_data['left_data'] = $data_news_cls;
        //左侧数据 end
        
        $data_news = $db_news->where(array('news_id'=>$_GET['id']))->find();
        $data_news['news_body'] = htmlspecialchars_decode($data_news['news_body']);
        $json_data['data_news'] = $data_news;
        $this->assign("json_data",$json_data);

        $this->display();
    }

    function mobile_index(){
        $this->display('index');
    }
}
