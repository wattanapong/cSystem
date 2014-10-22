<?php
/* @var $this AcademicRankController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Academic Ranks',
);

$this->menu=array(
	array('label'=>'Create AcademicRank', 'url'=>array('create')),
	array('label'=>'Manage AcademicRank', 'url'=>array('admin')),
);
?>

<h1>Academic Ranks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
