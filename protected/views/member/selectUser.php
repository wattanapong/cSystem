<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button'.$pid.($sec?"s":"").' btn','style'=>'font-size:0.8em;margin:10 0 30 auto;')); ?>
	<div class="search-form<?php echo $pid.($sec?"s":"");?>" style="display:none">
	<?php $this->renderPartial('/member/_searchSelectUser',array(
	'model'=>$model,'pid'=>$pid,'pname'=>$pname,
)); ?>
	</div>
	<div><?php if (isset($msg)) echo $msg;?></div>
<?php 
$_id = $pid.($sec?'s':'');
$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'member-grid'.$_id,
'type'=>'striped bordered condensed',
'dataProvider'=>$searchResult,
		
'filter'=>$model,
'columns'=>array(
		array(
			'id'=>'id'.$_id,
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '50', 
			'htmlOptions'=>array('width'=>5),
		),
		array('header'=>'No.',
				'value'=>'++$row',//'++$row',
				'htmlOptions'=>array('width'=>5),
		),
		 array(
				'name'=>'username',
				'htmlOptions'=>array('width'=>20),
		 		'type'=>'text',
		 		//'visible'=>!in_array('$data->id',$members[$pid]),
		),
		array(
				'name'=>'name',
				'value'=>'$data->fullName',
				'htmlOptions'=>array('width'=>50),
				'type'=>'text',
		),
),
)); ?>

<?php 

$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			//'icon'=>'ok',
			'type'=>'primary',
			'label'=> !$sec?'เพิ่ม':'ลบ',
			'htmlOptions'=>array( 
				'onclick'=>"
					var selectionIds=$('#member-grid".$_id."').yiiGridView('getChecked', 'id".$_id."') ;
					if (selectionIds.length!==0) {
					
					$.ajax( {
                                        type:'POST',
                                        url:'".Yii::app()->createUrl('/member/selectUser')."',
										data: {mid: selectionIds,sid:".$secid.",opt:'".(!$sec?'add':'del')."'},
                                        success:function(data) { 	
											alert(data);
                                             $.fn.yiiGridView.update('member-grid".$pid."s');
											  $.fn.yiiGridView.update('member-grid".$pid."');
                                        }
                                    });
		       		}
				
				
					"
			),
		)); 
?>