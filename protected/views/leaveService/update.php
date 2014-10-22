<?php
/* @var $this LeaveServiceController */
/* @var $model LeaveService */

$this->breadcrumbs=array(
	'Leave Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LeaveService', 'url'=>array('index')),
	array('label'=>'Create LeaveService', 'url'=>array('create')),
	array('label'=>'View LeaveService', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LeaveService', 'url'=>array('admin')),
);
?>

<h1>Update LeaveService <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>