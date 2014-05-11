<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->id,
);

$this->menu=array(
			array('label'=>'เพิ่มรายวิชาใหม่','url'=>array('create')),
			array('label'=>'แก้ไขรายวิชานี้','url'=>array('update','id'=>$model->id)),
			array('label'=>'จัดการรายวิชาใหม่','url'=>array('admin')),
			array('label'=>'เพิ่มรายวิชาสำหรับภาคการศึกษา','url'=>array(Yii::app()->baseUrl.'/../courseonsemester/create')),
			array('label'=>'จัดการรายวิชาสำหรับภาคการศึกษา','url'=>array(Yii::app()->baseUrl.'/../courseonsemester/admin')),
);
?>

<h1>View Course #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'code',
		'valueTh',
		'valueEn',
),
)); ?>
