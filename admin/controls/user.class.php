<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2017/6/6
 * Time: 9:06
 * QQ:  997823131 
 */
class user{
    function index(){

    }
    // 添加会员
    function add_user(){

        if(isset($_POST['sub'])){
//            P($_POST);
//            die;
            $db_user = D('users');
            $_POST['passwd'] = md5($_POST['passwd']);
            $row = $db_user->insert($_POST);
            if($row){
                $this->success('新增成功','user_list');
            }else{
                $this->error('新增失败');
            }
        }else{
            $this->display();
        }
    }
    // 会员列表
    function user_list(){
        $db_user = D('users');
        $page = new Page($db_user->total(),8);

        $data_user = $db_user->limit($page->limit)->select();
        $this->assign('data_user',$data_user);
        $this->assign('fpage',$page->fpage());
        $this->display();

    }
    // 会员修改
    function mod_user(){
        echo '修改会员信息';
        $this->display();
    }
    // 会员积分记录
    function integral_record(){
        echo '会员的积分记录';
        $this->display();
    }
    //发送通知
    function send_msg(){
        /* 获取自己的员工列表 start */
        /* 判断是否是超级管理员 start  */
//        $db_staff = new Dpdo();
//        $db_staff->setTable('agent_user');
//        if($_SESSION['agent_user']['role']==='0'){
//
//            $data_staff = $db_staff->where(array('role >'=>0))->select();
//        }else{
////            echo '不是零';
//            $data_staff = $db_staff->where(array('pid'=>$_SESSION['agent_user']['id']))->select();
//
//        }
////        P($data_staff);
//        Tpl::output('data_staff',$data_staff);
        /* 判断是否是超级管理员 end  */
        /* 获取自己的员工列表 end */
//        echo 'ddd';
//        P($_POST);
//        $this->display();
//        die;
        if(isset($_POST['sub']) && !empty($_POST['sub'])){

            $staff_arr = explode("|",$_POST['to_staff_id']);
            $db_agent_msg = D('agent_msg');
            $insert['msg_time'] = time();
            $insert['msg_title'] = $_POST['msg_title'];
            $insert['msg'] = $_POST['msg'];
            $insert['agent_id'] = $_SESSION['user_info']['admin_id'] ? $_SESSION['user_info']['admin_id'] : 0;
            $insert['agent_name'] = $_SESSION['user_info']['admin_name'] ? $_SESSION['user_info']['admin_name'] : 0;
            $insert['ip'] = $_SERVER["REMOTE_ADDR"];

            for($i=0;$i<count($staff_arr);$i++){
                $insert['to_staff_id'] = $staff_arr[$i];
                $result = $db_agent_msg->insert($insert);
            }

            if($result){
//                echo '发送通知成功';
                $this->success('发送通知成功');
            }else{
                $this->error('发送通知失败');
            }
        }else{
            $this->display();
        }
    }
}