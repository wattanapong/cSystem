<?php
/* @var $this AcademicRankController */
/* @var $model AcademicRank */

$this->breadcrumbs=array(
	'Academic Ranks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AcademicRank', 'url'=>array('index')),
	array('label'=>'Manage AcademicRank', 'url'=>array('admin')),
);
?>

<h1>Create AcademicRank</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>