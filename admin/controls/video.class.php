<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2018/6/11
 * Time: 18:34
 * QQ:  997823131 
 */
class video{
    function index(){
        echo 'ccc';
    }
    function video_list(){


        /* 通过mongodb 获取视频列表 自动导入 start */
        //上次同步节点 从这个节点以后再获取数据
        $mongo = new Mgdb();
        $table = 'tasks';
//        $where['orgfile'] = new MongoRegex("/爱情公寓04/");
//        $where['shareid'] = "s6HYTAXi3MOjnB7J";
//        $where['_id'] = new MongoId("5b0e75584bdbe92fa84e4a7d");
        $where = array();
        $sort = '';
        $page = new Page($mongo->getCount($table,$where),6);
        $mongo_page = $page->limit;
        $mongo_page = explode(",",$mongo_page);
        /* 分解 limit 变成参数 skip  和  limit start */
        $mongo_limit = $mongo_page[1];
        $mongo_skip = $mongo_page[0];
        /* 分解 limit 变成参数 skip  和  limit end */
//        p($page->page);
//        p($mongo->getCount($table,$where));
        $data_mongo = $mongo->getAll($table,$where,$sort,$mongo_limit,$mongo_skip);
        p($data_mongo);

        /*$update['tag'] = '惠州万鸿';
        $result = $mongo->toUpdate("tasks",$where,$update);
        p($result);*/
        /* 通过mongodb 获取视频列表 end */
        $this->assign("video_path_pre","http://www.ddd.place");
        $this->assign("data_video",$data_mongo);
        $this->assign("fpage",$page->fpage());
        $this->display();

    }

    /* 视频修改 start */
    function mod_video(){
        ajaxReturn(array('control'=>'mod_video','code'=>200,'msg'=>'成功','data'=>$_POST),"JSON");
    }
    /* 视频修改 end */


}