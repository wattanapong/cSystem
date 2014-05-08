<?php
/* @var $this YearedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Yeareds',
);

$this->menu=array(
	array('label'=>'Create Yeared', 'url'=>array('create')),
	array('label'=>'Manage Yeared', 'url'=>array('admin')),
);
?>

<h1>Yeareds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
