<?php
	class Index {
		function index(){
            // 线上的
            /* 判断是否是手机端 start */
            if($GLOBALS['is_mobile']){
                $this->mobile_index();
                die();
            }
            /* 判断是否是手机端 end */

            $db_news = D("news");

            $default_column = $this->get_default_column();
//            p($default_column);
            $this->assign("data_column",$default_column);

            /* 整理首页的数据 start */

            //首页banner图
            $data_banner = $this->get_banner();
            $this->assign("home_adv",$data_banner);

            // 公司简介信息 在 init 里边

            //左侧数据 start
            $db_news_cls = D('news_cls');
            $data_news_cls = $db_news_cls->where(array('cls_pid'=>29))->select();
            foreach($data_news_cls as $k=>$v){
                $tmp_data = $db_news->field("news_id,news_name,news_cls_id")->where(array('news_cls_id'=>$v['news_cls_id']))->order("add_times desc")->limit(3)->select();
                $data_news_cls[$k]['news_data'] = $tmp_data;
            }
            $json_data['left_data'] = $data_news_cls;
            //左侧数据 end
            /* 右侧数据 start */
            $data_right = $db_news_cls->where(array('cls_pid'=>2))->select();
            foreach($data_right as $k=>$v){
                $tmp_data = $db_news->field("news_id,news_name,news_cls_id")->where(array('news_cls_id'=>$v['news_cls_id']))->order("add_times desc")->limit(12)->select();
                $data_right[$k]['news_data'] = $tmp_data;
            }
            $json_data['right_data'] = $data_right;
            /* 右侧数据 end */

            // 底部外链
            $db_link = D('link');
            $data_link = $db_link->where(array())->select();
            $json_data['link'] = $data_link;
//            p($json_data);
            // 推荐产品 默认10个
            $recommend_news = $this->get_recommend_info();
//            p($recommend_news);
            $this->assign("recomend_news",array("data"=>$recommend_news,'url_pre'=>SHOP_SITE_URL."/public/uploads/news/"));
            $this->assign("json_data",$json_data);


            /* 整理首页的数据 end */

            $this->display();
		}

        function mobile_index(){
            $db_news = D('news');
            $db_cls = D('news_cls');
            $db_link = D('link');
            $json_data['pic_path'] = $GLOBALS['public']."/uploads/news/";
            $json_data['link_path'] = $GLOBALS['root']."/uploads/links/";


            /* 轮播图 start */
            $data_banner = $this->get_banner();
            $this->assign("home_adv",$data_banner);
            /* 轮播图 end */

            /* 栏目 start */
            $default_column = $this->get_default_column();
//            p($default_column);
            $this->assign("data_column",$default_column);
            /* 栏目 end */

            /* 新闻中心 从ID是2的分类中取数据 6个 start */
            $news_cls_arr = $this->get_cls_list(2);

            $data_news_top = $db_news->where(array('news_cls_id'=>$news_cls_arr))->limit(6)->order("add_times desc")->select();
            foreach($data_news_top as $k =>$v){
                $data_news_top[$k]['news_body'] = htmlspecialchars_decode($v['news_body']);
            }
            $json_data['data_news_top'] = $data_news_top;

            /* 新闻中心 end */

            /* 类别列表 4个加内容 start */
            $pro_cls_arr = $db_cls->where(array('cls_pid'=>29))->order('sort asc')->limit(4)->select();
            foreach($pro_cls_arr as $k=>$v){
                $data_pro = $db_news->where(array('news_cls_id'=>$v['news_cls_id']))->order("add_times desc")->limit(6)->select();
                foreach($data_pro as $key=>$val){
                    $data_pro[$key]['news_body'] = htmlspecialchars_decode($val['news_body']);
                }
                $pro_cls_arr[$k]['son_data'] = $data_pro;
            }
            $json_data['pro_cls_arr'] = $pro_cls_arr;
            /* 类别列表 4个加内容 end */

            /* 关于我们文章 start */
            $data_about = $db_news->where(array('news_id'=>122))->find();
            $data_about['news_body'] = htmlspecialchars_decode($data_about['news_body']);
            /* 关于我们文章 end */

            /* 三篇推荐文章 start */
            $recomend_data = $this->get_recommend_info(3);
            $json_data['recomend_data'] = $recomend_data;
            /* 三篇推荐文章 end */

            /* 友情链接 start */
            $data_link = $db_link->where(array())->limit(8)->select();
            /* 友情链接 end */
            $json_data['data_link'] = $data_link;
            $this->assign("json_data",$json_data);
            $this->display('index');
        }

	}