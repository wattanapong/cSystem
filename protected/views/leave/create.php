<?php
/* @var $this LeaveController */
/* @var $model Leave */
Yii::app()->bootstrap->registerAllCss();

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/js/jquery-ui-i18n.min.js' );
Yii::app()->clientScript->registerScript('search', "
		function reinstallDatePicker() {

		$('#datepicker_for_date_end').datetimepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',timeFormat:'HH:mm:ss',showOn: 'both',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
		$('#datepicker_for_date_start').datetimepicker( $.extend( $.datepicker.regional[ 'th' ],{ showTime:true,dateFormat: 'd MM yy',timeFormat:'HH:mm:ss',showOn: 'both',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );

						
		$('#Leave_date_end').datepicker( $.extend( $.datepicker.regional[ 'th' ],{  dateFormat: 'd MM yy',timeFormat:'HH:mm:ss',showOn: 'both',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
		$('#Leave_date_start').datepicker( $.extend( $.datepicker.regional[ 'th' ],{ dateFormat: 'd MM yy',timeFormat:'HH:mm:ss',showOn: 'both',changeMonth:'true',changeYear:'true',defaultDate:'+543y'} ) );
}

		reinstallDatePicker();
		");

$this->breadcrumbs = array (
		'Leaves' => array (
				'index' 
		),
		'Create' 
);

$this->menu=array(
	//array('label'=>'List Leave', 'url'=>array('index')),
	array('label'=>'แก้ไขการลา', 'url'=>array('admin')),
		array (
				'label' => 'ปฎิทินการลา',
				'url' => array (
						'member/calendar'
				)
		)
);
?>

<h1>Create Leave</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelService'=>$modelService,'modelMemberHasLeave'=>$modelMemberHasLeave)); ?>