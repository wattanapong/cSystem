<?php
if (Yii::app()->user->id !== $model->id && Yii::app()->user->getPrivilege() ===  "student")
	 throw new CHttpException(404,'The specified page cannot be found.');

elseif( Yii::app()->user->getPrivilege() === "teacher" && Privilege::model()->findByPk( $model->privilege_id )->value === "administrator")
	 throw new CHttpException(404,'The specified page cannot be found.');
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'เพิ่มสมาชิก',
					'items'=>array(
							array('label'=>'กรอกข้อมูล','url'=>array('create')),
							array('label'=>'เป็นไฟล์','url'=>array('upfile')),
					),
					'visible'=>Yii::app()->user->isStudent() ?false:true
			),
array('label'=>'แก้ไขสมาชิก','url'=>array('update','id'=>$model->id)),
array('label'=>'ลบสมาชิก','url'=>'#','visible'=> Yii::app()->user->getPrivilege() === "student" ?false:true,
		'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'จัดการสมาชิก','url'=>array('admin'),'visible'=> Yii::app()->user->isStudent() ?false:true),
array('label'=>'ยืนยันสมาชิก','url'=>array('activate'),'visible'=>Yii::app()->user->isStudent() ?false:true),
);
?>
<div class="hero-unit ">
<h2>ข้อมูลสมาชิก #<?php echo $model->id; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'username',
		'fuser',
		array(
				'name'=>'prefix_id',
				'value'=>  Prefix::model()->findByPk($model->prefix_id)->valueTh,
		),
		'name',
		'surname',
		array(
				'name'=>'date_registered',
				'value'=>convertDate($model->date_registered),
		),
		array(
				'name'=>'status',
				'value'=>  $model->status==1?"ON":"OFF",
		),
		array(
				'name'=>'academic_rank_id',
				'visible'=>Privilege::model()->findByPk($model->privilege_id)->value == "student"?false:true,
		),
		array(
				'name'=>'privilege_id',
				'value'=>  Privilege::model()->findByPk($model->privilege_id)->value,
				'visible'=> Yii::app()->user->getPrivilege() == "student"?false:true,
		),
		array(
				'name'=>'phd',
				'value'=>  $model->status==1?"yes":"no",
				'visible'=>Privilege::model()->findByPk($model->privilege_id)->value == "student"?false:true,
		),
),
)); ?>
</div>