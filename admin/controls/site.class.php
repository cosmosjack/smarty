<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2017/5/27
 * Time: 14:35
 * QQ:  997823131 
 */
class Site{
    function index(){
//        P($GLOBALS["_SERVER"]['SERVER_NAME']);
        $db_site = D('site_setting');
        /* 公司信息 start */
        $data_site = $db_site->select();
        for($i=0;$i<count($data_site);$i++){
            $data[$data_site[$i]['site_key']] = $data_site[$i]['site_value'];
        }
//        p($data);
        $this->assign("data_site",$data);
        /* 公司信息 end */

        /* 当前首页的10个产品推荐 start */
            $data_10_recommend = explode("|",$data['home_10_recommend']);
        if($data_10_recommend[0]){
            $this->assign("data_10_recommend",$data_10_recommend);
        }

        /* 当前首页的10个产品推荐 end */

/* 栏目列表 start */
        // 获取level 为1的为 一级 再获通过cls_id 获取自己的下级
        /*$column_data = $this->get_cls_list("column","cls_id","cls_pid","asc"); // 列表
        P($column_data);*/
        $db_news_cls = D('column');
        // 一级分类
        $data_news_cls = $db_news_cls
            ->where(array('level'=>1))
            ->order("sort asc")
            ->select();
        // 根据一级 获取 二级分类
        if($data_news_cls){
            for($i=0;$i<count($data_news_cls);$i++){
                $data_second_cls = $db_news_cls
                    ->where(array('cls_pid'=>$data_news_cls[$i]['cls_id'],'level'=>2,'type'=>$data_news_cls[$i]['type']))
                    ->order('sort asc')
                    ->select();
                $data_news_cls[$i]['son_data'] = $data_second_cls;
            }
        }
        $this->assign("data_news_cls",$data_news_cls);

//        $this->assign("column_data",$column_data);
/* 栏目列表 end */

//        P($data);



        $this->display();
    }

    function adv_list(){
        $db_site = D('home_adv');
        $data_site = $db_site->select();
        for($i=0;$i<count($data_site);$i++){
            if($data_site[$i]['type'] == 1){
                $data_site[$i]['pic_url'] = $data_site[$i]['img_url'];
            }else{
                $data_site[$i]['pic_url'] = $GLOBALS["public"]."uploads/home_adv"."/".$data_site[$i]['img_path'];
            }
        }
//        P($data_site);

        $this->assign("data_site",$data_site);

        $this->display();
    }

    function mod_adv(){
        $db_home_adv = D('home_adv');
//        P($_POST);
        $data_home_adv = $db_home_adv->where(array('id'=>$_POST['adv_id']))->find();
//        P($data_home_adv);
        $up = new FileUpload();
        $up->set('path','./public/uploads/home_adv');
        $result_up = $up->upload('ad_pic');
        if($result_up){
//            echo '上传成功';
            $file_name = $up->getFileName();
            $update['img_path'] = $file_name;
        }else{
//            echo '上传失败';
            $up->getErrorMsg();
        }
            $update['img_name'] = $_POST['ad_name'];
            $update['img_desc'] = $_POST['ad_desc'];
            $update['img_url'] = $_POST['ad_link'];
        $result = $db_home_adv->where($_POST['adv_id'])->update($update);
        if($result){
            $this->success("修改成功",2,'site/adv_list');
        }else{
            $this->error("没有任何修改",2,'site/adv_list');
        }
    }

    // 栏目添加 只能从当前的所有 类别中选择
    // 分为两级 一级不可以重复  一级中的 二级 也可以在一级里边
    function column_add(){
        $db_column = D('column');
        /* 先判断最大栏目数 并判断当前栏目数 是否过大 start */
        $db_site = D('site_setting');
        $data_site = $db_site->where(array('site_key'=>"column_num"))->find();
        $column_now_num = $db_column->where(array('level'=>1))->total();
        if($column_now_num >= $data_site['site_value']){
            ajaxReturn(array('control'=>'column_add','code'=>0,'msg'=>'栏目数已经过多','data'=>$data_site),"JSON");
        exit;
        }
        /* 先判断最大栏目数 并判断当前栏目数 是否过大 end */

//        ajaxReturn($_POST);
        if($_POST['cls_type'] == 1){
            $db_name = 'news_cls';
            $type_name = 'news';
        }elseif($_POST['cls_type'] == 2){
            $db_name = 'pro_cls';
            $type_name = 'pro';
        }
        $db = D($db_name);
        $data = $db->where($_POST['cls_id'])->find();
        /* 判断 类别 级别 如果是一级 则自动添加二级 */
        if($data){
            if($data['level'] == 1){
                // 获取所自己所有的下级 自动加入
                $cls_son_array = $db->where(array('cls_pid'=>$data['news_cls_id']))->select();
//                ajaxReturn($cls_son_array);
                // 先插入 自己 成功后 插入下级
                // 正常的整理数据 入库
                $insert['cls_name'] = $data['news_cls_name'];
                $insert['cls_id'] = $data['news_cls_id'];
                $insert['type'] = $data['type'];
                $insert['sort'] = $_POST['column_sort'];
                $insert['level'] = 1;
                $insert['url'] = "http://".$GLOBALS["_SERVER"]['SERVER_NAME'].'/whlist?cid='.$insert['cls_id'];
                $insert['cls_pid'] = $data['cls_pid'];
                $result = $db_column->insert($insert);
                if($result){

                    if($cls_son_array){
                        // 如果有儿子 则插入
                        for($i=0;$i<count($cls_son_array);$i++){
                            $insert_son['cls_name'] = $cls_son_array[$i]['news_cls_name'];
                            $insert_son['cls_id'] = $cls_son_array[$i]['news_cls_id'];
                            $insert_son['type'] = $cls_son_array[$i]['type'];
                            $insert_son['sort'] = $cls_son_array[$i]['sort'];
                            $insert_son['level'] = 2;
                            $insert_son['url'] = "http://".$GLOBALS["_SERVER"]['SERVER_NAME'].'/whlist?cid='.$cls_son_array[$i]['news_cls_id'];
                            $insert_son['cls_pid'] = $data['news_cls_id'];
                            $result_son[] = $db_column->insert($insert_son);
                            $array_insert[]= $insert_son;
                        }
                    }
//                    echo '新增成功';
//                    ajaxReturn(array('result'=>$result_son,'insert'=>$array_insert),"JSON");
                    ajaxReturn(array('control'=>'column_add','code'=>200,'msg'=>'新增成功','data'=>$array_insert),"JSON");

                }else{
//                    echo '新增失败';
                    ajaxReturn(array('control'=>'column_add','code'=>0,'msg'=>'新增失败','data'=>$insert),"JSON");
                }

            }else{

                // 正常的整理数据 入库
                $insert['cls_name'] = $data['news_cls_name'];
                $insert['cls_id'] = $data['news_cls_id'];
                $insert['type'] = $data['type'];
                $insert['sort'] = $_POST['column_sort'];
                $insert['level'] = 1;
                $insert['url'] = "http://".$GLOBALS["_SERVER"]['SERVER_NAME'].'/whlist?cid='.$insert['cls_id'];
                $insert['cls_pid'] = $data['cls_pid'];
//                ajaxReturn($insert);
                $result = $db_column->insert($insert);
                if($result){
//                    echo '新增成功';
                    ajaxReturn(array('control'=>'column_add','code'=>200,'msg'=>'新增成功'),"JSON");
                }else{
//                    echo '新增失败';
                    ajaxReturn(array('control'=>'column_add','code'=>0,'msg'=>'新增失败','data'=>$insert),"JSON");
                }
            }
        }else{
//            echo '栏目不存在';
            ajaxReturn(array('control'=>'column_add','code'=>0,'msg'=>'栏目不存在','data'=>$_POST),"JSON");

        }
//        ajaxReturn($data);
    }

    /* 修改首页栏目的URL start */
    public function mod_column_url(){
        $db_column = D("column");
        $update['cls_name'] = $_POST['column_name'];
        $update['url'] = $_POST['column_url'];
        $data_column = $db_column->where($_POST['column_id'])->find();
        $result = $db_column->where($_POST['column_id'])->update($update);
        if($result){
            $db_cls = D("news_cls");
            $update_cls['news_cls_name'] = $_POST['column_name'];
            @$result_cls = $db_cls->where($data_column['cls_id'])->update($update_cls);
            ajaxReturn(array('control'=>'mod_column_url','code'=>200,'msg'=>'修改成功','data'=>$_POST),"JSON");
        }else{
            ajaxReturn(array('control'=>'mod_column_url','code'=>0,'msg'=>'修改失败','data'=>$_POST),"JSON");

        }
    }
    /* 修改首页栏目的URL end */

    //修改首页的信息
    function mod_site_info(){

//        P($_FILES);
//        die();
        $db_site_setting = D("site_setting");
        if(!$_FILES['site_logo']['name']){
            $up = new FileUpload();
            $up->set('path','./public/uploads/home_adv');
            $result_up = $up->upload('site_logo');
            if($result_up){
//            echo '上传成功';
                $file_name = $up->getFileName();
//            P($file_name);
                $update['site_value'] = $file_name;

                $result['site_logo'] = $db_site_setting->where(array('site_key'=>'site_logo'))->update($update);

            }else{
//            echo '上传失败';
                $up->getErrorMsg();
            }
        }

        foreach($_POST as $key=>$val){
//            P($key);
            if(!empty($_POST["$key"])){
                $update["site_value"] = $val;
                $result["$key"] = $db_site_setting->where(array('site_key'=>$key))->update($update);
//                $result = $db_site_setting->where(array('site_key'=>$key))->update($update);
            }

        }

        /*$update['site_value'] = 'ddgdsggdd';
        $result = $db_site_setting->where(array('site_key'=>'%company_name%'))->update($update);
        P($db_site_setting->where(array('site_key'=>'%company_name%'))->find());*/

//        P($result);
        foreach($result as $key=>$val){
            if($val){
                $result_site = true;
//                echo '1';
            }
        }
        if($result_site){
            $this->success("修改成功",2,"site/index");
        }else{
            $this->error("无任何修改");
        }
    }

    /* 获取所有没有被放在首页的栏目 start */
    function get_all_column(){

        $db_column = D('column');
        $data_news_cls = $db_column
            ->where(array('type'=>1))
            ->select();
//        P($data_news_cls);
        $news_cls_array = array();
        if($data_news_cls){
            foreach($data_news_cls as $key=>$val){
                $news_cls_array[] = $val['cls_id'];
            }
        }
//        P($news_cls_array); // 当前已经有的资讯 类别

        $pro_cls_array = array();
        $data_pro_cls = $db_column
            ->where(array('type'=>2))
            ->select();
//        P($data_pro_cls);
        if($data_pro_cls){
            foreach($data_pro_cls as $key=>$val){
                $pro_cls_array[] = $val['cls_id'];
            }
        }
//        P($pro_cls_array); // 当前已经有的产品 类别
        // 获取剩余 资讯栏目
        $sort_news_cls =  $this->surplus_cls_list('news_cls',$news_cls_array);
//        P($sort_news_cls);
        // 获取剩余 产品栏目
        $sort_pro_cls = $data_pro_cls ? $this->surplus_cls_list('pro_cls',$pro_cls_array) : array();
//        P($sort_pro_cls);
        $column_array = array_merge($sort_news_cls,$sort_pro_cls);
//        P($column_array);
        ajaxReturn($column_array,"JSON");



    }
    /* 获取所有没有被放在首页的栏目 end */

    // 获取 分类列表ajax 从小到大 排序
    private function get_cls_list($db_name,$key_id,$pid_id,$sort_type){

        $db_cls = D($db_name);
        $data_first = $db_cls
            ->where(array('level'=>1))
            ->order('sort '.$sort_type)
            ->select();
        $data = array();
        for($i=0;$i<count($data_first);$i++){
            array_push($data,$data_first[$i]);
            $data_second = $db_cls
                ->where(array('level'=>2,"$pid_id"=>$data_first[$i][$key_id],'type'=>$data_first[$i]['type']))
                ->order('sort '.$sort_type)
                ->select();
            if($data_second){
                for($j=0;$j<count($data_second);$j++){
                    array_push($data,$data_second[$j]);
                }
            }
        }
//        P($data);
        return $data;
    }

    // 计算剩余栏目
    private function surplus_cls_list($db_name,$now_cls_array){
        $all_news_cls = $this->get_cls_list($db_name,'news_cls_id','cls_pid','asc');
//        P($all_news_cls);
        foreach($all_news_cls as $key=>$val){
            if(in_array($val['news_cls_id'],$now_cls_array)){
                unset($all_news_cls[$key]);
            }else{
                $sort_news_cls[]=$val;
            }
        }
//        P($sort_news_cls);
        return $sort_news_cls;
    }
    // 排序
    function sort(){
        $db_news_cls = D('column');
        $update['sort'] = $_GET['sort_id'];
        $result = $db_news_cls->where($_GET['cls_id'])->update($update);
        if($result){
            ajaxReturn(array('control'=>'sort','code'=>200,'msg'=>'成功'),"JSON");
        }else{
            ajaxReturn(array('control'=>'sort','code'=>0,'msg'=>'失败','data'=>$_GET),"JSON");
        }
    }
    /* 删除栏目 start */
    function del_column(){
        $db_column = D('column');
        $data_column = $db_column->where($_GET['column_id'])->find();
//        ajaxReturn($data_column);
        if($data_column['level'] == 2){
            $result = $db_column->delete($data_column['id']);
        }elseif($data_column['level'] == 1){
            $result = $db_column->where(array('id'=>$data_column['id']),array('type'=>$data_column['type'],'cls_pid'=>$data_column['cls_id']))->delete();
        }
        if($result){
            ajaxReturn(array('control'=>'del_column','code'=>200,'msg'=>'成功'),"JSON");
        }else{
            ajaxReturn(array('control'=>'del_column','code'=>0,'msg'=>'失败','data'=>$_GET),"JSON");

        }
    }
    /* 删除栏目 end */


}