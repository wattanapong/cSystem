<?php
/* @var $this YearedController */
/* @var $model Yeared */

$this->breadcrumbs=array(
	'Yeareds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Yeared', 'url'=>array('index')),
	array('label'=>'Manage Yeared', 'url'=>array('admin')),
);
?>

<h1>Create Yeared</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>