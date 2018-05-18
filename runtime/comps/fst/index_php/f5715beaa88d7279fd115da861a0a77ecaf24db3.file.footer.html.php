<?php /* Smarty version Smarty-3.1.8, created on 2018-05-15 15:42:23
         compiled from "E:/www/UPUPW_K2.1_64/vhosts/fst.net/home/views/fst\public\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:88555afa8f5fa7b061-68960362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5715beaa88d7279fd115da861a0a77ecaf24db3' => 
    array (
      0 => 'E:/www/UPUPW_K2.1_64/vhosts/fst.net/home/views/fst\\public\\footer.html',
      1 => 1525858799,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88555afa8f5fa7b061-68960362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'res' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5afa8f5fa7eee9_45205179',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afa8f5fa7eee9_45205179')) {function content_5afa8f5fa7eee9_45205179($_smarty_tpl) {?></section>
<!--版权-->

<footer class="max_footer">
	<div class="butt_max">
		<p>
			<span class="butt_max_text">
				客服QQ号：800047861　客服微信：qiyeguwen3A　方老师：13713712177　深圳热线：0755-82874815、82874711　传真号码：0755-82874671
			</span>
		</p>
		<p>
			<span class="butt_max_text">
				3A精益管理顾问--中国优秀的精益管理咨询公司：精益生产管理、精益TPM管理、精益阿米巴经营、精益研发管理、精益5S/6S管理、精益品质管理、精益成本管理、精益供应链管理等
			</span>
		</p>
		<p>
			<span class="butt_max_text">
				版权所有 翻版必究 深圳市桑尔企业管理顾问股份有限公司 精益管理大师_3A精益管理顾问 www.sz-3a.com 粤ICP备05098828号 站长统计
			</span>
		</p>

	</div>
</footer>
</body>

	
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/js/jquery.min.js"></script>

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/lunbo/js/jquery.yx_rotaion.js"></script>

	<script type="text/javascript">
		$(".yx-rotaion").yx_rotaion({
			auto: true
		});
//		$(".yx-rotaion").css({"width":"100%","height":"100%"});
	</script>
	<script type="text/javascript">
		$(function() {
			$(".nav>li").hover(function() {
				$(this).children('ul').stop(true, true).show(300);
			}, function() {
				$(this).children('ul').stop(true, true).hide(300);
			})
		})
	</script>
	<script type="text/javascript">
		var tid = GetQueryStrings("id");  //获取标签
		$(".bot_class").css("color","#006699");
		$("#"+tid).css("color","red");
	</script>
<!--原始数据  js-->

<script src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/js/raw_data.js"></script> 
	
<!--原始数据-->
	
</html><?php }} ?>