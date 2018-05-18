<?php
	class Common extends Action {
		function init(){
            $this->assign("site_title",'法斯特');

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
            if($_SESSION['is_login']){
                $this->assign('is_login',1);//登录了
            }else{
                $this->assign('is_login',2);//没有登录
            }
		}
        /* 公共栏目的输出 start */
        function get_default_column(){
            $db_column = D('column');
            $data_column = $db_column
                ->where(array('level'=>1))
                ->order("sort asc")
                ->select();
            for($j=0;$j<count($data_column);$j++){
                $data_second_column = $db_column
                    ->where(array('cls_pid'=>$data_column[$j]['cls_id'],'type'=>$data_column[$j]['type'],'level'=>2))
                    ->order('sort asc')
                    ->select();
                $data_column[$j]['son_data'] = $data_second_column;
            }
            $index_page['id'] = '1';
            $index_page['cls_name'] = '首页';
            $index_page['cls_id'] = '0';
            $index_page['type'] = '1';
            $index_page['sort'] = '0';
            $index_page['level'] = '1';
            $index_page['url'] = $GLOBALS["app"];
            $index_page['cls_pid'] = 0;
            $index_page['son_data'] = array();
            array_unshift($data_column,$index_page);
//            $this->assign("data_column",$data_column);
//            P($data_column);
            return $data_column;
        }
        /* 公共栏目的输出 end */

        /* banner图 start */
        function get_banner(){
            $db_site = D('home_adv');
            $data_site = $db_site->select();
            for($i=0;$i<count($data_site);$i++){
                if($data_site[$i]['type'] == 1){
                    $data_site[$i]['pic_url'] = $data_site[$i]['img_url'];
                }else{
                    $data_site[$i]['pic_url'] = $GLOBALS["public"]."uploads/home_adv"."/".$data_site[$i]['img_path'];
                }
            }
//            p($data_site);
            return $data_site;
        }
        /* banner图 end */

        /* 获取当前位置 start */
        function get_now_position($cls_id){  //21 23
            $db_column = D('news_cls');
            // 当前位置 start // 可以增加级别
            $cls_type = 1;
            if($cls_id){
                if($_GET['type'] == 'news'){
                    $cls_type = 1;
                }elseif($_GET['type'] == 'pro'){
                    $cls_type = 2;
                }

                $position_data = $db_column->where(array('news_cls_id'=>$cls_id))->find();
                $position[1] = $position_data['news_cls_name'] ? $position_data['news_cls_name'] : "";

            }else{
                $this->error("请选择类别");
            }
//            P($position_data);
            $position[0] = $_GET['type'];
            if($position_data){
                if($position_data['level'] ==1){
                    end:
                    $position_html = "<a href='http://{$GLOBALS["_SERVER"]['SERVER_NAME']}'>首页</a>>
<a href='javascript:;'>".$position[1]."</a>";
                }elseif($position_data['level'] ==2){
                    /* 查出自己的父级 start */
                    $data_parent_column = $db_column
                        ->where(array('type'=>$position_data['type'],'news_cls_id'=>$position_data['cls_pid']))
                        ->find();
                    if(!$data_parent_column){
                        goto end;
                    }
                    /* 查出自己的父级 end */

                    $position_html = " <a href='http://{$GLOBALS["_SERVER"]['SERVER_NAME']}'>首页</a>>
<a href='{$GLOBALS["url"]}/{$_GET['a']}/choose/{$_GET['choose']}/cls_id/{$data_parent_column['news_cls_id']}/pid/{$data_parent_column['news_cls_id']}'>".$data_parent_column['news_cls_name']."</a>>
<a href='javascript:;'>".$position[1]."</a>>";
                }
            }else{
//            echo '没有选择类别';
                $position_html = " <a href='http://{$GLOBALS["_SERVER"]['SERVER_NAME']}'>首页</a>";
            }
            return $position_html;
            // 当前位置 end
        }
        /* 获取当前位置 end */

        /* 传入一个信息分类ID 获取这个分类的所有上级和下级 数组 start */
        public function get_cls_list($cls_id){
            $db_cls = D('news_cls');
            //先判断level 如果是 1 则是顶级 只需获取下级即可 如果是2 则上级下级都要获取

            $data_cls = $db_cls->where(array("news_cls_id"=>$cls_id))->find(); //21 产品
//            p($data_cls);

            if($data_cls){
                if($data_cls['level'] ==1){
                    end:
                    $data_second_cls = $db_cls->where(array("cls_pid"=>$data_cls['news_cls_id']))->select(); //一级分类  德系ksb  美系 kfc
                    if($data_second_cls){
                        for($i=0;$i<count($data_second_cls);$i++){
                            $data_three_cls = $db_cls->where(array("cls_pid"=>$data_second_cls[$i]['news_cls_id']))->select();
                            if($data_three_cls){
                                $data_second_cls[$i]['son_data'] = $data_three_cls;
                            }else{
                                $data_second_cls[$i]['son_data'] = array();
                            }
                        }
                        $data_cls['son_data'] = $data_second_cls;
                    }else{
                        $data_cls['son_data'] = array();
                    }
                    $result = $data_cls;
                }else{
                    //找到最顶级的 分类

                    $data_parent_cls = $db_cls->where(array("news_cls_id"=>$data_cls['cls_pid']))->find();
                    if($data_parent_cls){
                        while($data_parent_cls['level'] != 1){
                            $data_parent_cls = $db_cls->where(array("news_cls_id"=>$data_parent_cls['cls_pid']))->find();
                            if(!$data_parent_cls){
                                break;
                            }
                        }
                        $data_cls = $data_parent_cls;
                        goto end;
                    }else{
                        return false;
                    }
                }
            }else{
                return false;
            }
            return $result;
        }
        /* 传入一个信息分类ID 获取这个分类的所有上级和下级 数组 end */

        /* 获取相应个数的内容推荐 start */

        //传入要获取的相应的个数 默认是10个
        public function get_recommend_info($num=10){
            $db_site = D("site_setting");
            $data_site = $db_site->where(array("site_key"=>"home_10_recommend"))->find();
            $list_array = explode("|",$data_site['site_value']);
            $db_news = D("news");
            $data_news = $db_news->where(array("news_id"=>$list_array))->select();
            end:
            if($data_news){
                for($i=0;$i<$num;$i++){
                    $data_news[$i]['news_body'] = htmlspecialchars_decode($data_news[$i]['news_body']);
                    if(!$data_news[$i+1]){
                        $data_news[$i+1] = $data_news[$i];
                    }
                }
                return $data_news;
            }else{
                $data_news = $db_news->limit($num)->order('news_id desc')->select();
                if($data_news){
                    goto end;
                }else{
                    return false;
                }
            }
        }
        /* 获取相应个数的内容推荐 end */

        /* 获取产品的类别列表 start */
        function get_goods_cls_list($goods_cls_id=21){
            $db_cls = D("news_cls");
            $data_cls = $db_cls->where(array("cls_pid"=>$goods_cls_id))->select();
            $data[] = $goods_cls_id;
            for($i=0;$i<count($data_cls);$i++){
                $data[] = $data_cls[$i]['news_cls_id'];
                $data_second_cls = $db_cls->where(array('cls_pid'=>$data_cls[$i]['news_cls_id']))->select();
                for($j=0;$j<count($data_second_cls);$j++){
                    $data[] = $data_second_cls[$j]['news_cls_id'];
                }
            }
//            p($data);
            return $data;
        }
        /* 获取产品的类别列表 end */

        /* 传入类别ID 获取他的顶级ID start */
        function get_top_cls($cls_id){
            $db_cls = D("news_cls");
            $data_cls = $db_cls->where(array('news_cls_id'=>$cls_id))->find();
            end:
            if($data_cls){
                $data_parent = $db_cls->where(array('news_cls_id'=>$data_cls['cls_pid']))->find();
                if(!$data_parent){
                    return $data_cls['news_cls_id'];
                }
                $data_cls = $data_parent;
                goto end;
            }else{
                return 0;
            }
        }
        /* 传入类别ID 获取他的顶级ID end */

    }