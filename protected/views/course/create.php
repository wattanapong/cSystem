<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'จัดการรายวิชาใหม่','url'=>array('admin')),
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
		$('#Course_valueTh').val('');
		$('#Course_valueEn').val('');
		$('#Course_valueTh').prop('readonly', false);
		$('#Course_valueEn').prop('readonly', false);
		} else theEvent.preventDefault();
	});
");

$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/addField.js');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/autocomplete.js');
?>

<h1>เพิ่มรายวิชาในภาคการศึกษา</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>