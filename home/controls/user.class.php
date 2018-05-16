<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2017/6/19
 * Time: 10:33
 * QQ:  997823131 
 */
class user{
    function index(){
        $this->display();
    }
    // 登录
    function login(){
        if(isset($_POST['sub']) && !empty($_POST['sub'])){
//            echo '要登录了';

            $db_user = D('users');

            $data_user = $db_user->where(array('user_name'=>$_POST['user_name'],'passwd'=>md5($_POST['passwd'])))->find();
            if($data_user){
//                echo '登录成功';
                /* 存入 session 和 cookie start */
                $_SESSION['is_login'] = 1;
                $_SESSION['user_info'] = $data_user;

                /* 存入 session 和 cookie end */
                $this->redirect('user_info');
            }else{
//                echo '账号或密码不正确';
                $this->error('账号或密码不正确',1);
            }
        }else{
//            echo '没有登录';
            $this->display();
        }
    }

    function logout(){
        $_SESSION = array();
        session_destroy();
        $this->redirect('/index/index');

    }
    function user_info(){
//        P($_SESSION);
        /* 根据 用户获取 个人的所有信息  收藏过的文章 start */
        $this->assign("pic_url",SHOP_SITE_URL.DS."uploads".DS."user".DS.$_SESSION['user_info']['user_pic']);
        $this->assign("user_info",$_SESSION['user_info']);
        $db_news = D('news');
        $data_news = $db_news
            ->field('news_id,news_name,news_pname,news_pic,add_times')
            ->limit(5)->order('add_times desc')->select();

        for($i=0;$i<count($data_news);$i++){
            $data_news[$i]['pic_url'] = SHOP_SITE_URL.DS."public".DS."uploads".DS."news".DS.$data_news[$i]['news_pic'];

        }
//        P($data_news);
        $this->assign('data_news',$data_news);
        /* 根据 用户获取 个人的所有信息  收藏过的文章 end */

        /* 判断今天是否签到过 start */
        $db_user_sign = D('user_sign');
        $today = date("Y-m-d",time());
        $data_user_sign = $db_user_sign->where(array('sign_day'=>$today,'user_id'=>$_SESSION['user_info']['id']))->find();
        $sign_total = $db_user_sign->where(array('sign_day'=>$today,'user_id'=>$_SESSION['user_info']['id']))->total();
        $this->assign('sign_total',$sign_total);
        if($data_user_sign) {
//                echo '已经签过到了';
            $this->assign('is_sign','已签到');
        }else{
            $this->assign('is_sign','签到');
        }
        /* 判断今天是否签到过 end */

        /* 招商信息start */
        $db_investment = D('investment');
        $data_investment = $db_investment->order("time desc")->limit(20)->select();
        $this->assign("data_investment",$data_investment);
        /* 招商信息 end */

        /* 需求信息 start */
        $db_demand = D("demand");
        $data_demand = $db_demand->order("time desc")->limit(20)->select();
        $this->assign("data_demand",$data_demand);
        /* 需求信息 end */
        $this->display();
    }
    // 用户签到 获取积分
    function user_sign(){
        if($_SESSION['is_login']){
            //判断今天是否签到过
            //  增加积分记录
            $db_user_sign = D('user_sign');
            $today = date("Y-m-d",time());
            $data_user_sign = $db_user_sign->where(array('sign_day'=>$today,'user_id'=>$_SESSION['user_info']['id']))->find();
            if($data_user_sign){
//                echo '已经签过到了';
                ajaxReturn(array('control'=>'user_sing','code'=>0,'msg'=>'已经签过到了'),"JSON");
            }else{
//                echo '没有签过到';
                $insert['sign_day'] = $today;
                $insert['sign_time'] = time();
                $insert['user_id']  = $_SESSION['user_info']['id'];
                $insert['user_name']  = $_SESSION['user_info']['user_name'];
                $row = $db_user_sign->insert($insert);
                if($row){
//                    echo '签到成功，增加积分';
                    $db_integral_log = D('integral_log');
                    $insert_integral['type'] = "签到";
                    $insert_integral['type_id'] = $row;
                    $insert_integral['integral'] = 1;
                    $insert_integral['add_time'] = time();
                    $insert_integral['user_id'] = $insert['user_id'];
                    $insert_integral['user_name'] = $insert['user_name'];
                    $result = $db_integral_log->insert($insert_integral);
                    if($result){
                        $db_user = D('users');
                        $result_user = $db_user->where($insert['user_id'])->update("integral = integral+1");
                        if($result_user){
//                            echo '最终签到成功';
                            ajaxReturn(array('control'=>'user_sing','code'=>200,'msg'=>'签到成功'),"JSON");
                        }else{
//                            echo '最终签到不成功';
                            $db_integral_log->delete($result);
                            $db_user_sign->delete($row);
                            ajaxReturn(array('control'=>'user_sing','code'=>0,'msg'=>'增加积分失败'),"JSON");
                        }
                    }else{
                        $db_user_sign->delete($row);
                        ajaxReturn(array('control'=>'user_sing','code'=>0,'msg'=>'签到记录失败'),"JSON");
                    }
                }else{
//                    echo '签到不成功';
                    ajaxReturn(array('control'=>'user_sing','code'=>0,'msg'=>'签到不成功'),"JSON");

                }
        }
        }else{
//            echo '你还没有登录，请登录';
            ajaxReturn(array('control'=>'user_sing','code'=>0,'msg'=>'签到成功'),"JSON");

        }

    }
    //注册
    function register(){
        /* 判断验证码是否通过 start */
        $code =  strtoupper($_POST['code']);
        if($code == $_SESSION['code']){
            /* 整理数据 start */
            $insert['user_name'] = $_POST['user_name'];
            if($_POST['passwd'] == $_POST['repasswd']){
                $insert['passwd'] = md5($_POST['passwd']);
            }else{
                $this->error('两次密码不一样');
                exit;
            }
            $insert['user_name'] = $_POST['user_name'];
            /* 整理数据 end */
            $db_user = D('users');
            $result = $db_user->insert($insert);
            if($result){
//                echo '调转到登陆界面并传送用户名字';
                $this->assign('user_name',$_POST['user_name']);
                $this->display("login");
            }else{
                $this->error('用户已被注册',1,'/user/index');
            }

        }else{
            $this->error('验证码不通过',1,"/user/index");
            exit;
        }
        /* 判断验证码是否通过 end */
    }
    // 收藏接口
    function favorite(){
        if($_SESSION['is_login']){
            echo '登录了';

        }else{
            echo '没有登录';
        }
    }
    //第一次阅读文章接口
    function read_news(){
        if($_SESSION['is_login']){
            echo '登录了';

        }else{
            echo '没有登录';
        }
    }
    //修改个人信息
    function mod_info(){
        if($_SESSION['is_login']){
//            echo '登录了';
            if(isset($_POST['sub']) && !empty($_POST['sub'])){
//                echo '修改';
//                P($_POST);
                $db_user = D('users');
                $upload = new FileUpload();
                $upload->set('path','./uploads/user');
                $result_upload = $upload->upload('img_show');

                if($result_upload){
                    $_POST['user_pic'] = $upload->getFileName();
                }
                $result = $db_user->where(array('id'=>$_SESSION['user_info']['id']))->update($_POST);
                if($result){
                    $_SESSION['user_info'] = $db_user->where(array('id'=>$_SESSION['user_info']['id']))->find();
                    $this->success('修改成功');
                }else{
                    $this->error('无任何修改');
                }
            }else{
//                P($_SESSION);
                $this->assign("pic_url",SHOP_SITE_URL.DS."uploads".DS."user".DS.$_SESSION['user_info']['user_pic']);
                $this->assign("user_info",$_SESSION['user_info']);
                $this->display();
            }
        }else{
//            echo '没有登录';
        }
    }

    function code(){
        /* 验证码 start */
        $code = new Vcode();
        echo $code;
        /* 验证码 end */
    }
    function get_msg(){
        if(isset($_POST['sub'])){

            $db_agent_msg = D('agent_msg');
            $data_agent_msg = $db_agent_msg->where(array('to_staff_id'=>$_SESSION['user_info']['id'],'staff_state'=>1))->select();
            if($data_agent_msg){
                foreach($data_agent_msg as $key=>$val){
                    $msg_body[] = $val['msg'];
                    $msg_id_arr[] = $val['id'];
                    $msg_title_arr[] = $val['msg_title'];
                }
                ajaxReturn(array('control'=>'get_msg','code'=>200,'msg'=>'请求成功','data'=>array('has_msg'=>1,'msg_body'=>$msg_body,'msg_id_arr'=>$msg_id_arr,'msg_title_arr'=>$msg_title_arr)),"JSON");
            }else{
                ajaxReturn(array('control'=>'get_msg','code'=>0,'msg'=>'请求成功但没有消息'),"JSON");
            }
        }else{
            ajaxReturn(array('control'=>'get_msg','code'=>0,'msg'=>'非法请求'),"JSON");
        }
    }
    function change_msg(){
        $db_agent_msg = D('agent_msg');
        $update['staff_state'] = 2;
        $result = $db_agent_msg->where(array('to_staff_id'=>$_SESSION['user_info']['id'],'staff_state'=>1,'id'=>$_GET['msg_id']))->update($update);
        if($result){
            ajaxReturn(array('control'=>'change_msgOp','code'=>200,'msg'=>'读取成功'),"JSON");
        }else{
            ajaxReturn(array('control'=>'change_msgOp','code'=>0,'msg'=>'读取失败','get'=>$_GET),"JSON");
        }
    }
}