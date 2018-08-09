<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2017/6/6
 * Time: 9:08
 * QQ:  997823131 
 */
class admin extends Action{
    function index(){

    }
    // 添加管理员
    function admin_add(){
        if(empty($_POST['user_name']) || empty($_POST['user_passwd']))
            $this->error('参数错误');
        $db_admin_user = D('admin_user');
        $info = $db_admin_user->where(array('user_name'=>$_POST['user_name']))->find();
        if(!empty($info))
            $this->error('用户名已存在');
        $insert = array();
        $insert['user_name'] = trim($_POST['user_name']);
        $insert['user_passwd'] = md5(trim($_POST['user_passwd']));
        $insert['last_login_time'] = time();
        $insert['add_time'] = time();
        if($db_admin_user->insert($insert))
            $this->success('添加成功');
        else
            $this->error('添加失败');
    }
    // 管理员列表
    function admin_list(){
        $db_admin_user = D('admin_user');
        $user_list = $db_admin_user->select();
        $this->assign('user_list',$user_list);
        $this->display();
    }
    //修改管理员
    function admin_eidt(){
        $user_id = intval($_POST['user_id']);
        if(empty($user_id) || empty($_POST['user_passwd_new']))
            $this->error('参数错误');
        $db_admin_user = D('admin_user');
        $info = $db_admin_user->where($user_id)->find();
        if(empty($info))
            $this->error('管理员不存在');
        //只允许修改自己的密码
        if($info['user_name'] != $_SESSION['admin_user']['user_name'])
            $this->error('不能修改其他人的密码');
        if($info['user_passwd'] != md5($_POST['user_passwd']))
            $this->error('密码不正确');
        $update = array();
        $update['user_passwd'] = md5($_POST['user_passwd_new']);
        if($db_admin_user->where($user_id)->update($update))
            $this->success('修改成功');
        else
            $this->error('无任何修改');
    }
    //删除管理员
    function del_admin(){
        if($_SESSION['admin_user']['user_name'] != 'admin')
            ajaxReturn(array('control'=>'del_admin','code'=>0,'msg'=>'超级管理员才能删除'));
        $user_id = intval($_POST['user_id']);
        if(empty($user_id))
            ajaxReturn(array('control'=>'del_admin','code'=>0,'msg'=>'参数错误'));
        $db_admin_user = D('admin_user');
        $info = $db_admin_user->where($user_id)->find();
        if(empty($info))
            ajaxReturn(array('control'=>'del_admin','code'=>0,'msg'=>'管理员不存在'));
        if($info['user_name'] == 'admin')
            ajaxReturn(array('control'=>'del_admin','code'=>0,'msg'=>'超级管理员不能删除'));
        if($db_admin_user->where($user_id)->delete())
            ajaxReturn(array('control'=>'del_admin','code'=>200,'msg'=>'删除成功'));
        else
            ajaxReturn(array('control'=>'del_admin','code'=>0,'msg'=>'删除失败'));
    }
    //管理员登录
    function login(){
//        echo '后台的登录界面';
        if(isset($_POST['sub']) && !empty($_POST['sub'])){

                    /* 避免机器提交 规定一分钟内提交最多5次 start  */

                    $db_agent_user = D('admin_user');

                    $data_agent_user = $db_agent_user
                        ->where(array('user_name'=>$_POST['user']),
                            array('email'=>$_POST['user']),
                            array('user_phone'=>$_POST['user'])
                        )->find();
                    if($data_agent_user){
                        /* 判断是否是机器登录 start */
                        $db_agent_login = new Dpdo();
                        $db_agent_login->setTable('agent_login');
                        $data_agent_login = $db_agent_login->where(array('user_id'=>$data_agent_user['user_id']))->find();
                        if(!$data_agent_login){
                            // 如果记录不存在则需要生成一个
                            $insert['user_id'] = $data_agent_user['user_id'];
                            $insert['time'] = time();
                            $db_agent_login->insert($insert);
                        }
                        $a_time = time() - $data_agent_login['time'];
                        if($data_agent_login['num'] >= 5 && $a_time < 60){
                            $update['time'] = time();
                            $db_agent_login->where(array('user_id'=>$data_agent_user['user_id']))->update($update);
//                            ajaxReturn(array('control'=>'login_in','state'=>0,'msg'=>'非法入侵'));
                            $this->error('非法入侵');
                            exit;
                        }
                        /* 判断是否是机器登录 end */
                        if($data_agent_user['user_passwd'] == md5($_POST['passwd'])){
                            $_SESSION['is_login'] = true;
                            $_SESSION['admin_user'] = $data_agent_user;
                            $update['good_time'] = time();
                            $update['num'] = 0;
                            $db_agent_login->where(array('user_id'=>$data_agent_user['user_id']))->update($update);
                            //修改登录时间和登录次数
                            $update = array();
                            $update['times'] = $data_agent_user['times']+1;
                            $update['last_login_time'] = time();
                            $db_agent_user->where($data_agent_user['user_id'])->update($update);
//                            ajaxReturn(array('control'=>'login_in','state'=>200,'msg'=>'登录成功'));

                            $this->redirect("index/index");
                        }else{
                            //第一次密码不对 记录 1
                            $update_login['user_id'] = $data_agent_user['user_id'];
                            $update_login['time'] = time();
                            $time = $update_login['time'] - $data_agent_login['time'];
                            if($time <= 60){// 如果在5分钟内则加一次
                                $update_login['num'] = $data_agent_login['num']+1;
                            }else{
                                $update_login['num'] = 0;
                            }
                            $db_agent_login->where(array('user_id'=>$data_agent_login['user_id']))->update($update_login);
//                            ajaxReturn(array('control'=>'login_in','state'=>0,'msg'=>'密码不正确'));
                            $this->error('密码不正确');
                        }
                    }else{
//                        ajaxReturn(array('control'=>'login_in','state'=>0,'msg'=>'无此用户'));
                        $this->error('无此用户');

                    }
                    /* 避免机器提交 end  */
        }else{
            $this->assign('form_token',$_SESSION['form_token']);
            $this->display();
        }
    }
    function logout(){ //退出
        $_SESSION['is_login'] = false;
        $_SESSION['admin_user'] = '';
        $this->success('退出成功','admin/login');
        $this->redirect('admin/login');
    }
}