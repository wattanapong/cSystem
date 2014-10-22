<?php
/* @var $this LeaveServiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Leave Services',
);

$this->menu=array(
	array('label'=>'Create LeaveService', 'url'=>array('create')),
	array('label'=>'Manage LeaveService', 'url'=>array('admin')),
);
?>

<h1>Leave Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
