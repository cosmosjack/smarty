<?php /* Smarty version Smarty-3.1.8, created on 2018-05-15 15:42:23
         compiled from "E:/www/UPUPW_K2.1_64/vhosts/fst.net/home/views/fst\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:275875afa8f5f990a33-43986813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fc6422089433b580f21b33496d6159a4496fed6' => 
    array (
      0 => 'E:/www/UPUPW_K2.1_64/vhosts/fst.net/home/views/fst\\index\\index.html',
      1 => 1525687663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275875afa8f5f990a33-43986813',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_site' => 0,
    'json_data' => 0,
    'left_r' => 0,
    'left_g' => 0,
    'home_adv' => 0,
    'vas' => 0,
    'res' => 0,
    'left_t' => 0,
    'root' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5afa8f5fa30cd5_08004928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afa8f5fa30cd5_08004928')) {function content_5afa8f5fa30cd5_08004928($_smarty_tpl) {?>
	<?php echo $_smarty_tpl->getSubTemplate ("public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<!--右侧内容-->
			<div class="layer_right">
				<div class="layer_right_centan">
					<?php echo $_smarty_tpl->tpl_vars['data_site']->value['company_name'];?>

				</div>
				<div class="layer_right_left">
					<!--新闻-->
					<div class="box_centen">
						
						<div class="bgtop"><?php echo $_smarty_tpl->tpl_vars['json_data']->value['right_data'][0]['news_cls_name'];?>
</div>
						<!--<div class="topti">
							<a href="#"><?php echo $_smarty_tpl->tpl_vars['json_data']->value['right_data'][0]['news_data']['news_name'];?>
</a>
						</div>-->
						<ul class="dian xinwen">
							<?php  $_smarty_tpl->tpl_vars['left_r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_r']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['right_data'][0]['news_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_r']->key => $_smarty_tpl->tpl_vars['left_r']->value){
$_smarty_tpl->tpl_vars['left_r']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_r']->key;
?>
							<li>
								<a href="/whshow?id=<?php echo $_smarty_tpl->tpl_vars['left_r']->value['news_id'];?>
"><span></span><?php echo $_smarty_tpl->tpl_vars['left_r']->value['news_name'];?>
</a>
							</li>
							<?php } ?>
							
						</ul>
					</div>
					<!--动态-->
					<div class="box_centen">
						<div class="bgtop" style="background: none;">
							<?php echo $_smarty_tpl->tpl_vars['json_data']->value['right_data'][1]['news_cls_name'];?>

							<a href="/whlist" class="gengduo">更多公司动态</a>
						</div>
						<!--<div class="topti">
							<a href="#">【动态】：发展成为中国咨询行业50强</a>
						</div>-->
						<ul class="dian dongtai">
							<?php  $_smarty_tpl->tpl_vars['left_g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_g']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['right_data'][1]['news_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_g']->key => $_smarty_tpl->tpl_vars['left_g']->value){
$_smarty_tpl->tpl_vars['left_g']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_g']->key;
?>
							<li>
								<a href="/whshow?id=<?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_id'];?>
"><span></span><?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_name'];?>
</a>
							</li>
							<?php } ?>
							
						</ul>
					</div>
					<!--荣誉-->
					<div class="box_centen" style="border-bottom: 1px solid #ccc;">
						<div class="bgtop" style="background: none;">
							<?php echo $_smarty_tpl->tpl_vars['json_data']->value['right_data'][2]['news_cls_name'];?>

						</div>
						<ul class="dian">
							<?php  $_smarty_tpl->tpl_vars['left_g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_g']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['right_data'][2]['news_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_g']->key => $_smarty_tpl->tpl_vars['left_g']->value){
$_smarty_tpl->tpl_vars['left_g']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_g']->key;
?>
							<li>
								<a href="/whshow?id=<?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_name'];?>
</a>
							</li>
							<?php } ?>
							
						</ul>
					</div>
					<!--案例-->
					<div class="box_centen">
						<div class="bgtop" style="background: none;">
							<?php echo $_smarty_tpl->tpl_vars['json_data']->value['right_data'][3]['news_cls_name'];?>

						</div>
						<ul class="dians">
							<?php  $_smarty_tpl->tpl_vars['left_g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_g']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['right_data'][3]['news_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_g']->key => $_smarty_tpl->tpl_vars['left_g']->value){
$_smarty_tpl->tpl_vars['left_g']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_g']->key;
?>
							<li>
								<a href="/whshow?id=<?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_name'];?>
</a>
							</li>
							<?php } ?>
							
						</ul>
					</div>
				</div>
				<div class="layer_right_right">
					<div class="carousel_figure">
						<div class="carousel_figure_title">
							<span>新闻标题</span>
						</div>
						<div class="carousel_figure_lunbo">
							<!--轮播图-->
							<div class="yx-rotaion">

								<ul class="rotaion_list">
									<?php  $_smarty_tpl->tpl_vars['vas'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vas']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['home_adv']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vas']->key => $_smarty_tpl->tpl_vars['vas']->value){
$_smarty_tpl->tpl_vars['vas']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['vas']->key;
?>
										<li>
											<a href="<?php echo $_smarty_tpl->tpl_vars['vas']->value['img_url'];?>
">
												<img title="<?php echo $_smarty_tpl->tpl_vars['vas']->value['img_desc'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['vas']->value['pic_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['vas']->value['img_desc'];?>
"  height="200" width="380">
											</a>
										</li>
									<?php } ?>

								</ul>

							</div>

						</div>

					</div>
					<!--客户-->
					<div class="content_column">
						
						<div class="column_img">
							<?php echo $_smarty_tpl->tpl_vars['json_data']->value['right_data'][5]['news_cls_name'];?>

						</div>
						<ul>
							<?php  $_smarty_tpl->tpl_vars['left_g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_g']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['right_data'][5]['news_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_g']->key => $_smarty_tpl->tpl_vars['left_g']->value){
$_smarty_tpl->tpl_vars['left_g']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_g']->key;
?>
							<li>
								<a href="/whshow?id=<?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_name'];?>
</a>
							</li>
							<?php } ?>
							
						</ul>
						
					</div>
					<!--文章-->
					<div class="content_column">
						<div class="column_img">
							<?php echo $_smarty_tpl->tpl_vars['json_data']->value['right_data'][6]['news_cls_name'];?>

						</div>
						<ul>
							<?php  $_smarty_tpl->tpl_vars['left_g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_g']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['right_data'][6]['news_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_g']->key => $_smarty_tpl->tpl_vars['left_g']->value){
$_smarty_tpl->tpl_vars['left_g']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_g']->key;
?>
							<li>
								<a href="/whshow?id=<?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_name'];?>
</a>
							</li>
							<?php } ?>
							
						</ul>
					</div>
					<!--团队-->
					<div class="content_columnsa">
						<div class="column_img">
							<?php echo $_smarty_tpl->tpl_vars['json_data']->value['right_data'][7]['news_cls_name'];?>

						</div>
						<ul>
							<?php  $_smarty_tpl->tpl_vars['left_g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_g']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['right_data'][7]['news_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_g']->key => $_smarty_tpl->tpl_vars['left_g']->value){
$_smarty_tpl->tpl_vars['left_g']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_g']->key;
?>
							<li>
								<a href="/whshow?id=<?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_name'];?>
</a>
							</li>
							<?php } ?>
							
						</ul>
					</div>

				</div>
				<div class="layer_right_all">
					<img src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/images/20170429.jpg" title="精益生产管理" alt="精益生产管理"/>
				</div>
				
				<div class="layer_right_buttom">
					<!--著作-->
					<div class="layer_right_buttom_left">
						<div class="lies_top">
							<?php echo $_smarty_tpl->tpl_vars['json_data']->value['right_data'][4]['news_cls_name'];?>

						</div>
						<div class="lies_buttom">
							<ul>
							<?php  $_smarty_tpl->tpl_vars['left_g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_g']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['right_data'][4]['news_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_g']->key => $_smarty_tpl->tpl_vars['left_g']->value){
$_smarty_tpl->tpl_vars['left_g']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_g']->key;
?>
							<li>
								<a href="/whshow?id=<?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['left_g']->value['news_name'];?>
</a>
							</li>
							<?php } ?>
							
						</ul>
						</div>
					</div>
					
					<div class="layer_right_buttom_right">
						<img src="<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
/images/index_23.png" alt="诚聘英才" title="诚聘英才"/>
					</div>
				</div>

			</div>
			<!--流程-->
			<div class="inner_liucheng">
				<div class="liucheng">
					<div class="liucheng_title">
						精益生产咨询流程
					</div>
					<div class="liucheng_lieaa">
						<ul>
							<li>
								<strong>第一步：前期沟通</strong>
								<span>
									首先由意向企业填写《基本情况调查表》。然后3A精益管理顾问公司根据所填内容，确定前往诊断的内容和顾问师，并与企业签订诊断协议。
								</span>
							</li>
							<li>
								<strong>第二步：诊断实施</strong>
								<span>
									3A精益管理顾问师前往企业进行调研，查找经营和管理中存在的典型问题和问题点，评估改善的机会，提出今后改善的方向、原则、措施和步骤等。
								</span>
							</li>
							<li>
								<strong>第三步：商务谈判</strong>
								<span>
									根据诊断报告，双方就未来改善方向、辅导内容、辅导时间以及辅导费用等进行协商确认。
								</span>
							</li>
							<li>
								<strong>第四步：协议签署</strong>
								<span>
									3A精益管理顾问本着帮助企业解决实际问题，改善企业经营管理和实现企业经济效益最大化的原则，双方达成一致意见后，签署精益管理咨询协议。
								</span>
							</li>
							<li>
								<strong>第五步：项目实施</strong>
								<span>
									3A精益管理顾问师驻厂辅导从双方商定的启动日开始。通常顾问师每月驻厂一次，每次驻厂前会提供《辅导日程安排表》。
								</span>
							</li>
							<li>
								<strong>第六步：项目总结</strong>
								<span>
									3A精益管理顾问公司将对每一个阶段的辅导及其成果进行全面系统的总结，并对企业下一步的精益改善工作进行科学规划。
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="exhibition">
				<div class="exhibition_title">
					精益生产客户展示
				</div>
				<div class="exhibition_image">
					<ul>
						<?php  $_smarty_tpl->tpl_vars['left_t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_t']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_t']->key => $_smarty_tpl->tpl_vars['left_t']->value){
$_smarty_tpl->tpl_vars['left_t']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_t']->key;
?>
							<li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['left_t']->value['link_url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
/uploads/links/<?php echo $_smarty_tpl->tpl_vars['left_t']->value['link_pic'];?>
" alt="企业logo" title="企业logo"/></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<!--友情链接-->
			<div class="exhibition">
				<div class="exhibition_title">
					友情链接
				</div>
				<div class="exhibition_link">
					<ul>
						<?php  $_smarty_tpl->tpl_vars['left_t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_t']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['json_data']->value['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['left_t']->key => $_smarty_tpl->tpl_vars['left_t']->value){
$_smarty_tpl->tpl_vars['left_t']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_t']->key;
?>
							<li>
								<a href="<?php echo $_smarty_tpl->tpl_vars['left_t']->value['link_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['left_t']->value['link_name'];?>
</a>
							</li>
						<?php } ?>
						
					</ul>
				</div>
			</div>

	<!--尾部-->
		<?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!--尾部 end-->
	<script type="text/javascript">
		$(".xinwen li a").eq(0).addClass("xi_text");
		$(".xinwen li a").eq(0).addClass("dt");
		$(".xinwen li").eq(0).css({"background":"none","padding": "2px 0 2px 0px"});
		$(".xinwen li a span").eq(0).text("【新闻】: ");
		$(".dongtai li a").eq(0).addClass("xi_text");
		$(".dongtai li a").eq(0).addClass("dt");
		$(".dongtai li").eq(0).css({"background":"none","padding": "2px 0 2px 0px"});
		$(".dongtai li a span").eq(0).text("【动态】: ");
	</script><?php }} ?>