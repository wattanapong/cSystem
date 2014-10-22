<div class="well bs-layout">
<span class="bs-layout-header">Assignment ทั้งหมด</span>
<?php 
$searchResult = $model->search();
$this->renderPartial('/assignment/admin',
		array('model'=> $model,'searchResult'=>$searchResult,'secid'=>$secid));
?>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'assignment-form',
		'action'=>Yii::app()->createUrl('assignment/create'),
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
			'enctype' => 'multipart/form-data',
			//'onsubmit'=>"return false;",
			//'onkeypress'=>" if(event.keyCode == 13){ send(); } "
	),
)); ?>


<div class="well bs-layout">
<span class="bs-layout-header">เพิ่ม Assignment ใหม่</span>
<div class="clear" style="height:30px"></div>
<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'topic',array('class'=>'span5','maxlength'=>100,'id'=>'topicA')); ?>

	<?php echo $form->fileFieldRow($model,'pdf',array('id'=>'pdfA')); ?>

	<?php echo $form->dropDownListRow($model,'category_id',CHtml::listdata(Category::model()->findAll(),'id','name'),
			array('class'=>'span5','id'=>'category_idA')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'htmlOptions'=>array('onclick'=>'send();return false;'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>

<script type="text/javascript">
 
function send()
 {
 
  // var data=$("#assignment-form").serialize();
  var data = new FormData($("#assignment-form")[0]);
 
  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createUrl("/assignment/create"); ?>',
   data:data,
   dataType:'json',
success:function(data){
			$("#assignment-form")[0].reset();
	 			$.fn.yiiGridView.update('assignment-grid');
              },
   error: function(data, textStatus, xhr) { // if error occured
      	alert("กรุณาตรวจสอบชื่อ โจทย์และประเภทของ assignment");
    },

    cache: false,
    contentType: false,
    processData: false
 
  //dataType:'html'
  });
  return false;
}
 
</script>