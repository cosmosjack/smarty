<?php /* Smarty version Smarty-3.1.8, created on 2018-05-15 15:40:18
         compiled from "E:/www/UPUPW_K2.1_64/vhosts/fst.net/admin/views/default\admin\login.html" */ ?>
<?php /*%%SmartyHeaderCode:44595afa8ee27599d0-04635424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b97b706ab3dd1c7ff429dd9f1a175038b849b6fc' => 
    array (
      0 => 'E:/www/UPUPW_K2.1_64/vhosts/fst.net/admin/views/default\\admin\\login.html',
      1 => 1516017660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44595afa8ee27599d0-04635424',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'res' => 0,
    'url' => 0,
    'form_token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5afa8ee28fb9b9_12775985',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afa8ee28fb9b9_12775985')) {function content_5afa8ee28fb9b9_12775985($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link href="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/bootstrap/css/login.min.css" rel="stylesheet">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>

</head>

<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7">
            <div class="signin-info">
                <div class="logopanel m-b">
                    <h1>[ H+ ]</h1>
                </div>
                <div class="m-b"></div>
                <h4>欢迎进入 <strong>惠州托马斯</strong></h4>
                <ul class="m-b">
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势一</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势二</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势三</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势四</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势五</li>
                </ul>
                <strong>还没有账号？ <a href="#">立即注册&raquo;</a></strong>
            </div>
        </div>
        <div class="col-sm-5">
            <form method="post" target="_self"  action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/login">
                <h4 class="no-margins">登录：</h4>
                <p class="m-t-md">登录到惠州托马斯后台</p>
                <input type="text" name="user" class="form-control uname" placeholder="用户名/Email/手机" />
                <input type="password" name="passwd" class="form-control pword m-b" placeholder="密码" />
                <a href="">忘记密码了？</a>

                <input type="hidden" name="form_token" value="<?php echo $_smarty_tpl->tpl_vars['form_token']->value;?>
">
                <input type="hidden" name="sub" value="ok">
                <button type="submit" class="btn btn-success btn-block">登录</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; 2015 All Rights Reserved. H+
        </div>
    </div>
</div>
</body>

</html><?php }} ?>