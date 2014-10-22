<?php
/* @var $this TelController */
/* @var $model Tel */

$this->breadcrumbs=array(
	'Tels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tel', 'url'=>array('index')),
	array('label'=>'Manage Tel', 'url'=>array('admin')),
);
?>

<h1>Create Tel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>