<?php
/* @var $this MemberHasGraduateController */
/* @var $model MemberHasGraduate */

$this->breadcrumbs=array(
	'Member Has Graduates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MemberHasGraduate', 'url'=>array('index')),
	array('label'=>'Manage MemberHasGraduate', 'url'=>array('admin')),
);
?>

<h1>Create MemberHasGraduate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>