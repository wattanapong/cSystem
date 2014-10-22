<?php
/* @var $this AcademicRankController */
/* @var $model AcademicRank */

$this->breadcrumbs=array(
	'Academic Ranks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AcademicRank', 'url'=>array('index')),
	array('label'=>'Create AcademicRank', 'url'=>array('create')),
	array('label'=>'View AcademicRank', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AcademicRank', 'url'=>array('admin')),
);
?>

<h1>Update AcademicRank <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>