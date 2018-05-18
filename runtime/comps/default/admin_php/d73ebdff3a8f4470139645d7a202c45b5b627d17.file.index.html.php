<?php /* Smarty version Smarty-3.1.8, created on 2018-05-15 17:10:00
         compiled from "E:/www/UPUPW_K2.1_64/vhosts/fst.net/admin/views/default\site\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1115afaa3e8885c28-79121643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd73ebdff3a8f4470139645d7a202c45b5b627d17' => 
    array (
      0 => 'E:/www/UPUPW_K2.1_64/vhosts/fst.net/admin/views/default\\site\\index.html',
      1 => 1524551346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1115afaa3e8885c28-79121643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'data_site' => 0,
    'data_10_recommend' => 0,
    'val' => 0,
    'data_news_cls' => 0,
    'key' => 0,
    'second_val' => 0,
    'res' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5afaa3e89aabe2_37855218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afaa3e89aabe2_37855218')) {function content_5afaa3e89aabe2_37855218($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
    .label{
        font-size: 16px;
    }
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>网站信息修改</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" enctype="multipart/form-data" method="post" target="_self" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/mod_site_info">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">企业名称：</label>
                            <div class="col-sm-8">
                                <input  name="company_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['company_name'];?>
" type="text">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点公司的名字</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">企业介绍：</label>
                            <div class="col-sm-8">
                                <input  name="company_desc" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['company_desc'];?>
" type="text" aria-required="true" aria-invalid="false" class="valid">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">传真号码：</label>
                            <div class="col-sm-8">
                                <input  name="company_fax" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['company_fax'];?>
" type="text" aria-required="true" aria-invalid="true" class="error">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">企业电话：</label>
                            <div class="col-sm-8">
                                <input  name="company_tel" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['company_tel'];?>
" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">电子邮箱：</label>
                            <div class="col-sm-8">
                                <input  name="company_email" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['company_email'];?>
" class="form-control" >
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 请确定公司的电子邮箱</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">站点LOGO：</label>
                            <div class="col-sm-8">
                                <input  name="site_logo" type="file" class="form-control" >
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 像素215x55</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否主动推送：</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox"  class="onoffswitch-checkbox"  id="is_push">
                                        <label class="onoffswitch-label" for="is_push">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否自动推送：</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" checked class="onoffswitch-checkbox"  id="is_auto_push">
                                        <label class="onoffswitch-label" for="is_auto_push">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">自动推送代码：</label>
                            <div class="col-sm-8">
                                <input  name="auto_push_code" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['auto_push_code'];?>
" >
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 填写相应的代码</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">CNZZ统计代码：</label>
                            <div class="col-sm-8">
                                <input  name="cnzz_code" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['cnzz_code'];?>
" >
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 填写相应的代码</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">网站备案号：</label>
                            <div class="col-sm-8">
                                <input  name="record_code" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['record_code'];?>
"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">网站默认关键词：</label>
                            <div class="col-sm-8">
                                <input  name="default_keywords" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['default_keywords'];?>
" >
                                <span class="help-block m-b-none text-danger"><i class="fa fa-info-circle"></i> 请以《-》或《英文逗号》分隔</span>
                            </div>
                        </div>
                        <hr/>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">首页内容推荐：</label>
                            <div class="col-sm-8">
                                <input  name="label_list" class="form-control" type="text" readonly="true" disabled value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['home_10_recommend'];?>
">
                                <input  name="home_10_recommend" class="form-control" type="hidden" value="" >
                                <span class="help-block m-b-none" style="color: #8b0000"><i class="fa fa-info-circle" ></i> 请点选下方的按钮来删除不要的,最好添加到10个</span>
                                <div id="label_list" class="col-sm-12">
                                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data_10_recommend']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                    <label class="btn btn-sm btn-primary" style="margin-left:3px;" onclick="del_label(this)"  is_choose="0" index="<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</label>
                                    <?php } ?>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-inline">
                                        <input type="text" id="new_label" class="form-control" placeholder="内容ID" />
                                        <span class="help-block m-b-none" style="color: #8b0000"><i class="fa fa-info-circle"></i> 请在内容管理里边查找出想要添加的内容ID</span>
                                        <label onclick="add_label();" class="btn btn-success btn-sm">添 加</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-3">
                                <input type="hidden" name="is_push" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['is_push'];?>
" />
                                <input type="hidden" name="is_auto_push" value="<?php echo $_smarty_tpl->tpl_vars['data_site']->value['is_auto_push'];?>
" />
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>网站栏目修改</h5>
                    <div class="ibox-tools">
                        <span  onclick="add_top_colum();" style="cursor:pointer;margin-left: 10px;" class="label label-success" >
                        新增顶级栏目
                        </span>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <p class="m-b-lg">
                        每个列表可以自定义标准的CSS样式。每个单元响应所以你可以给它添加其他元素来改善功能列表。
                    </p>

                    <div class="dd" id="nestable2">
                        <ol class="dd-list">
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">
                                    <span style="color: #c1c1c1">
                                    </span>
                                    <span class="label label-info"><i class="fa fa-users"></i></span> 首页
                                </div>
                                <ol class="dd-list1">
                                </ol>
                            </li>

                            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data_news_cls']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>

                            <li class="dd-item" data-id="1">

                                <div class="dd-handle">
                                    <?php if (count($_smarty_tpl->tpl_vars['val']->value['son_data'])>0){?>
                                    <span style="color: #c1c1c1">
                                        <i class="fa fa-minus column_i<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"  onclick="column_i(this);" index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="1" style="margin-right: 3px;"></i>
                                    </span>
                                    <?php }?>
                                    <span class="label label-info"><i class="fa fa-map"></i></span> <?php echo $_smarty_tpl->tpl_vars['val']->value['cls_name'];?>

                                    <input type="text" name="sort" class="input-sm" style="width: 50px;" index="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['sort'];?>
">

                                        <span lower_count="<?php echo count($_smarty_tpl->tpl_vars['val']->value['son_data']);?>
" onclick="del_column('<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
');" class="label label-primary pull-right">
                                        <i class="fa fa-trash-o "></i>
                                        </span>

                                        <span onclick="edit_column('<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['val']->value['cls_name'];?>
','<?php echo $_smarty_tpl->tpl_vars['val']->value['url'];?>
');" data-toggle="modal" data-target="#myModal3" class="label label-danger pull-right">
                                            <i class=" fa fa-pencil "></i>
                                        </span>
                                        <span onclick="" class="label label-success pull-right">
                                            <i class="fa fa-plus "></i>
                                        </span>
                                </div>
                                <ol class="dd-list<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                    <?php  $_smarty_tpl->tpl_vars['second_val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['second_val']->_loop = false;
 $_smarty_tpl->tpl_vars['second_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['val']->value['son_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['second_val']->key => $_smarty_tpl->tpl_vars['second_val']->value){
$_smarty_tpl->tpl_vars['second_val']->_loop = true;
 $_smarty_tpl->tpl_vars['second_key']->value = $_smarty_tpl->tpl_vars['second_val']->key;
?>
                                    <li class="dd-item" data-id="2">
                                        <div class="dd-handle">
                                            <span class="label label-info"><i class="fa fa-map-signs"></i></span>
                                            <?php echo $_smarty_tpl->tpl_vars['second_val']->value['cls_name'];?>

                                            <input type="text" name="sort" class="input-sm" style="width: 50px;" index="<?php echo $_smarty_tpl->tpl_vars['second_val']->value['cls_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['second_val']->value['sort'];?>
">

                                            <span onclick="del_column('<?php echo $_smarty_tpl->tpl_vars['second_val']->value['id'];?>
');" class="label label-primary pull-right">
                                            <i class="fa fa-trash-o "></i>
                                            </span>
                                            <span onclick="edit_column('<?php echo $_smarty_tpl->tpl_vars['second_val']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['second_val']->value['cls_name'];?>
','<?php echo $_smarty_tpl->tpl_vars['second_val']->value['url'];?>
');" data-toggle="modal" data-target="#myModal3" class="label label-danger pull-right">
                                            <i class=" fa fa-pencil "></i>
                                            </span>

                                        </div>
                                    </li>
                                    <?php } ?>
                                </ol>
                            </li>
                            <?php } ?>

                        </ol>
                    </div>
                </div>
                <div class="dd" style="margin-top: 10px;">
                        <span onclick="location.reload();" style="cursor:pointer;" class="label label-primary" >
                        刷新排序
                        </span>
                        <span onclick="add_top_colum();" style="cursor:pointer;margin-left: 10px;" class="label label-success" data-toggle="modal" data-target="#myModal2">
                        新增顶级类别
                        </span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">新增首页栏目</h4>
                    <small class="font-bold">
                        需要从当前的所有栏目中选择
                    </small>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">选择栏目</label>
                            <div class="col-sm-4">
                                <select name="column_select" class="form-control">
                                    <option value="1" type_name="news">暂无栏目可选</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">栏目排序</label>
                            <div class="col-sm-4">
                                <input type="text" name="column_sort"  value="" class="form-control" placeholder="请填写整数数字">
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 数字越大越靠后</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                    <button type="button" onclick="ajax_get()" class="btn btn-primary">提交</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="myModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">首页栏目修改</h4>
                    <small class="font-bold">
                        可以修改名字和链接
                    </small>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">栏目名字</label>
                            <div class="col-sm-4">
                                <input type="text" name="column_name"  value="" class="form-control" placeholder="字数不能太多">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">栏目链接</label>
                            <div class="col-sm-4">
                                <input type="text" name="column_url"  value="" class="form-control" >
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 默认对应自己的分类</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                    </form>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="column_id" value="">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                    <button type="button" onclick="mod_column_post()" class="btn btn-primary">提交</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/jquery.min.js?v=2.1.4"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/bootstrap.min.js?v=3.3.5"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/content.min.js?v=1.0.0"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/plugins/validate/messages_zh.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/demo/form-validate-demo.min.js"></script>

<script>


    /* 修改栏目 start */
    function edit_column(column_id,column_name,url){
        $("input[name='column_name']").val(column_name);
        $("input[name='column_url']").val(url);
        $("input[name='column_id']").val(column_id);

    }
    /* 修改栏目 end */
    /* 修改 栏目提交方法 start */
    function mod_column_post(){
        var column_id = $("input[name='column_id']").val();
        var column_url = $("input[name='column_url']").val();
        var column_name= $("input[name='column_name']").val();
        var json_data = {"column_id":column_id,"column_url":column_url,"column_name":column_name};
        console.log(json_data);

        $.ajax({
            url:"<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/mod_column_url",
            type:"POST",
            data:json_data,
            success:function(msg){
//                $("#myModal2").css({"display":"none"});
//                $(".modal-backdrop").css({"display":"none"});
                console.log(msg);
                if(msg.code == 200){
                    alert(msg.msg);
                }else{
                    alert(msg.msg);
                }
                location.reload();

//                console.log(msg);
            },
            error: function () {
                console.log('http error');
            }
        });
    }
    /* 修改 栏目提交方法 end */
    /* 提交 start */
    function ajax_get(){
        var cls_id = $("select[name='column_select']").find("option:selected").val(); // 类别ID
        var cls_type = $("select[name='column_select']").find("option:selected").attr('type_id'); // 类别ID
        var cls_type_name = $("select[name='column_select']").find("option:selected").attr('type_name'); // 类别ID
        var column_sort = $("input[name='column_sort']").val(); //栏目 排序
        var json_data = {"cls_id":cls_id,"cls_type":cls_type,"cls_type_name":cls_type_name,"column_sort":column_sort};
        console.log(json_data);
//        return false;
        $.ajax({
            url:"<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/column_add",
            type:"POST",
            data:json_data,
            success:function(msg){
//                $("#myModal2").css({"display":"none"});
//                $(".modal-backdrop").css({"display":"none"});
//                console.log(msg);
                if(msg.code == 200){
                    alert(msg.msg);
                }else{
                    alert(msg.msg);
                }
                location.reload();

//                console.log(msg);
            },
            error: function () {
                console.log('http error');
            }
        });
    }
    /* 提交 end */

    function add_top_colum(){
        // 展示添加栏目的框框 // 最多添加 7个栏目
        console.log('添加新的栏目');
        /* 获取所有没有被放在首页的栏目 start */
        $.ajax({
            url:"<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/get_all_column",
            type:"GET",
            data:{},
            success:function(msg){
                console.log(msg);
                if(msg.length > 0){
                    $("select[name='column_select']").children().remove();
                    for(var i=0;i<msg.length;i++){
                        if(msg[i].type == 1){
                            var type_name = 'news';
                        }else{
                            var type_name = 'pro';
                        }
                        if(msg[i].level == 2){
                            var level_str = "--|--";
                        }else{
                            var level_str = '';
                        }
                        $("select[name='column_select']").append('<option value="'+msg[i].news_cls_id+'" type_name="'+type_name+'" type_id="'+msg[i].type+'">'+level_str+msg[i].news_cls_name+'</option>');
                    }
                }
            },
            error:function(){
                console.log("http error");
            }
        });
        /* 获取所有没有被放在首页的栏目 end */
    }

    /* 类别伸缩 start  */
    function column_i(e){
        var index = $(e).attr('index');
        console.log(index);

        var class_name = ".column_i"+index;
        var dd_list = ".dd-list"+index;

        var li_value = $(class_name).attr('value');
        if(li_value == 1){
            // 隐藏

            $(class_name).removeClass("fa-minus");
            $(class_name).addClass("fa-plus");

            $(dd_list).css({"display":"none"});
            $(class_name).attr('value',2);
        }else{
            // 展示

            $(class_name).removeClass("fa-plus");
            $(class_name).addClass("fa-minus");

            $(dd_list).css({"display":"block"});
            $(class_name).attr('value',1);

        }

    }
    /* 删除栏目 start */
    function del_column(column_id){
        console.log(column_id);
        $.ajax({
           url:"<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/del_column/column_id/"+column_id,
            type:"GET",
            data:{},
            success:function(msg){
                console.log(msg);
                if(msg.code==200){
                    alert(msg.msg);
                }else{
                    alert(msg.msg);
                }
                window.location.reload();
            },
            error:function(){
                console.log("http error");
            }
        });
    }
    /* 删除栏目 end */
    /* 类别伸缩 end  */
    $(function(){

        /* 排序 start */
        $("input[name='sort']").blur(function(){
            console.log($(this).val());
            console.log($(this).attr("index"));
            var json_data = {"cls_id":$(this).attr("index"),"sort_id":$(this).val()};
            $.ajax({
                url:"<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/sort",
                type:"GET",
                data:json_data,
                success:function(msg){
//                $("#myModal2").css({"display":"none"});
//                $(".modal-backdrop").css({"display":"none"});
                    console.log(msg);
                },
                error: function () {
                    console.log('http error');
                }
            });

        });
        /* 排序 end */

        /* 选择值初始化 start */
        var is_push = $("input[name='is_push']").val();
        var is_auto_push = $("input[name='is_auto_push']").val();
        if(is_push == 'on'){
            $("#is_push").attr("checked",true);
        }else{
            $("#is_push").attr("checked",false);
        }
        if(is_auto_push == 'on'){
            $("#is_auto_push").attr("checked",true);
        }else{
            $("#is_auto_push").attr("checked",false);
        }
        /* 选择值初始化 end */

        /* 推送是否关闭 start */
        $("#is_push").click(function(e){
            var is_push = $("#is_push").is(":checked");
            console.log(is_push);
            if(is_push){
                $("input[name='is_push']").val('on');
            }else{
                $("input[name='is_push']").val('off');
            }
        });

        $("#is_auto_push").click(function(e){
            var is_auto_push = $("#is_auto_push").is(":checked");
            console.log(is_auto_push);
            if(is_auto_push){
                $("input[name='is_auto_push']").val('on');
            }else{
                $("input[name='is_auto_push']").val('off');
            }
        });
        /* 推送是否关闭 end */

    });

    //添加标签
    function add_label(){
        var new_label = $("#new_label").val();
        var now_label_list = $("input[name='label_list']").val();
        var now_label_array = now_label_list.split("|");
        console.log(now_label_array);

        //如果在原来的数组里边则退出脚本
        console.log(now_label_array.length);
        if(now_label_array.length>0){
//            console.log(now_label_length);
            for(var j=0;j<now_label_array.length;j++){
                if (new_label == now_label_array[j]){
                    return false;
                }
            }
        }
        var new_value = wipe_str_out(now_label_list+"|"+new_label,"|","both");

        $("input[name='label_list']").val(new_value);//加入input
        $("input[name='home_10_recommend']").val(new_value);//加入input

        $("#label_list").append('<label class="btn btn-sm btn-primary" style="margin-left:3px;" onclick="del_label(this)"  is_choose="0" index="'+new_label+'">'+new_label+'</label>');
        //清理现有的值
        $("#new_label").val('');
    }

    //删除 label
    function del_label(e){
        var choose_label = $(e).attr("index");
        var now_label_list = $("input[name='label_list']").val();
        var now_label_array = now_label_list.split("|");
        var now_label_length = now_label_array.length;
        var new_label_array = [];

        for(var i=0;i<now_label_length;i++){
            if(choose_label != now_label_array[i]){
                new_label_array.push(now_label_array[i]);
            }
        }
        console.log(new_label_array);
        var new_label_list = new_label_array.join("|");
        console.log(new_label_list);
        $("input[name='label_list']").val(new_label_list)
        $("input[name='home_10_recommend']").val(new_label_list)
        $(e).remove();
    }

    /* 两边字符去除 start */
    //str 要去除的字符串
    //character 特殊的字符
    //option left rigth both
    function wipe_str_out(str,character,option){
        var str_length = str.length;
        var start_str = str.substring(0,1);
        var end_str = str.substring(str_length-1,str_length);
        //console.log(start_str);
        //console.log(end_str);
        switch (option){
            case "right":
                if(end_str == character){
                    str = str.substring(0,str_length-1);
                }
                break;
            case "left":
                if(start_str == character){
                    str = str.substring(1,str_length);
                }
                break;
            case "both":
                if(end_str == character){
                    str = str.substring(0,str_length-1);
                }
                str_length = str.length;
                if(start_str == character){
                    str = str.substring(1,str_length);
                }
                break;
        }
        return str;
    }
    /* 两边字符去除 end */

    /* 元素在数组中出现的位置 start */
    function position_of_array(str,array){
        for(var i=0;i<array.length;i++){
            if(str == array[i]){
                return i;
                break;
            }else{
                continue;
            }
        }
    }
    /* 元素在数组中出现的位置 end */
</script>
</body>

</html><?php }} ?>