<?php
Yii::app()->clientscript
->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
->registerCssFile( Yii::app()->theme->baseUrl . '/css/style.css' )
->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/js/jquery-ui-i18n.min.js' );
// use it when you need it!
/*
 ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )
*/
Yii::app()->bootstrap->register();
?>
<!DOCTYPE html>
<html lang="en">
<body>

	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse"> <span class="icon-bar"></span> <span
					class="icon-bar"></span> <span class="icon-bar"></span>
				</a> <a class="brand" href="#"><?php echo Yii::app()->name ?> </a>
				<div class="nav-collapse">
					<?php $this->widget('zii.widgets.CMenu',array(
							'htmlOptions' => array( 'class' => 'nav' ),
							'activeCssClass'	=> 'active',
							'items'=>array(
									array('label'=>'หน้าหลัก', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
									array('label'=>'จัดการสมาชิก', 'url'=>array('/member/admin'), 'visible'=>!Yii::app()->user->isGuest),
									array('label'=>'เข้าสู่ระบบ', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
									array('label'=>'เกี่ยวกับ', 'url'=>array('/site/page', 'view'=>'about')),
									array('label'=>'ออกจากระบบ ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
							),
					)); ?>
					<!-- <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p> -->
				</div>
				<!--/.nav-collapse -->
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</div>
	<div class="cont">
		<div class="container-fluid">
			<div class="row-fluid">

				<div class="span12">
					<div class="unit">
						<?php echo $content ?>
					</div>
				</div>
				<!--/span-->
			</div>
			<!--/row-->

			<hr>

			<footer>
				<h4>
					<a href="http://www.ict.up.ac.th/wattanapong.su">&copy; WATTANAPONG
						SUTTAPAK</a>
				</h4>
				<h5>
					<a href="http://www.ict.up.ac.th">Software Engineering, School of
						Information Communication Technology(ICT), University of Phayao</a>
				</h5>
			</footer>

		</div>
	</div>
	<!-- JavaScript -->
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.js"></script>

</body>

</html>
