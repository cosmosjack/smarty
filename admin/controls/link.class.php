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
    function mod(){
        echo '修改合作商家信息';
        $this->display();

    }
    function del(){
        echo '删除合作商家';
        $this->display();
    }
}