<?php
/* @var $this LeaveServiceController */
/* @var $model LeaveService */

$this->breadcrumbs=array(
	'Leave Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LeaveService', 'url'=>array('index')),
	array('label'=>'Manage LeaveService', 'url'=>array('admin')),
);
?>

<h1>Create LeaveService</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>