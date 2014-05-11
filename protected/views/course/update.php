<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
			array('label'=>'เพิ่มรายวิชาใหม่','url'=>array('create')),
			array('label'=>'ดูรายละเอียดวิชานี้','url'=>array('view','id'=>$model->id)),
			array('label'=>'จัดการรายวิชาใหม่','url'=>array('admin')),
			array('label'=>'เพิ่มรายวิชาสำหรับภาคการศึกษา','url'=>array(Yii::app()->baseUrl.'/../courseonsemester/create')),
			array('label'=>'จัดการรายวิชาสำหรับภาคการศึกษา','url'=>array(Yii::app()->baseUrl.'/../courseonsemester/admin')),
	);

$cs = Yii::app()->getClientScript();
$cs->registerCss('css','
.ui-autocomplete-loading {
	background: white url('.Yii::app()->baseUrl.'\'/img/ui-anim_basic_16x16.gif\') right center
	no-repeat;
}

ul.ui-autocomplete {
	text-align: left;
}
');

$cs->registerScript('js',"
	$('#Course_code').bind('keypress', function(e) { 
		var theEvent = e || window.event;
		var charCode = theEvent.keyCode || theEvent.which;
		if (charCode > 47 && charCode < 58){
		$('#Courseonsemester_course_id').val('');
		$('#Course_valueTh').val('');
		$('#Course_valueEn').val('');
		$('#Course_valueTh').prop('disabled', false);
		$('#Course_valueEn').prop('disabled', false);
		} else theEvent.preventDefault();
	});
");

$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/addField.js');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/autocomplete.js');
?>

	<h1>แก้ไขรายวิชาในภาคการศึกษา<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelCS'=>$modelCS,'modely'=>$modely)); ?>