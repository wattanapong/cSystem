<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl("/assignment/select"),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'topic',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'pdf',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->dropDownListRow($model,'category_id',array('empty'=>'')+CHtml::listdata( Category::model()->findAll(),'id','name'),array('class'=>'span5')); ?>

		<?php 
	$form->widget(
			'ext.jui.EJuiDateTimePicker',
			array(
					'model'     => $model,
					'attribute' => 'created',
					'mode'    => 'datetime',
					'language'=> 'th',
					'htmlOptions'=>array(
							'class'=>'span5',
							'id' => 'search_created',
							'size' => '10',
							'value' => convertDate($model->created),
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

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
