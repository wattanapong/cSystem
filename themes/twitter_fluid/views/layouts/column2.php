<?php $this->beginContent('//layouts/main'); ?>
      <div class="row-fluid">
        <div class="span2">
         <?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'เมนู',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'sidebar'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar span3 -->

	<div class="span10">
		<div class="main">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>
