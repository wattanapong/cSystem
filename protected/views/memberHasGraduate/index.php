<?php
/* @var $this MemberHasGraduateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Member Has Graduates',
);

$this->menu=array(
	array('label'=>'Create MemberHasGraduate', 'url'=>array('create')),
	array('label'=>'Manage MemberHasGraduate', 'url'=>array('admin')),
);
?>

<h1>Member Has Graduates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
