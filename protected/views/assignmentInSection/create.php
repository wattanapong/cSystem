<?php
if (!isset($secid)){
	$this->breadcrumbs=array(
			'Assignment In Sections'=>array('index'),
			'Create',
	);

	$this->menu=array(
			array('label'=>'List AssignmentInSection','url'=>array('index')),
			array('label'=>'Manage AssignmentInSection','url'=>array('admin')),
	);

?>
<h1>สร้าง Assignment</h1>
<?php } ?>

<?php 
Yii::app()->clientScript->registerScript('search', "
function reinstallDatePickerForm() {
		$('#form_start').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
		$('#form_end').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
}
		reinstallDatePickerForm();
");

if (isset($secid)) echo $this->renderPartial('/assignmentInSection/_form'
		, array('model'=>$model,'modelA'=>$modelA,'secid'=>$secid));
else   echo $this->renderPartial('_form', array('model'=>$model));
?>