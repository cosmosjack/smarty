<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2017/6/2
 * Time: 11:00
 * QQ:  997823131 
 */
class news{

    function index(){

    }

    // 资讯 分类列表
    function cls_list(){
        $db_news_cls = D('news_cls');
        // 一级分类
        $data_news_cls = $db_news_cls
            ->where(array('level'=>1))
            ->order("sort asc")
            ->select();
        // 根据一级 获取 二级分类
        if($data_news_cls){
            for($i=0;$i<count($data_news_cls);$i++){
                $data_second_cls = $db_news_cls
                    ->where(array('cls_pid'=>$data_news_cls[$i]['news_cls_id'],'level'=>2))
                    ->order('sort asc')
                    ->select();
                //如果有二级 则遍历二级的
                if($data_second_cls){
                    for($j=0;$j<count($data_second_cls);$j++){
                        $data_three_cls = $db_news_cls
                            ->where(array('cls_pid'=>$data_second_cls[$j]['news_cls_id']))
                            ->order('sort asc')
                            ->select();
                        $data_second_cls[$j]['son_data'] = $data_three_cls;
                    }
                }
                $data_news_cls[$i]['son_data'] = $data_second_cls;
            }
        }
//        p($data_news_cls);
        $this->assign("data_news_cls",$data_news_cls);
        $this->display();

    }
    // 删除类别
    function del_cls(){
        $db_cls = D("news_cls");
        $result = $db_cls->where(array('news_cls_id'=>$_GET['cls_id']))->delete();
        if($result){
            ajaxReturn(array('control'=>'del_cls','code'=>200,'msg'=>'删除成功'),"JSON");
        }else{
            ajaxReturn(array('control'=>'del_cls','code'=>0,'msg'=>'删除失败'),"JSON");
        }
    }

    // 添加资讯
    function add(){
        if(isset($_POST['sub'])){
//            P($_POST);
//            P($_FILES);
            $db_news_cls = D('news_cls');
            $data_news_cls = $db_news_cls->where($_POST['goods_cls'])->find();
            $data_news_cls['news_cls_id'] = $data_news_cls['news_cls_id'] ? $data_news_cls['news_cls_id'] : "1";
            $data_news_cls['news_cls_name'] = $data_news_cls['news_cls_name'] ? $data_news_cls['news_cls_name'] : "默认分类";
            /* 先插入数据 再上传图片 再修改内容 start */
            $insert['news_name'] = $_POST['goods_name'];
            $insert['news_pname'] = $_POST['goods_pname'];
            $insert['news_cls_id'] = $data_news_cls['news_cls_id'];
            $insert['news_cls_name'] = $data_news_cls['news_cls_name'];
            $insert['news_body'] = $_POST['content'];
            $insert['news_key'] = $_POST['goods_key'];
            $update['label'] = $_POST['label'];

            $insert['add_times'] = time();
            $insert['source'] = $_POST['goods_source'];
            $db_news = D('news');
            $row = $db_news->insert($insert);
            if($row){
//                echo '新建成功';
                $up = new FileUpload();
                $up->set('path','./public/uploads/news');
                $result_file = $up->upload('file');
//                P($result_file);
                if($result_file){
//                    echo '上传图片成功';
//                    P($up->getFileName());
                    $pic_name = $up->getFileName();
                    $update['news_pic'] = $pic_name;
                    $result = $db_news->where($row)->update($update);
                    /*if($result){
//                        echo '成功';
                        $this->success('成功',2,"news/news_list");
                    }else{
//                        echo '不成功';
                        $this->error('不成功');
                    }*/
                }
                $this->success('添加成功',2,"news/news_list");
            }else{
//                P($insert);
//                echo '新建失败';
                $this->error('新建失败');
            }
            /* 先插入数据 再上传图片 再修改内容 end */
        }else{
            $cls_array = $this->get_cls_list();
            $this->assign("cls_array",$cls_array);
            $this->display();
        }
    }
    function mod(){
        $db_news = D('news');

        if(isset($_POST['sub'])){

//            P($_POST);
            /* 如果有新的图片上传成功 则删除原来的图片 start */
            $up = new FileUpload();
            $up->set('path','./public/uploads/news');

            $result_file = $up->upload('file');
//                P($result_file);
            if($result_file){
//                echo '上传成功';
                $update['news_pic'] = $up->getFileName();

            }
            /* 如果有新的图片上传成功 则删除原来的图片 end */

            /* 整理需要更新的数据 start */
            $db_news_cls = D('news_cls');
            $data_news_cls = $db_news_cls->where($_POST['goods_cls'])->find();
            $data_news_cls['news_cls_id'] = $data_news_cls['news_cls_id'] ? $data_news_cls['news_cls_id'] : "1";
            $data_news_cls['news_cls_name'] = $data_news_cls['news_cls_name'] ? $data_news_cls['news_cls_name'] : "默认分类";

                $update['news_name'] = $_POST['goods_name'];
                $update['news_pname'] = $_POST['goods_pname'];
                $update['news_cls_id'] = $data_news_cls['news_cls_id'];
                $update['news_cls_name'] = $data_news_cls['news_cls_name'];
                $update['news_body'] = $_POST['content'];
                $update['news_key'] = $_POST['goods_key'];
                $update['label'] = $_POST['label'];
//                $update['source'] = $_POST['goods_source'];

            /* 整理需要更新的数据 end */
            $result = $db_news->where($_POST['goods_id'])->update($update);
            if($result){
//                echo '修改成功';
                $this->success('修改成功',2,"news/news_list");
            }else{
//                echo '修改不成功';
                $this->error('无任何修改',2,"news/news_list");
//                P($update);
            }

        }else{
            $data_news = $db_news->where($_GET['news_id'])->find();
            if($data_news){
                $cls_array = $this->get_cls_list();
                $this->assign("cls_array",$cls_array);
                $this->assign("data_news",$data_news);
                $this->display();

            }else{
//                echo '没有此资讯';
                $this->error("没有此资讯");
            }
        }



    }

    // 资讯列表
    function news_list(){

        $this->display();
    }
    // 添加分类
    function cls_add(){
        $db_news_cls = D('news_cls');

        if($_POST['sub']){
            if(empty($_POST['news_cls_name'])){
                $this->error("栏目为空或重复",2);
            }
            $upload = new FileUpload();
            $upload->set('path','./uploads/news');
            $result_upload = $upload->upload('img_show');

            if($result_upload){
                $insert['news_cls_pic'] = $upload->getFileName();
            }

                $insert['news_cls_name'] = $_POST['news_cls_name'];
                $insert['news_cls_desc'] = $_POST['news_cls_desc'];
                $insert['cls_pid'] = $_POST['cls_pid'];
                $insert['level'] = $_POST['cls_pid'] ? 2:1;
                $result = $db_news_cls->insert($insert);

                if($result){
                    $this->success('新增成功',2,"news/cls_list",'self');
                }else{
                    $this->error("数据不完善",2);
                }

        }else{
            if(isset($_GET['pid'])){
                $this->assign('pid',$_GET['pid']);
                $where['news_cls_id'] = $_GET['pid'];
            }else{
                $where['level'] = 1;
            }
            $data_news_cls = $db_news_cls->where($where)->select();
            $this->assign('data_news_cls',$data_news_cls);
            $this->display();
        }

    }
    // 修改分类
    function edit_cls(){
        $db_news_cls = D('news_cls');
        $update['news_cls_name'] = $_GET['cls_name'];
        $update['news_cls_desc'] = $_GET['cls_desc'];
        $result = $db_news_cls->where($_GET['cls_id'])->update($update);
        if($result){
            ajaxReturn(array('control'=>'edit_cls','code'=>200,'msg'=>'成功'),"JSON");
        }else{
            ajaxReturn(array('control'=>'edit_cls','code'=>0,'msg'=>'失败','data'=>$_GET),"JSON");
        }
    }
    // 删除 咨询
    function del(){
        $db_news = D('news');
        $result = $db_news->where($_GET['news_id'])->delete();
        if($result){
            $this->success("已删除",2,"news/news_list");

        }else{
            $this->error("未删除",2,"news/news_list");
        }
    }
    // 排序
    function sort(){
        $db_news_cls = D('news_cls');
        $update['sort'] = $_GET['sort_id'];
        $result = $db_news_cls->where($_GET['cls_id'])->update($update);
        if($result){
            ajaxReturn(array('control'=>'sort','code'=>200,'msg'=>'成功'),"JSON");
        }else{
            ajaxReturn(array('control'=>'sort','code'=>0,'msg'=>'失败','data'=>$_GET),"JSON");
        }
    }
    // ajax 请求获取资讯列表
    function get_news_list(){
        $db_news = D('news');
        /* 查询条件 start */
        $where = array("news_name like"=>"%{$_GET['search']['value']}%");
        /* 查询条件 end */
        /* 排序条件 start */
        $column = array("id","member_name","city","add_time","member_phone","last_login_ip","is_teacher","integral");
        $column_key = intval($_GET['order'][0]['column']);
        $choose_column = $column[$column_key];
        $choose_sort = $_GET['order'][0]['dir'];
        $order = $choose_column." ".$choose_sort;
//        $order = "";
//        p($order);
        /* 排序条件 end */

        $db_draw = intval($_GET['draw']);
        $db_start = $_GET['start'] ? $_GET['start'] : 0;
        $db_length = $_GET['length'] ? $_GET['length'] : 10;
        $db_limit = $db_start.",".$db_length;

        $db_total = $db_news->where($where)->total();
        $data_news = $db_news->where($where)->limit($db_limit)->select();

        ajaxReturn(array('draw'=>$db_draw,'recordsTotal'=>$db_total,'recordsFiltered'=>$db_total,'data'=>$data_news),"json");

        ajaxReturn($data_news,"JSON");
    }
    // 获取 分类列表ajax 从小到大 排序
    private function get_cls_list(){
        $db_cls = D('news_cls');
        $data_first = $db_cls
            ->where(array('level'=>1))
            ->order('sort asc')
            ->select();
        $data = array();
        for($i=0;$i<count($data_first);$i++){
            array_push($data,$data_first[$i]);
            $data_second = $db_cls->where(array('level'=>2,'cls_pid'=>$data_first[$i]['news_cls_id']))->order('sort asc')->select();
            if($data_second){
                for($j=0;$j<count($data_second);$j++){
                    array_push($data,$data_second[$j]);
                }
            }
        }
//        P($data);
        return $data;
    }
    function test(){
        $json_data = array_merge($_POST,$_FILES);
        ajaxReturn($json_data,"JSON");
    }

}