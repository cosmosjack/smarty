<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2018/4/21
 * Time: 15:39
 * QQ:  997823131 
 */
class whlist {
    public function index(){
        /* 判断是否是手机端 start */
        if($GLOBALS['is_mobile']){
            $this->mobile_index();
            die();
        }
        /* 判断是否是手机端 end */

        $this->display();
    }

    function mobile_index(){
        // 分类直接用的是中文
        // is_more 是否有跟多部
        // tag 标签
        // 名字
        /* 根据传进来的值获取视频列表 可以有关键词 和标签 分类 只搜素第一集 start */

        /* 根据传进来的值获取视频列表 可以有关键词 和标签 分类 end */
        $this->display('index');
    }

    /* 搜索页面 */
    function search(){
        $this->display();
    }
}
