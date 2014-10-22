<?php

$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
		'id' => 'assignment-in-section-form',
		'enableAjaxValidation' => false 
) );
?>
<div class="clear" style="height: 30px"></div>
<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'assignment_title',array('class'=>'span5 ','maxlength'=>45,
			'id'=>'outerAssignmentInSection_assignment_title')); ?>
			
	<?php echo $form->hiddenField($model,'assignment_id',array('class'=>'span5 ',
			'id'=>'outerAssignmentInSection_assignment_id','readonly'=>'true')); ?>
			
	<?php echo $form->textFieldRow($model,'assignment_name',array('class'=>'span5 ',
			'id'=>'outerAssignmentInSection_assignment_name','readonly'=>'true')); ?>
	<?php
	
$this->widget ( 'bootstrap.widgets.TbButton', array (
			// 'buttonType'=>'submit',
			'type' => 'primary',
			'label' => 'เลือก Assignment จากคลัง',
			'icon' => 'search',
			'htmlOptions' => array (
					// 'data-toggle' => 'modal',
					// 'data-target' => '#assModal'
					
					'onClick' => '
							$(\'#asm-sec\').toggle(); 
						$(\'html, body\').animate({
        					scrollTop: $("#asm-sec").offset().top
    					}, 1000);
						
					' 
			) 
	) );
	?>
		
		<?php
		
$this->widget ( 'bootstrap.widgets.TbButton', array (
				// 'buttonType'=>'submit',
				'type' => 'success',
				'label' => 'เพิ่ม Assignment เข้าคลัง',
				'icon' => 'plus',
				'htmlOptions' => array (
						'target' => '_blank' 
				),
				'url' => Yii::app ()->createUrl ( '/assignment/create' ) 
		) );
		?>
	
	<?php echo $form->labelEx($model,'start'); ?>
	<?php
	$form->widget ( 'ext.jui.EJuiDateTimePicker', array (
			'model' => $model,
			'attribute' => 'start',
			'mode' => 'datetime',
			'htmlOptions' => array (
					'class' => 'span5',
					'id' => 'datepicker_for_date_start',
					'size' => '10',
					'value' => convertDateTime ( $model->start ),
					'width' => '120px' 
			),
	) );
	?>
	<?php echo $form->error($model,'start'); ?>
	
	<?php echo $form->labelEx($model,'end'); ?>
	<?php
	$form->widget ( 'ext.jui.EJuiDateTimePicker', array (
			'model' => $model,
			'attribute' => 'end',
			'mode' => 'datetime',
			'language' => 'th',
			'htmlOptions' => array (
					'class' => 'span5',
					'id' => 'datepicker_for_date_end',
					'size' => '10',
					'value' => convertDateTime ( $model->end ),
					'width' => '120px' 
			),
			'options' => array (
					'showOn' => 'button',
					'buttonImage' => Yii::app ()->request->baseUrl . '/images/icon/calendar.png',
					'dateFormat' => 'd MM yy',
					'changeMonth' => 'true',
					'changeYear' => 'true',
					'defaultDate' => '+543y' 
			) 
	) );
	?>
	<?php echo $form->error($model,'end'); ?>
		
	<?php if (!isset($secid)){ echo $form->textFieldRow($model,'section',array('class'=>'span5')); ?>
	<?php }else echo $form->hiddenField($model,'section',array('class'=>'span5','value'=>$secid)); ?>

<div class="form-actions">
<?php 
$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			//'icon'=>'ok',
			'type'=>'primary',
			'label'=>'เพิ่ม',
			'htmlOptions'=>array( 
				'onclick'=>"
					var assid = $('#outerAssignmentInSection_assignment_id').val();
					var title = $('#outerAssignmentInSection_assignment_title').val();
					var start = $('#datepicker_for_date_start').val();
					var end = $('#datepicker_for_date_end').val();
					if (assid > 0 && title != '' ) {
						$.ajax( {
                                        type:'POST',
                                        url:'".Yii::app()->createUrl('/assignmentInSection/addAssignment')."',
										data: {id:assid,title:title,start:start,end:end,sid:".$secid."},
                                        success:function(data) { 	
											alert(data);
                                             $.fn.yiiGridView.update('assignment-in-section-grid');
                                        },
										error:function(data){
					alert('msg');						
					alert(data);
											
										}
                  		 });
				}
					
					return false;"
			),
		)); 
?>
</div>

<?php $this->endWidget(); ?>