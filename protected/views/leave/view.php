<?php
/* @var $this LeaveController */
/* @var $model Leave */

$this->breadcrumbs=array(
		'Leaves'=>array('index'),
		$model->id,
);

$this->menu=array(
		//array('label'=>'List Leave', 'url'=>array('index')),
		array('label'=>'Create Leave', 'url'=>array('create')),
		array('label'=>'Update Leave', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Delete Leave', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Manage Leave', 'url'=>array('admin')),
);
?>

<h1>
	การลาหมายเลข
	<?php echo $model->id; ?>
</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
				array (
						'name' => 'name_search',
						// 'filter'=>CHtml::listData(Member::model()->findAll(),'id','name'),
						'value' => $model->getNames($model->id,0,0),
						// 'value'=>'$data->getMemberName()',

						'htmlOptions' => array (
								"width" => "500px"
						)
				),

				array (
						'name' => 'leave_type',
						'value' => LeaveType::model()->findByPk($model->leave_type_id)->value,
						'htmlOptions' => array (
								"width" => "200px"
						) ,
						'filter'=>CHtml::listData(LeaveType::model()->findAll(),'id','value'),
				),
				
				array (
						'name' => 'leave_service_number',
						'value' => $model->leave_service_id==0?"":(LeaveService::model()->findByPk($model->leave_service_id)->number),
						'htmlOptions' => array (
								"width" => "200px"
						) ,
						'filter'=>CHtml::listData(LeaveType::model()->findAll(),'id','value'),
				),
				
				array (
						'name' => 'leave_service_header',
						'value' => $model->leave_service_id==0?"":(LeaveService::model()->findByPk($model->leave_service_id)->header),
						'htmlOptions' => array (
								"width" => "200px"
						) ,
						'filter'=>CHtml::listData(LeaveType::model()->findAll(),'id','value'),
				),
					
				array(
						'name'=>'date_start',
						'value'=>convertDateTime($model->date_start),
				),
				array(
						'name'=>'date_end',
						'value'=>convertDateTime($model->date_end),
				),
		),
)); ?>
