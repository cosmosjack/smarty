<?php
	class Common extends Action {
		function init(){
            /* 判断是否登录 成功 start */
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] && !empty($_SESSION['is_login'])){
//                echo '已经登录';
                //logo 公司名字 简介 start
                $db_site = D('site_setting');
                $data_site = $db_site->select();
                for($i=0;$i<count($data_site);$i++){
                    $data[$data_site[$i]['site_key']] = $data_site[$i]['site_value'];
                }
//            p($data);
//            p($_GET);
                $this->assign("data_site",$data);
                //logo 公司名字 end
                return true;
            }else{
                $this->redirect("admin/login");
            }
            /* 判断是否登录 成功 end */
		}
	}