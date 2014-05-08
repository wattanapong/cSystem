<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Course','url'=>array('index')),
array('label'=>'Manage Course','url'=>array('admin')),
);

$cs = Yii::app()->getClientScript();
$cs->registerCss('css','
.ui-autocomplete-loading {
	background: white url(\'img/ui-anim_basic_16x16.gif\') right center
	no-repeat;
}

ul.ui-autocomplete {
	text-align: left;
}
');

$cs->registerScript('js',"
	$('#Course_code').bind('keyup', function(e) { 
		$('#Course_id').val('');
		$('#Course_valueTh').val('');
		$('#Course_valueEn').val('');
		$('#Course_valueTh').prop('disabled', false);
		$('#Course_valueEn').prop('disabled', false);
	});
");

$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/addField.js');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/autocomplete.js');
?>

<h1>Create Course</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelCS'=>$modelCS,'modely'=>$modely)); ?>