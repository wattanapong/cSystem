<?php
/* @var $this MemberHasSectionController */
/* @var $model MemberHasSection */

$this->breadcrumbs=array(
	'Member Has Sections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MemberHasSection', 'url'=>array('index')),
	array('label'=>'Manage MemberHasSection', 'url'=>array('admin')),
);
?>

<h1>Create MemberHasSection</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>