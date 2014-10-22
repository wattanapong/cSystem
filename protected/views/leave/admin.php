<?php
/* @var $this LeaveController */
/* @var $model Leave */
$this->breadcrumbs = array (
		'Leaves' => array (
				'index'
		),
		'Manage'
);

$this->menu = array (
		// array('label'=>'List Leave', 'url'=>array('index')),
		array (
				'label' => 'สร้างการลาใหม่',
				'url' => array (
						'create'
				)
		)
		,
		array (
				'label' => 'ปฎิทินการลา',
				'url' => array (
						'member/calendar'
				)
		)
);

Yii::app ()->clientScript->registerScript ( 'search', "
		$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
});
		$('.search-form form').submit(function(){
		$('#leave-grid').yiiGridView('update', {
		data: $(this).serialize()
});
		return false;
});
		" );
?>

<h1>เพิ่ม/ลบ/แก้ไข การลา</h1>
<!-- 
<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>,
	<b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the
	beginning of each of your search values to specify how the comparison
	should be done.
</p> -->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">
	<?php

	$this->renderPartial ( '_search', array (
			'model' => $model
	) );
	?>
</div>
<!-- search-form -->

<?php

$this->widget ( 'zii.widgets.grid.CGridView', array (
		'id' => 'leave-grid',
		'dataProvider' => $model->search (),
		'afterAjaxUpdate' => 'reinstallDatePicker',
		'filter' => $model,
		'columns' => array (
				array (
						'name' => 'name_search',
						// 'filter'=>CHtml::listData(Member::model()->findAll(),'id','name'),
						'value' => '$data->getNames($data->id,2,0)',
						// 'value'=>'$data->getMemberName()',

						'htmlOptions' => array (
								"width" => "500px"
						)
				),

				array (
						'name' => 'leave_type_id',
						'value' => 'LeaveType::model()->findByPk($data->leave_type_id)->value',
						'htmlOptions' => array (
								"width" => "200px"
						) ,
						'filter'=>CHtml::listData(LeaveType::model()->findAll(),'id','value'),
				),
				array(
						'name'=>'date_start',
						'filter'=>$this->widget(
								'ext.jui.EJuiDateTimePicker',
								array(
										'model'     => $model,
										'attribute' => 'date_start',
										//'language'=> 'th',//default Yii::app()->language
										'mode'    => 'date',
										//'i18nScriptFile' => 'jquery-ui-timepicker-th.js',
										'htmlOptions'=>array(
												'id' => 'datepicker_for_date_start',
												'size' => '10',),
										'options'   => array(
												'dateFormat' => 'yy-mm-dd',
												'showOn' => 'focus',
												'showOtherMonths' => true,
												'selectOtherMonths' => true,
												'changeMonth' => true,
												'changeYear' => true,
												'showButtonPanel' => true,
										),
								),
								true
						),
						'value'=>'convertDateTime($data->date_start)',
						'htmlOptions'=>array("width"=>"120px"),
				),
				array(
						'name'=>'date_end',
						'filter'=>$this->widget(
								'ext.jui.EJuiDateTimePicker',
								array(
										'model'     => $model,
										'attribute' => 'date_end',
										//'language'=> 'th',//default Yii::app()->language
										'mode'    => 'date',
										//'i18nScriptFile' => 'jquery-ui-timepicker-th.js',
										'htmlOptions'=>array(
												'id' => 'datepicker_for_date_end',
												'size' => '10',),
										'options'   => array(
												'dateFormat' => 'yy-mm-dd',
												'showOn' => 'focus',
												'showOtherMonths' => true,
												'selectOtherMonths' => true,
												'changeMonth' => true,
												'changeYear' => true,
												'showButtonPanel' => true,
										),
								),
								true
						),
						'value'=>'convertDateTime($data->date_end)',
						'htmlOptions'=>array("width"=>"120px"),
				),
				array (
						'name' => 'leave_service_number',
						'htmlOptions'=>array("width"=>"200px"),
						//'value' => 'LeaveType::model()->findByPk($data->leave_type_id)->value',
						'value' => '$data->leave_service_id==0?"":(LeaveService::model()->findByPk($data->leave_service_id)->number)',//LeaveService::model()->findByPk()->id',
				),
				array (
						'name' => 'leave_service_header',
						'value' => '$data->leave_service_id==0?"":(LeaveService::model()->findByPk($data->leave_service_id)->header)',
						'htmlOptions' => array (
								"width" => "200px"
						) ,
				),

				array (
						'class' => 'CButtonColumn'
				)
		)
));

Yii::app()->clientScript->registerScript('re-install-date-picker', "
		function reinstallDatePicker(id, data) {
		$('#datepicker_for_date_start').datepicker({'dateFormat': 'yy-mm-dd'});
		$('#datepicker_for_date_end').datepicker({'dateFormat': 'yy-mm-dd'});
}
		");



?>
