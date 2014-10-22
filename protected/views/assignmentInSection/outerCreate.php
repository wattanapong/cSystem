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
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/js/jquery-ui-i18n.min.js' );
Yii::app()->clientScript->registerScript('search', "
function reinstallDatePickerForm() {
		$('#datepicker_for_date_end').datetimepicker( $.extend( $.datepicker.regional[ 'th' ],{ showTime:true,dateFormat: 'd MM yy',timeFormat:'HH:mm:ss',showOn: 'both',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
		$('#datepicker_for_date_start').datetimepicker( $.extend( $.datepicker.regional[ 'th' ],{ showTime:true,dateFormat: 'd MM yy',timeFormat:'HH:mm:ss',showOn: 'both',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
}
		reinstallDatePickerForm();
");

if (isset($secid)) echo $this->renderPartial('/assignmentInSection/_outerForm'
		, array('model'=>$model,'modelA'=>$modelA,'secid'=>$secid));
else   echo $this->renderPartial('_form', array('model'=>$model));
?>