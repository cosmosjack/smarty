<?php /* Smarty version Smarty-3.1.8, created on 2018-05-15 17:27:19
         compiled from "E:/www/UPUPW_K2.1_64/vhosts/fst.net/home/views/fst\whshow\index.html" */ ?>
<?php /*%%SmartyHeaderCode:136355afaa7f7ef40e7-55967430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '509d6adbb3d0d903a13f9588adf1719b597e9c94' => 
    array (
      0 => 'E:/www/UPUPW_K2.1_64/vhosts/fst.net/home/views/fst\\whshow\\index.html',
      1 => 1525395253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136355afaa7f7ef40e7-55967430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'json_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5afaa7f806d500_91272183',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afaa7f806d500_91272183')) {function content_5afaa7f806d500_91272183($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\www\\UPUPW_K2.1_64\\vhosts\\fst.net\\brophp\\libs\\plugins\\modifier.date_format.php';
?>
	<?php echo $_smarty_tpl->getSubTemplate ("public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		
			<div class="layer_right">
				<div class="layer_right_centan">
					<?php echo $_smarty_tpl->tpl_vars['json_data']->value['data_news']['news_name'];?>

				</div>
				<div class="layer_right_boxs">
					<?php echo $_smarty_tpl->tpl_vars['json_data']->value['data_news']['news_body'];?>

				</div>
				<div id="shi_time" style="width: 100%;height: auto;overflow: hidden;color: #999;">
					<span>发表于 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['json_data']->value['data_news']['add_times'],"Y-m-d H:m:s");?>
</span>
				</div>
			</div>
			
	<!--尾部-->
	<?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!--尾部 end-->
	
		<?php }} ?>