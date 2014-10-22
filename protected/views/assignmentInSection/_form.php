<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'assignment-in-section-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="clear" style="height:30px"></div>
<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'assignment_title',array('class'=>'assignment_title span5 ','maxlength'=>45)); ?>
	<?php echo $form->textFieldRow($model,'assignment_id',array('class'=>' assignment_id span5 ','readonly'=>'true')); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'เลือก Assignment จากคลัง',
			'icon'=>'search',
			'htmlOptions' => array (
					//'data-toggle' => 'modal',
					//'data-target' => '#assModal'
					'onClick'=>'$(\'#asm-sec\').toggle()',
			)
		)); ?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'เพิ่ม Assignment เข้าคลัง',
			'icon'=>'plus',
			'htmlOptions' => array (
					'target'=>'_blank',
			),
			'url'=>Yii::app()->createUrl('/assignment/create'),
		)); ?>
	
	<?php echo $form->labelEx($model,'start'); ?>
	<?php 
	$form->widget(
			'ext.jui.EJuiDateTimePicker',
			array(
					'model'     => $model,
					'attribute' => 'start',
					'mode'    => 'datetime',
					'language'=> 'th',
					'htmlOptions'=>array(
							'class'=>'span5',
							'id' => 'form_start',
							'size' => '10',
							'value' => convertDate($model->start),
							'width'=>'120px',
					),
					'options'=>array(
							'showOn'=>'button',
							'buttonImage' => Yii::app ()->request->baseUrl . '/images/icon/calendar.png',
							'dateFormat'=> 'd MM yy',
							'changeMonth'=>'true',
							'changeYear'=>'true',
							'defaultDate'=>'+543y',
					),
		 )
	 ); ?>
	<?php echo $form->error($model,'start'); ?>
	
	<?php echo $form->labelEx($model,'end'); ?>
	<?php 
	$form->widget(
			'ext.jui.EJuiDateTimePicker',
			array(
					'model'     => $model,
					'attribute' => 'end',
					'mode'    => 'datetime',
					'language'=> 'th',
					'htmlOptions'=>array(
							'class'=>'span5',
							'id' => 'form_end',
							'size' => '10',
							'value' => convertDate($model->end),
							'width'=>'120px',
					),
					'options'=>array(
							'showOn'=>'button',
							'buttonImage' => Yii::app ()->request->baseUrl . '/images/icon/calendar.png',
							'dateFormat'=> 'd MM yy',
							'changeMonth'=>'true',
							'changeYear'=>'true',
							'defaultDate'=>'+543y',
					),
		 )
	 ); ?>
	<?php echo $form->error($model,'end'); ?>
		
	<?php if (!isset($secid)){ echo $form->textFieldRow($model,'section',array('class'=>'span5')); ?>
	<?php }else echo $form->hiddenField($model,'section',array('class'=>'span5','value'=>$secid)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<!-- modal section  -->
<?php /*$this->beginWidget('bootstrap.widgets.TbModal',
		 array('id'=>'assModal',
		 		'htmlOptions'=>array( 'style'=>'','data-backdrop'=>'static') ) );*/ ?>

<!--<div class="modal-header" style="background-color:#DDD">
	<a class="close" data-dismiss="modal">&times;</a>
	<h4>เพิ่ม Assignment</h4>
</div>

<div class="modal-body" style="overflow:auto;">->
	<?php 
	/*$searchResult = $model->search();
	$this->renderPartial('/assignment/manage',
			array('model'=> $modelA,'searchResult'=>$searchResult,'secid'=>$secid));*/
	?>
<!-- </div> -->
<?php //$this->endWidget(); ?>
