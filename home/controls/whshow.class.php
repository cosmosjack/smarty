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

        $this->display();
    }

    function mobile_index(){
        $this->display('index');
    }
    function play(){
        /* 根据传递进来的 obj_id 获取视频信息 或者直接传递所有的视频信息 start */

        /* 根据传递进来的 obj_id 获取视频信息 或者直接传递所有的视频信息 end */
        $this->display();
    }


}
