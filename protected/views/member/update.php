<?php
if (Yii::app()->user->id !== $model->id && Yii::app()->user->getPrivilege() ===  "student")
	 throw new CHttpException(404,'The specified page cannot be found.');

elseif( Yii::app()->user->getPrivilege() === "teacher" && Privilege::model()->findByPk( $model->privilege_id )->value === "administrator")
	 throw new CHttpException(404,'The specified page cannot be found.');

$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
			array('label'=>'เพิ่มสมาชิก',
					'items'=>array(
							array('label'=>'กรอกข้อมูล','url'=>array('create')),
							array('label'=>'เป็นไฟล์','url'=>array('upfile')),
					),
					'visible'=>Yii::app()->user->isStudent() ?false:true
			),
			//array('label'=>'เพิ่มสมาชิก','url'=>array('create'),'visible'=>Yii::app()->user->isStudent() ?false:true),
			array('label'=>'ลบสมาชิก','url'=>'#','visible'=> Yii::app()->user->getPrivilege() === "student" ?false:true,
					'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'จัดการสมาชิก','url'=>array('admin'),'visible'=> Yii::app()->user->isStudent() ?false:true),
			array('label'=>'ยืนยันสมาชิก','url'=>array('activate'),'visible'=>Yii::app()->user->isStudent() ?false:true),
			);
?>

	<h1>แก้ไขสมาชิก #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>