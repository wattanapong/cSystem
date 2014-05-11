<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span2">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'เมนู',		
		));
		$this->widget('bootstrap.widgets.TbMenu', array(
			'items'=>$this->menu,
			'type'=>'list',
		));
		$this->endWidget();
	?>
</div>
<div class="span10">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>