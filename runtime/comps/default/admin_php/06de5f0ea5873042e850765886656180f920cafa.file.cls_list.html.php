<?php /* Smarty version Smarty-3.1.8, created on 2018-05-15 15:40:46
         compiled from "E:/www/UPUPW_K2.1_64/vhosts/fst.net/admin/views/default\news\cls_list.html" */ ?>
<?php /*%%SmartyHeaderCode:90165afa8efe573a78-91461449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06de5f0ea5873042e850765886656180f920cafa' => 
    array (
      0 => 'E:/www/UPUPW_K2.1_64/vhosts/fst.net/admin/views/default\\news\\cls_list.html',
      1 => 1524553206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90165afa8efe573a78-91461449',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_news_cls' => 0,
    'key' => 0,
    'val' => 0,
    'url' => 0,
    'second_key' => 0,
    'second_val' => 0,
    'three_val' => 0,
    'res' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5afa8efe5e8d94_81917792',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afa8efe5e8d94_81917792')) {function content_5afa8efe5e8d94_81917792($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                    <h5>资讯分类</h5>

                    <div class="ibox-tools">
                        <span  onclick="add_top_cls();" style="cursor:pointer;margin-left: 10px;" class="label label-success" >
                        新增顶级类别
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

                    <div class="dd" >
                        <ol class="dd-list">
                            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data_news_cls']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>

                            <li class="dd-item" data-id="1">

                                <div class="dd-handle">
                                    <span style="color: #c1c1c1">
                                        <i class="fa fa-minus column_i<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"  onclick="column_i(this,1);" index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="1" style="margin-right: 3px;"></i>
                                    </span>
                                    <span class="label label-info"><i class="fa fa-map"></i></span> <?php echo $_smarty_tpl->tpl_vars['val']->value['news_cls_name'];?>

                                        <input type="text" name="sort" class="input-sm" style="width: 50px;" index="<?php echo $_smarty_tpl->tpl_vars['val']->value['news_cls_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['sort'];?>
">
                                        <span style="margin-left: 20px;">ID: <?php echo $_smarty_tpl->tpl_vars['val']->value['news_cls_id'];?>
</span>
                                        <!--<span lower_count="<?php echo count($_smarty_tpl->tpl_vars['val']->value['son_data']);?>
" onclick="del_cls('<?php echo $_smarty_tpl->tpl_vars['val']->value['news_cls_id'];?>
',this);" class="label label-primary pull-right">
                                        <i class="fa fa-trash-o "></i>
                                        </span>-->
                                        <span onclick="edit_cls('<?php echo $_smarty_tpl->tpl_vars['val']->value['news_cls_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['val']->value['news_cls_name'];?>
','<?php echo $_smarty_tpl->tpl_vars['val']->value['news_cls_desc'];?>
');" data-toggle="modal" data-target="#myModal2" class="label label-danger pull-right">
                                            <i class=" fa fa-pencil "></i>
                                        </span>
                                        <span onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/cls_add/pid/<?php echo $_smarty_tpl->tpl_vars['val']->value['news_cls_id'];?>
';" class="label label-success pull-right">
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
                                            <span style="color: #c1c1c1">
                                                <i class="fa fa-minus column_i_second<?php echo $_smarty_tpl->tpl_vars['second_key']->value;?>
"  onclick="column_i(this,2);" index="<?php echo $_smarty_tpl->tpl_vars['second_key']->value;?>
" value="1" style="margin-right: 3px;"></i>
                                            </span>

                                            <span class="label label-info"><i class="fa fa-map-signs"></i></span>
                                            <?php echo $_smarty_tpl->tpl_vars['second_val']->value['news_cls_name'];?>

                                            <input type="text" name="sort" class="input-sm" style="width: 50px;" index="<?php echo $_smarty_tpl->tpl_vars['second_val']->value['news_cls_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['second_val']->value['sort'];?>
">
                                            <span style="margin-left: 20px;">ID: <?php echo $_smarty_tpl->tpl_vars['second_val']->value['news_cls_id'];?>
</span>
                                            <!--<span onclick="del_cls('<?php echo $_smarty_tpl->tpl_vars['second_val']->value['news_cls_id'];?>
');" class="label label-primary pull-right">
                                            <i class="fa fa-trash-o "></i>
                                            </span>-->
                                            <span onclick="edit_cls('<?php echo $_smarty_tpl->tpl_vars['second_val']->value['news_cls_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['second_val']->value['news_cls_name'];?>
','<?php echo $_smarty_tpl->tpl_vars['second_val']->value['news_cls_desc'];?>
');" data-toggle="modal" data-target="#myModal2"  class="label label-danger pull-right ">
                                                <i class=" fa fa-pencil "></i>
                                            </span>
                                             <span onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/cls_add/pid/<?php echo $_smarty_tpl->tpl_vars['second_val']->value['news_cls_id'];?>
';" class="label label-success pull-right">
                                            <i class="fa fa-plus "></i>
                                        </span>
                                        </div>
                                    </li>
                                    <ol class="dd-list-second<?php echo $_smarty_tpl->tpl_vars['second_key']->value;?>
">
                                        <?php  $_smarty_tpl->tpl_vars['three_val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['three_val']->_loop = false;
 $_smarty_tpl->tpl_vars['three_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['second_val']->value['son_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['three_val']->key => $_smarty_tpl->tpl_vars['three_val']->value){
$_smarty_tpl->tpl_vars['three_val']->_loop = true;
 $_smarty_tpl->tpl_vars['three_key']->value = $_smarty_tpl->tpl_vars['three_val']->key;
?>
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle">
                                                <span class="label label-info"><i class="fa fa-map-signs"></i></span>
                                                <?php echo $_smarty_tpl->tpl_vars['three_val']->value['news_cls_name'];?>

                                                <input type="text" name="sort" class="input-sm" style="width: 50px;" index="<?php echo $_smarty_tpl->tpl_vars['three_val']->value['news_cls_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['three_val']->value['sort'];?>
">
                                            <span onclick="del_cls('<?php echo $_smarty_tpl->tpl_vars['three_val']->value['news_cls_id'];?>
');" class="label label-primary pull-right">
                                            <i class="fa fa-trash-o "></i>
                                            </span>
                                            <span onclick="edit_cls('<?php echo $_smarty_tpl->tpl_vars['three_val']->value['news_cls_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['three_val']->value['news_cls_name'];?>
','<?php echo $_smarty_tpl->tpl_vars['three_val']->value['news_cls_desc'];?>
');" data-toggle="modal" data-target="#myModal2"  class="label label-danger pull-right ">
                                                <i class=" fa fa-pencil "></i>
                                            </span>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ol>
                                    <?php } ?>

                                </ol>
                            </li>
                            <?php } ?>
                        </ol>
                    </div>
                    <div class="dd" style="margin-top: 10px;">
                        <span onclick="location.reload();" style="cursor:pointer;" class="label label-primary" >
                        刷新排序
                        </span>
                        <span onclick="add_top_cls();" style="cursor:pointer;margin-left: 10px;" class="label label-success" >
                        新增顶级类别
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">修改资讯类别</h4>
                    <small class="font-bold">
                        你可以修改类别的名称
                    </small>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">类别名字</label>
                            <div class="col-sm-4">
                                <input type="text" name="cls_name" class="form-control" value="">
                                <input type="hidden" name="cls_id" value="">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">类别介绍</label>
                            <div class="col-sm-4">
                                <input type="text" name="cls_desc"  value="" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                    <button type="button" onclick="ajax_get()" class="btn btn-primary">保存</button>
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

    /* 新增顶级类别 start */
    function add_top_cls(){
        window.location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/cls_add';
    }
    /* 新增顶级类别 end */

    /* 类别伸缩 start  */
    function column_i(e,level){
        var index = $(e).attr('index');
        console.log(index);
        if(level ==1){
            var class_name = ".column_i"+index;
            var dd_list = ".dd-list"+index;
        }else{
            var class_name = ".column_i_second"+index;
            var dd_list = ".dd-list-second"+index;
        }


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
    /* 类别伸缩 end  */

    /* 删除类别 start */
        // 如果是顶级类别必须先删除 下级类别
    function del_cls(cls_id,e){
        var lower_count = $(e).attr('lower_count');
        if(parseInt(lower_count) > 0){
            alert('请先删除下级分类');
            return false;
        }

        if(confirm('确定要删除此分类吗？')){
            console.log(cls_id);
            $.ajax({
                url:"<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/del_cls/cls_id/"+cls_id,
                type:"GET",
                data:{},
                success:function(msg){
                    console.log(msg);
                    if(msg.code == 200){
                        alert(msg.msg);
                    }else{
                        alert(msg.msg);
                    }
                    location.reload();
                },
                error:function(){
                    console.log("http error");
                }
            });
        }
    }
    /* 删除类别 end */

    /* 修改类别 start */
    function edit_cls(cls_id,cls_name,cls_desc){
        console.log(cls_id);
        $("input[name='cls_name']").val(cls_name);
        $("input[name='cls_id']").val(cls_id);
        $("input[name='cls_desc']").val(cls_desc);

    }
    /* 修改类别 end */

    /* 提交 start */
    function ajax_get(){
        var cls_id = $("input[name='cls_id']").val();
        var cls_name = $("input[name='cls_name']").val();
        var cls_desc = $("input[name='cls_desc']").val();
        var json_data = {"cls_id":cls_id,"cls_name":cls_name,"cls_desc":cls_desc};
        $.ajax({
            url:"<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/edit_cls",
            type:"GET",
            data:json_data,
            success:function(msg){
//                $("#myModal2").css({"display":"none"});
//                $(".modal-backdrop").css({"display":"none"});
                location.reload();
                console.log(msg);
            },
            error: function () {
                console.log('http error');
            }
        });
    }
    /* 提交 end */
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

    });
</script>
</body>

</html><?php }} ?>