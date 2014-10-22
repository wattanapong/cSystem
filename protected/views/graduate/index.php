<?php
/* @var $this GraduateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Graduates',
);

$this->menu=array(
	array('label'=>'Create Graduate', 'url'=>array('create')),
	array('label'=>'Manage Graduate', 'url'=>array('admin')),
);
?>

<h1>Graduates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
