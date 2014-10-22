<?php
/* @var $this TelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tels',
);

$this->menu=array(
	array('label'=>'Create Tel', 'url'=>array('create')),
	array('label'=>'Manage Tel', 'url'=>array('admin')),
);
?>

<h1>Tels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
