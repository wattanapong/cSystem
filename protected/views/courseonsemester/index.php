<?php
/* @var $this CourseonsemesterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Courseonsemesters',
);

$this->menu=array(
	array('label'=>'เพิ่มรายวิชาประจำภาคการศึกษา','url'=>array('create')),
		array('label'=>'จัดการรายวิชาประจำภาคการศึกษา','url'=>array('admin')),
);
?>

<h1>รายละเอียดวิชาตามภาคการศึกษา</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
