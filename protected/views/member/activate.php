<?php 
$cond = "";
$privilege = Yii::app()->user->getPrivilege();
if ( $privilege === "administrator") $search = "";
elseif ( $privilege === "teacher"){
	$search = array();
	$cond = "value != 'administrator' ";
	foreach ( Privilege::model()->findAll("value != 'administrator' ") as $p){
		$search[] = $p->id;
	}
}

$cs = Yii::app()->getClientScript();

$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'เพิ่มสมาชิก',
	'items'=>array(
		array('label'=>'กรอกข้อมูล','url'=>array('create')),
			array('label'=>'เป็นไฟล์','url'=>array('upfile')),
	),
),
array('label'=>'จัดการสมาชิก','url'=>array('admin')),
);

$cs->registerCss('css',"
	.items th,.items th a {
			background-color:#00F;
			color:#fff;
		}
");

$cs->registerScript('activate', "

		
	$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('member-grid', {
	data: $(this).serialize()
	});
	return false;
	});

", CClientScript::POS_END);

?>

<div class="hero-unit">
	<h2>ยืนยันสมาชิก</h2>
	<!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'member-grid',
'type'=>'striped bordered condensed',
'dataProvider'=>$model->search($search,"activated"),
		
'filter'=>$model,
'columns'=>array(
		array(
			'id'=>'id',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '50', 
			'htmlOptions'=>array('width'=>5),
		),
		array('header'=>'No.',
				'value'=>'++$row',//'++$row',
				'htmlOptions'=>array('style'=>'width:20px;'),
		),
		array(
				'name'=>'username',
				'htmlOptions'=>array('style'=>'width:120px;'),
		),
		array(
				'name'=>'prefix_id',
				'value'=> ' Prefix::model()->findByPk($data->prefix_id)->valueTh',
				'filter'=>CHtml::listData(Prefix::model()->findAll(),'id','valueTh'),
				'htmlOptions'=>array('style'=>'width:60px;'),
		),
		
		array(
				'name'=>'name',
				//'htmlOptions'=>array('style'=>'width:120px;'),
		),
		array(
				'name'=>'surname',
				//'htmlOptions'=>array('style'=>'width:120px;'),
		),
		//'academic_rank_id',
		array(
		'name'=>'privilege_id',
		'value'=> ' Privilege::model()->findByPk($data->privilege_id)->value',
		'filter'=>CHtml::listData(Privilege::model()->findAll($cond),'id','value'),
		'htmlOptions'=>array('style'=>'width:60px;') 
		),
				// 'phd',
		array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{add}',
            'buttons'=>array
            (
                'add' => array
                (
                    'label'=>'ON',
                    'icon'=>'ok',
                     'click'=>"function(){
                                    $.fn.yiiGridView.update('member-grid', {
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        
                                    });
                                    return false;
                              }
                     ", 
            		'url'=>'Yii::app()->controller->createUrl("activate",array("id"=>$data->primaryKey))',
                    'options'=>array(
                        'class'=>'btn btn-small',
                    ),
                ),
			),
		),				
),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			//'icon'=>'ok',
			'type'=>'primary',
			'label'=> 'ยืนยันทั้งหมด',
			'htmlOptions'=>array( 
				'onclick'=>"
					var selectionIds=$('#member-grid').yiiGridView('getChecked', 'id') ;
					if (selectionIds.length!==0) {
					
					$.ajax( {
                                        type:'POST',
                                        url:'activate',
										data: {id: selectionIds},
                                        success:function(data) { 	
                                             $.fn.yiiGridView.update('member-grid');
                                        }
                                    });
		       		}
				
				
					"
			),
		)); 

?>
		
</div>