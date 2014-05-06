<?php /* @var $this Controller */ ?>
<!DOCTYPE html">
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<style>
		.navbar .navbar-inner .container {
			width:100%;
		}
	</style>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
		'type'=>'null', // null or 'inverse'
		'brand'=>$this->pageTitle,
		'brandUrl'=>Yii::app()->baseUrl,
		'collapse'=>true, // requires bootstrap-responsive.css
		'htmlOptions'=>array('class'=>'main-navbar'),
		'items'=>array(
				array(
						'class'=>'bootstrap.widgets.TbMenu',
						'htmlOptions'=>array('class'=>'pull-right'),
						'items'=>array(
								array('label'=>'Home', 'url'=>array('/site/index')),
								array('label'=>'Member', 'url'=>array('/member/admin'), 'visible'=>(!Yii::app()->user->isStudent() && !Yii::app()->user->isGuest)) ,
								array('label'=>'Profile', 'url'=>array('/member/profile/'.Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
								array('label'=>'Contact', 'url'=>array('/site/contact')),
								array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
								array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
				),
		),
)); ?>

<div class="container" id="page" style="margin-top:50px">	
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear" style="height: 30px"></div>

	<footer class="modal-footer">
			<h4>
				<a href="http://www.ict.up.ac.th/wattanapong.su">&copy; WATTANAPONG
					SUTTAPAK</a>
			</h4>
			<h5>
				<a href="http://www.ict.up.ac.th">Software Engineering, School of
					Information Communication Technology(ICT), University of Phayao</a>
			</h5>
		</footer><!-- footer -->

</div><!-- page -->

</body>
</html>
