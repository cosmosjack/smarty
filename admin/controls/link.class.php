<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2017/6/19
 * Time: 10:30
 * QQ:  997823131 
 */
class link{
    // 合作商家 列表
    function index(){
        $db_link = D('link');
        $page = new Page($db_link->total(),9);
        $data = $db_link->limit($page->limit)->select();
        for($i=0;$i<count($data);$i++){
            $data[$i]['pic_url'] = SHOP_SITE_URL.DS."uploads".DS."links".DS.$data[$i]['link_pic'];
        }
        $this->assign("data",$data);
        $this->assign("fpage",$page->fpage());
        $this->display();

    }
    function add(){

        if(isset($_POST['sub'])){
            P($_POST);
            P($_FILES);
            $upload = new FileUpload();
            $upload->set('path','./uploads/links');
            $result_upload = $upload->upload('link_pic');

            if($result_upload){
                $_POST['link_pic'] = $upload->getFileName();
            }
            $db_link = D("link");
            $result = $db_link->insert($_POST);
            if($result){
                echo '插入成功';
            }else{
                echo '插入失败';
            }
        }
        $this->display();
    }
    //修改合作商外链
    function mod(){

        if(isset($_POST['link_id'])){
            // P($_POST);
            // P($_FILES);
            $upload = new FileUpload();
            $upload->set('path','./uploads/links');
            $result_upload = $upload->upload('link_pic');

            if($result_upload){
                $_POST['link_pic'] = $upload->getFileName();
            }
            $db_link = D("link");
            $result = $db_link->where($_POST['link_id'])->update($_POST);
            if($result){
                $this->success('修改成功',2,"link/index");
            }else{
                $this->error('无任何修改',2,"link/index");
            }
        }
    }
    //删除合作商
    function del(){
        if(!empty($_POST['link_id'])){
            $db_link = D("link");
            $result = $db_link->where($_POST['link_id'])->delete();
            if($result){
                ajaxReturn(array('control'=>'del','code'=>200,'msg'=>'删除成功'),"JSON");
            }else{
                ajaxReturn(array('control'=>'del','code'=>0,'msg'=>'删除失败'),"JSON");
            }
        }
    }
}