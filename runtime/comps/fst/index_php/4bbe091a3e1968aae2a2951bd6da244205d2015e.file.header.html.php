<?php /* Smarty version Smarty-3.1.8, created on 2018-05-15 15:42:23
         compiled from "E:/www/UPUPW_K2.1_64/vhosts/fst.net/home/views/fst\public\header.html" */ ?>
<?php /*%%SmartyHeaderCode:195475afa8f5fa406d0-77983635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bbe091a3e1968aae2a2951bd6da244205d2015e' => 
    array (
      0 => 'E:/www/UPUPW_K2.1_64/vhosts/fst.net/home/views/fst\\public\\header.html',
      1 => 1525858734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195475afa8f5fa406d0-77983635',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_site' => 0,
    'res' => 0,
    'public' => 0,
    'data_column' => 0,
    'val' => 0,
    'vk' => 0,
    'json_data' => 0,
    'left_l' => 0,
    'left_h' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5afa8f5fa63961_34339428',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afa8f5fa63961_34339428')) {function content_5afa8f5fa63961_34339428($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<meta name="renderer" content="webkit">
		<!-- 目前仅限360急速浏览 webkit:急速  ie-comp:ie兼容模式   ie-stand: ie标准模式 -->
		<title>
			<?php echo $_smarty_tpl->tpl_vars['data_site']->value['default_keywords'];?>

		</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/css/index.css" />
		<!--本页面样式-->
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/lunbo/css/yx_rotaion.css" />
		<!--轮播图样式-->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/js/url.js"></script>
	</head>
	<!--头部-->
	<script type="text/javascript">
		function GetQueryStrings(name) {
			var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
			var r = window.location.search.substr(1).match(reg);
			if (r != null) return decodeURI(r[2]);
			return null;
		}

	
	</script>
	<body>
		<header>
			<!--logo区-->
			<div class="header_max">
				<div class="max_now">
					<div class="max_now_img">
						<a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/uploads/home_adv/<?php echo $_smarty_tpl->tpl_vars['data_site']->value['site_logo'];?>
" alt="logo" title="logo" /></a>
					</div>
					<div class="max_now_logo">
						<div class="max_now_poane">
							<?php echo $_smarty_tpl->tpl_vars['data_site']->value['company_tel'];?>

						</div>
					</div>

				</div>
			</div>
			<!--导航-->
			<div class="daohang">
				<div class="menu">
					<ul class="nav">
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data_column']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
							<li>
								<a href="<?php echo $_smarty_tpl->tpl_vars['val']->value['url'];?>
">
									<?php echo $_smarty_tpl->tpl_vars['val']->value['cls_name'];?>

								</a>
								<ul class="sub-nav">
									<?php  $_smarty_tpl->tpl_vars['vk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vk']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['val']->value['son_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vk']->key => $_smarty_tpl->tpl_vars['vk']->value){
$_smarty_tpl->tpl_vars['vk']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['vk']->key;
?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['vk']->value['url'];?>
">
											<?php echo $_smarty_tpl->tpl_vars['vk']->value['cls_name'];?>

										</a>
										<?php } ?>
								</ul>
							</li>
							<?php } ?>
					</ul>
				</div>

			</div>
		</header>
		<!--内容区-->
		<section class="inner_layer">
			<!--左侧-->
			<div class="layer_left">
				<div class="layer_left_title">
					<img src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/images/logo.jpg" height="50" title="logo图" alt="logo图" />
				</div>
				
				<?php  $_smarty_tpl->tpl_vars['left_l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_l']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['left_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_l']->key => $_smarty_tpl->tpl_vars['left_l']->value){
$_smarty_tpl->tpl_vars['left_l']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_l']->key;
?>
					<div class="layer_left_content">
						<!--?id=<?php echo $_smarty_tpl->tpl_vars['left_l']->value['news_cls_id'];?>
-->
						<a href="/whlist"><h4><?php echo $_smarty_tpl->tpl_vars['left_l']->value['news_cls_name'];?>
</h4></a>
						<?php  $_smarty_tpl->tpl_vars['left_h'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_h']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['left_l']->value['news_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_h']->key => $_smarty_tpl->tpl_vars['left_h']->value){
$_smarty_tpl->tpl_vars['left_h']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_h']->key;
?>
							<a id="<?php echo $_smarty_tpl->tpl_vars['left_h']->value['news_id'];?>
" class="bot_class" href="/whshow?id=<?php echo $_smarty_tpl->tpl_vars['left_h']->value['news_id'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['left_h']->value['news_name'];?>

							</a>
						<?php } ?>
						
					</div>
				<?php } ?>	
				
			</div>
			
<?php }} ?>