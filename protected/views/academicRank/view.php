<?php
/* @var $this AcademicRankController */
/* @var $model AcademicRank */

$this->breadcrumbs=array(
	'Academic Ranks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AcademicRank', 'url'=>array('index')),
	array('label'=>'Create AcademicRank', 'url'=>array('create')),
	array('label'=>'Update AcademicRank', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AcademicRank', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AcademicRank', 'url'=>array('admin')),
);
?>

<h1>View AcademicRank #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'valueTh',
		'valueEn',
	),
)); ?>
