<?php /* Smarty version Smarty-3.1.8, created on 2018-05-15 16:43:33
         compiled from "E:/www/UPUPW_K2.1_64/vhosts/fst.net/admin/views/default\news\news_list.html" */ ?>
<?php /*%%SmartyHeaderCode:202045afa9db53b81d8-90155483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c29a4ff6f219ac2d1830e8e68d4c549b58ab20e' => 
    array (
      0 => 'E:/www/UPUPW_K2.1_64/vhosts/fst.net/admin/views/default\\news\\news_list.html',
      1 => 1524108508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202045afa9db53b81d8-90155483',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'res' => 0,
    'root' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5afa9db546fb85_59742907',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afa9db546fb85_59742907')) {function content_5afa9db546fb85_59742907($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <link rel="shortcut icon" href="favicon.ico">

    <!-- Data Tables -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <base target="_blank">
    <script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/jquery.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/content.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/config.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/js/tpl/user_list.js"></script>
    <script>
        /* 查看资讯 start */
        function show_news(e){
            var table_data = $('.dataTables-example').DataTable();
            var data = table_data.row($(e).parent().parent('tr')).data();
            var news_id = data['news_id'];
            console.log(news_id);
            window.open("<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
/index.php/goods_list/show/type/news/goods_id/"+news_id);
        }
        /* 查看资讯 end */
        /* 修改资讯 start */
        function mod_news(e){


            var table_data = $('.dataTables-example').DataTable();
            var data = table_data.row($(e).parent().parent('tr')).data();
            var news_id = data['news_id'];
            console.log(news_id);
            window.location.href = "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/mod/news_id/"+news_id;
        }
        /* 修改资讯 end */

        /* 删除 start */
        function del_news(e){
            var table_data = $('.dataTables-example').DataTable();
            var data = table_data.row($(e).parent().parent('tr')).data();
            var news_id = data['news_id'];
            console.log(news_id);
            window.location.href = "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/del/news_id/"+news_id;
        }
        /* 删除 end */


        $(function(){
            $('.dataTables-example').DataTable(//创建一个Datatable
                    {
                        ajax : {//通过ajax访问后台获取数据
                            "url": "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/get_news_list",//后台地址
                            "type":'GET',
                            "dataSrc": function (json) {//获取数据之后处理函数，jason就是返回的数据
                                var dataSet = new Array();
                                dataSet=json.data;
//                                console.log(dataSet);
                                return dataSet;//再将数据返回给datatable控件使用
                            }
                        },
                        serverSide: true,//如果是服务器方式，必须要设置为true
                        processing: true,//设置为true,就会有表格加载时的提示
                        columns : [
                            { data: 'news_id' },
                            { data: 'news_name' }, //名字
                            { data: 'news_cls_name' },//类别名字
                            { data: 'news_key' },//关键词
                            { data: 'add_times' },//添加时间
                            { data: 'open_times' },//点击量
                            { data: 'source' },//资讯来源
                            {data:"null","defaultContent":"<a onclick='mod_news(this)'><i class='fa fa-edit'></i>修改</a><a onclick='show_news(this)'><i class='fa fa-paper-plane-o'></i>查看</a><a style='margin-left: 3px;' class='pull-right' onclick='del_news(this)'><i class='fa fa-trash-o'>删除</i></a>",
                                render:function(){}
                            }
                        ],
                        columnDefs : [ {
                            orderable:false,//禁用排序
                            targets:[1,2,3]   //指定的列
                        }
                        ],
                        "language": {//国际化
                            "processing":"<p style=\"font-size: 20px;color: #F79709;\">正在玩命加载中。。。。请稍后！</p>",//这里设置就是在加载时给用户的提示
                            "lengthMenu": "_MENU_ 条记录每页",
                            "zeroRecords": "没有找到记录",
                            "info": "第 _PAGE_ 页 ( 总共 _PAGES_ 页 )",
                            "infoEmpty": "无记录",
                            "infoFiltered": "(从 _MAX_ 条记录过滤)",
                            "paginate": {
                                "previous": "上一页",
                                "next": "下一页"
                            }
                        },
                        "dom": "<'row'<'col-xs-2'l><'#mytool.col-xs-4'><'col-xs-6'f>r>" +"t" +"<'row'<'col-xs-6'i><'col-xs-6'p>>",//给表格改样式
                        initComplete : function() {//表格完成时运行函数
//             $("#mytool").append('<button type="button" class="btn btn-warning btn-sm" id="importfilebutton" onclick="jumpimportfilepage();">添加</button>');//这里在表格的上面加了一个添加标签
                        }
                    });
        });



        function fnClickAddRow(){$("#editable").dataTable().fnAddData(["Custom row","New row","New row","New row","New row"])};

    </script>
    </head>

    <body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
    <div class="col-sm-12">
    <div class="ibox float-e-margins">
    <div class="ibox-title">
    <h5>基本 <small>分类，查找</small></h5>
    <div class="ibox-tools">
    <a class="collapse-link">
    <i class="fa fa-chevron-up"></i>
    </a>
    <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
    <i class="fa fa-wrench"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
    <li><a href="table_data_tables.html#">选项1</a>
    </li>
    <li><a href="table_data_tables.html#">选项2</a>
    </li>
    </ul>
    <a class="close-link">
    <i class="fa fa-times"></i>
    </a>
    </div>
    </div>
    <div class="ibox-content" >

    <table class="table table-striped table-bordered table-hover dataTables-example" id="tpl_data">
    <thead>
    <tr>
    <th>文章ID</th>
    <th class="col-lg-2">资讯名字</th>
    <th>资讯类别</th>
    <th>关键词</th>
    <th>添加时间</th>
    <th class="col-sm-1">点击量</th>
    <th>文章来源</th>
    <th>操作</th>
    </tr>
    </thead>
    <tbody >
    <tr class="gradeX">
    <td>1001</td>
    <td>jack</td>
    <td>A级经理</td>
    <td>顶级经理</td>
    <td >广东惠州</td>
    <td >997823131@qq.com</td>
    <td>18825466506</td>
    <td>997823131</td>
    </tr>


    </tbody>

    </table>

    </div>
    </div>
    </div>
    </div>
    <!--<div class="row">
    <div class="col-sm-12">
    <div class="ibox float-e-margins">
    <div class="ibox-title">
    <h5>可编辑表格</h5>
    <div class="ibox-tools">
    <a class="collapse-link">
    <i class="fa fa-chevron-up"></i>
    </a>
    <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
    <i class="fa fa-wrench"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
    <li><a href="table_data_tables.html#">选项1</a>
    </li>
    <li><a href="table_data_tables.html#">选项2</a>
    </li>
    </ul>
    <a class="close-link">
    <i class="fa fa-times"></i>
    </a>
    </div>
    </div>
    <div class="ibox-content">
    <div class="">
    <a onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">添加行</a>
    </div>
    <table class="table table-striped table-bordered table-hover " id="editable">
    <thead>
    <tr>
    <th>渲染引擎</th>
    <th>浏览器</th>
    <th>平台</th>
    <th>引擎版本</th>
    <th>CSS等级</th>
    </tr>
    </thead>
    <tbody>
    <tr class="gradeX">
    <td>Trident</td>
    <td>Internet Explorer 4.0
    </td>
    <td>Win 95+</td>
    <td class="center">4</td>
    <td class="center">X</td>
    </tr>
    <tr class="gradeC">
    <td>Trident</td>
    <td>Internet Explorer 5.0
    </td>
    <td>Win 95+</td>
    <td class="center">5</td>
    <td class="center">C</td>
    </tr>
    <tr class="gradeA">
    <td>Trident</td>
    <td>Internet Explorer 5.5
    </td>
    <td>Win 95+</td>
    <td class="center">5.5</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Trident</td>
    <td>Internet Explorer 6
    </td>
    <td>Win 98+</td>
    <td class="center">6</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Trident</td>
    <td>Internet Explorer 7</td>
    <td>Win XP SP2+</td>
    <td class="center">7</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Trident</td>
    <td>AOL browser (AOL desktop)</td>
    <td>Win XP</td>
    <td class="center">6</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 1.0</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 1.5</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 2.0</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 3.0</td>
    <td>Win 2k+ / OSX.3+</td>
    <td class="center">1.9</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Camino 1.0</td>
    <td>OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Camino 1.5</td>
    <td>OSX.3+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape 7.2</td>
    <td>Win 95+ / Mac OS 8.6-9.2</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape Browser 8</td>
    <td>Win 98SE+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape Navigator 9</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.0</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.1</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.1</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.2</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.2</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.3</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.3</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.4</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.4</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.5</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.5</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.6</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.6</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.7</td>
    <td>Win 98+ / OSX.1+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.8</td>
    <td>Win 98+ / OSX.1+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Seamonkey 1.1</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Gecko</td>
    <td>Epiphany 2.20</td>
    <td>Gnome</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Webkit</td>
    <td>Safari 1.2</td>
    <td>OSX.3</td>
    <td class="center">125.5</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Webkit</td>
    <td>Safari 1.3</td>
    <td>OSX.3</td>
    <td class="center">312.8</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Webkit</td>
    <td>Safari 2.0</td>
    <td>OSX.4+</td>
    <td class="center">419.3</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Webkit</td>
    <td>Safari 3.0</td>
    <td>OSX.4+</td>
    <td class="center">522.1</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Webkit</td>
    <td>OmniWeb 5.5</td>
    <td>OSX.4+</td>
    <td class="center">420</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Webkit</td>
    <td>iPod Touch / iPhone</td>
    <td>iPod</td>
    <td class="center">420.1</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Webkit</td>
    <td>S60</td>
    <td>S60</td>
    <td class="center">413</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Presto</td>
    <td>Opera 7.0</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">-</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Presto</td>
    <td>Opera 7.5</td>
    <td>Win 95+ / OSX.2+</td>
    <td class="center">-</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Presto</td>
    <td>Opera 8.0</td>
    <td>Win 95+ / OSX.2+</td>
    <td class="center">-</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Presto</td>
    <td>Opera 8.5</td>
    <td>Win 95+ / OSX.2+</td>
    <td class="center">-</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Presto</td>
    <td>Opera 9.0</td>
    <td>Win 95+ / OSX.3+</td>
    <td class="center">-</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Presto</td>
    <td>Opera 9.2</td>
    <td>Win 88+ / OSX.3+</td>
    <td class="center">-</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Presto</td>
    <td>Opera 9.5</td>
    <td>Win 88+ / OSX.3+</td>
    <td class="center">-</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Presto</td>
    <td>Opera for Wii</td>
                  <td>Wii</td>
                  <td class="center">-</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Presto</td>
    <td>Nokia N800</td>
    <td>N800</td>
    <td class="center">-</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>Presto</td>
    <td>Nintendo DS browser</td>
    <td>Nintendo DS</td>
    <td class="center">8.5</td>
    <td class="center">C/A<sup>1</sup>
    </td>
    </tr>
    <tr class="gradeC">
    <td>KHTML</td>
    <td>Konqureror 3.1</td>
    <td>KDE 3.1</td>
    <td class="center">3.1</td>
    <td class="center">C</td>
    </tr>
    <tr class="gradeA">
    <td>KHTML</td>
    <td>Konqureror 3.3</td>
    <td>KDE 3.3</td>
    <td class="center">3.3</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeA">
    <td>KHTML</td>
    <td>Konqureror 3.5</td>
    <td>KDE 3.5</td>
    <td class="center">3.5</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeX">
    <td>Tasman</td>
    <td>Internet Explorer 4.5</td>
    <td>Mac OS 8-9</td>
    <td class="center">-</td>
    <td class="center">X</td>
    </tr>
    <tr class="gradeC">
    <td>Tasman</td>
    <td>Internet Explorer 5.1</td>
    <td>Mac OS 7.6-9</td>
    <td class="center">1</td>
    <td class="center">C</td>
    </tr>
    <tr class="gradeC">
    <td>Tasman</td>
    <td>Internet Explorer 5.2</td>
    <td>Mac OS 8-X</td>
    <td class="center">1</td>
    <td class="center">C</td>
    </tr>
    <tr class="gradeA">
    <td>Misc</td>
    <td>NetFront 3.1</td>
    <td>Embedded devices</td>
    <td class="center">-</td>
    <td class="center">C</td>
    </tr>
    <tr class="gradeA">
    <td>Misc</td>
    <td>NetFront 3.4</td>
    <td>Embedded devices</td>
    <td class="center">-</td>
    <td class="center">A</td>
    </tr>
    <tr class="gradeX">
    <td>Misc</td>
    <td>Dillo 0.8</td>
    <td>Embedded devices</td>
    <td class="center">-</td>
    <td class="center">X</td>
    </tr>
    <tr class="gradeX">
    <td>Misc</td>
    <td>Links</td>
    <td>Text only</td>
    <td class="center">-</td>
    <td class="center">X</td>
    </tr>
    <tr class="gradeX">
    <td>Misc</td>
    <td>Lynx</td>
    <td>Text only</td>
    <td class="center">-</td>
    <td class="center">X</td>
    </tr>
    <tr class="gradeC">
    <td>Misc</td>
    <td>IE Mobile</td>
    <td>Windows Mobile 6</td>
    <td class="center">-</td>
    <td class="center">C</td>
    </tr>
    <tr class="gradeC">
    <td>Misc</td>
    <td>PSP browser</td>
    <td>PSP</td>
    <td class="center">-</td>
    <td class="center">C</td>
    </tr>
    <tr class="gradeU">
    <td>Other browsers</td>
    <td>All others</td>
    <td>-</td>
    <td class="center">-</td>
    <td class="center">U</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
    <th>渲染引擎</th>
    <th>浏览器</th>
    <th>平台</th>
    <th>引擎版本</th>
    <th>CSS等级</th>
    </tr>
    </tfoot>
    </table>

    </div>
    </div>
    </div>
    </div>-->
    </div>

    </body>

</html><?php }} ?>