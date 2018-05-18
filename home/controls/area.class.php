<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2017/11/15
 * Time: 9:41
 * QQ:  997823131 
 */
class area{
    function get_area(){
        $db_area = D('area');
        $where['pid'] =  $_GET['area_id']?$_GET['area_id']:'0';
        $data_area = $db_area->where(array('area_parent_id'=>$_GET['area_id']))->select();
        ajaxReturn(array('data'=>$data_area),"JSON");
    }
}