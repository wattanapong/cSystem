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
array('label'=>'แก้ไขข้อมูล','url'=>array('update','id'=>$model->id)),
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
				'value'=>  $model->prefix->valueTh,//Prefix::model()->findByPk($model->prefix_id)->valueTh,
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
				'visible'=>$model->privilege->value == "student"?false:true,
		),
		array(
				'name'=>'privilege_id',
				'value'=>  Privilege::model()->findByPk($model->privilege_id)->value,
				'visible'=> Yii::app()->user->getPrivilege() == "student"?false:true,
		),
		
		array(
			'name'=>'major_id',
			'value'=>  $model->major->valueTh,//Major::model()->findByPk($model->major_id)->valueTh,
		),
		
		array(
			'name'=>'faculty_id',
			'value'=>  $model->faculty->valueTh,//Faculty::model()->findByPk($model->faculty->id)->valueTh,
		),
		array(
			'name'=>'phd',
			'value'=>  $model->status==1?"yes":"no",
			'visible'=>$model->privilege->value == "student"?false:true,
		),
),
)); ?>
</div>