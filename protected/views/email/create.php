<?php
/* @var $this EmailController */
/* @var $model Email */

$this->breadcrumbs=array(
	'Emails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Email', 'url'=>array('index')),
	array('label'=>'Manage Email', 'url'=>array('admin')),
);
?>

<h1>Create Email</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>