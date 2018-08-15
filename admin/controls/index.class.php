<?php
	class Index {
		function index(){
            $this->display();
		}
        function show_main(){
            $this->display();
        }

        /**
		 * [生成网站地图]
		 */
		function createSitemap(){
		    $db_news_cls = D('news_cls');
		    $db_news = D('news');
		    $cls_data = $db_news_cls->field('news_cls_id,news_cls_name')->select();
		    $news_data = $db_news->field('news_id,news_name')->select();

		    /*生成sitemap.xml satrt*/
		    $sitemap = new sitemap();
		    $sitemap->AddItem(SHOP_SITE_URL,1);
		    foreach ($cls_data as $key => $val) {
		        $sitemap->AddItem(SHOP_SITE_URL.'/whlist?cid='.$val['news_cls_id']);
		    }
		    foreach ($news_data as $key => $val) {
		        $sitemap->AddItem(SHOP_SITE_URL.'/whshow?id='.$val['news_id']);
		    }
		    $sitemap->SaveToFile('sitemap.xml');
		    /*生成sitemap.xml end*/

		    /*生成sitemap.txt start*/
		    $sitemap->Build_txt();
		    $sitemap->SaveToFile('sitemap.txt');
		    /*生成sitemap.txt end*/
		    // $this->success('成功',2,'index/index');
		    $str = '<script type="text/javascript">alert("网站地图更新成功")</script>';
		    echo $str;
		}
	}