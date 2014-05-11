<?php 
$cs = Yii::app()->getClientScript();
$cs->registerCss('css',"
	.items th,.items th a {
			background-color:#00F;
			color:#fff;
		}
");

$cs->registerScript('search', "
 
	$('.search-button2').click(function(){
	$('.search-form2' ).toggle();
	return false;
	}); 
		
	$('.search-form2 form').submit(function(){
		$.fn.yiiGridView.update('member-grid2', {
			data: $(this).serialize()
		});
		return false;
	});
		
	$('.search-button3').click(function(){
	$('.search-form3' ).toggle();
	return false;
	}); 
		
	$('.search-form3 form').submit(function(){
		$.fn.yiiGridView.update('member-grid3', {
			data: $(this).serialize()
		});
		return false;
	});
		
		$('.search-button2s').click(function(){
	$('.search-form2s' ).toggle();
	return false;
	}); 
		
	$('.search-form2s form').submit(function(){
		$.fn.yiiGridView.update('member-grid2s', {
			data: $(this).serialize()
		});
		return false;
	});
		
	$('.search-button3s').click(function(){
	$('.search-form3s' ).toggle();
	return false;
	}); 
		
	$('.search-form3s form').submit(function(){
		$.fn.yiiGridView.update('member-grid3s', {
			data: $(this).serialize()
		});
		return false;
	});

", CClientScript::POS_END);

?>
<?php
/* @var $this SectionController */
/* @var $model Section */

$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Section', 'url'=>array('index')),
	array('label'=>'Create Section', 'url'=>array('create')),
	array('label'=>'Update Section', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Section', 'url'=>'#', 'linkOptions'=>
			array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Section', 'url'=>array('admin')),
);
?>

<h1>หมู่เรียนที่ #<?php echo $model->value; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'type'=>'striped bordered condensed',
	'attributes'=>array(
		array('name'=>'courseon',
				'value'=>$model->course->code."<br>".$model->course->valueTh."<br>".$model->course->valueEn,
				'type'=>'raw',
		),
			array('name'=>'courseonSemester_id',
					'value'=>$model->semester->value,
			),
			array('name'=>'courseonYeared_id',
					'value'=>$model->yeared->value,
			),
	),
)); ?>

<hr></hr>

<div class="row-fluid">
	<div class="well bs-layout span6">
			<span class="bs-layout-header">อาจารย์ผู้สอน</span>
			<?php 
			$pid1 = Yii::app()->user->getPrivilegeId('teacher');
			
			$searchResult = $modelM->searchSelectUser(array($pid1),"",$model->id,true,false);

				$members[$pid1] = array();
				foreach($searchResult->data as $s){
					$members[$pid1][] = $s->id;
				}

				$searchResult = $modelM->searchSelectUser(array($pid1),"",$model->id,true,array('pageSize'=>10));
			$this->renderPartial('/member/selectUser',
					 array('model'=> $modelM ,'pid'=>$pid1,
					 		'secid'=>$model->id,'sec'=>true,'searchResult'=>$searchResult)); 
			?>
	</div>
	
	<div class="well bs-layout span6">		
			<span class="bs-layout-header">นิสิตที่ลงทะเบียน</span>
			<?php 
			$pid2 = Yii::app()->user->getPrivilegeId('student');
			
			$searchResult = $modelM->searchSelectUser(array($pid2),"",$model->id,true,false);
			
			$members[$pid2] = array();
			foreach($searchResult->data as $s){
				$members[$pid2][] = $s->id;
			}
			$searchResult = $modelM->searchSelectUser(array($pid2),"",$model->id,true,array('pageSize'=>10));
			$this->renderPartial('/member/selectUser',
					 array('model'=> $modelM ,'pid'=>$pid2,
					 		'opt'=>'hasCode','secid'=>$model->id,'sec'=>true,
					 		'searchResult'=>$searchResult)); 
			;
			?>
	</div>
</div>

<div class="row-fluid">
	<div class="well bs-layout span6">
			<span class="bs-layout-header">อาจารย์ทั้งหมด</span>
			<?php 
			$searchResult = $modelM->searchSelectUser(array($pid1),"",
					$model->id,false,array('pageSize'=>10),$members[$pid1]);
			$this->renderPartial('/member/selectUser',
					 array('model'=> $modelM ,'pid'=>$pid1 ,
					 		'secid'=>$model->id,'sec'=>false,'members'=>$members[$pid1],
					 		'searchResult'=>$searchResult)); 
			?>
	</div>
	
	<div class="well bs-layout span6">		
			<span class="bs-layout-header">นิสิตทั้งหมด</span>
			<?php 
			$searchResult = $modelM->searchSelectUser(array($pid2),"hasCode",
					$model->id,false,array('pageSize'=>10),$members[$pid2]);
			$this->renderPartial('/member/selectUser',
					 array('model'=> $modelM ,'pid'=>$pid2,
					 		'opt'=>'hasCode','secid'=>$model->id,'sec'=>false,'members'=>$members[$pid2],
					 		'searchResult'=>$searchResult )); 
			?>
	</div>
</div>
