<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Create',
);

$this->menu=array(
		array('label'=>'เพิ่มสมาชิก',
				'items'=>array(
						array('label'=>'กรอกข้อมูล','url'=>array('create')),
						array('label'=>'เป็นไฟล์','url'=>array('upfile')),
				),
		),
			array('label'=>'จัดการสมาชิก','url'=>array('admin'),'visible'=> Yii::app()->user->isStudent() ?false:true),
			array('label'=>'ยืนยันสมาชิก','url'=>array('activate'),'visible'=>Yii::app()->user->isStudent() ?false:true),
);
?>

	<h1>เพิ่มสมาชิก</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>