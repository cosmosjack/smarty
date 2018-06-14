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
        $data_mongo = $mongo->getAll("tasks");
        p($data_mongo);
        /* 通过mongodb 获取视频列表 end */
    }
}