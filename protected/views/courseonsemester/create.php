<?php
/* @var $this CourseonsemesterController */
/* @var $model Courseonsemester */

$this->breadcrumbs=array(
	'Courseonsemesters'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'เพิ่มการรายวิชาใหม่','url'=>array(Yii::app()->baseUrl.'/../courseonsemester/create')),
array('label'=>'จัดการรายวิชาใหม่','url'=>array(Yii::app()->baseUrl.'/../courseonsemester/admin')),
array('label'=>'จัดการรายวิชาสำหรับภาคการศึกษา','url'=>array('admin')),
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
		
		if ( (charCode > 47 && charCode < 58) ){
		$('#Courseonsemester_course_id').val('');
		$('#Course_valueTh').val('');
		$('#Course_valueEn').val('');
		}
		 else theEvent.preventDefault();
	});
");

$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/addField.js');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/autocomplete.js');
?>

<h1>เพิ่มรายวิชาในภาคการศึกษา</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelc'=>$modelc,'modely'=>$modely)); ?>