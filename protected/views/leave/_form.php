<style>
input[type="submit"]{
	margin-top:20px;
}
input[type="submit"].b1{
background-color: #00F;
margin-top:200px;
}

input[type="submit"].b1top{
background-color: #00F;
margin-top:20px;
}
</style>
<?php
/* @var $this LeaveController */
/* @var $model Leave */
/* @var $form CActiveForm */
$cs = Yii::app ()->getClientScript ();
$cs->registerScriptFile ( Yii::app ()->baseUrl . '/js/multiselect.js' );

$members = array();
$i= 0;
foreach( $model->member as $m){
	$members[$i++] =$m->id;
}
$data_select = array();

$po1 = Position::model ()->find ( 'valueTh=:v1 ', array (
		':v1' => 'อาจารย์' 
) );
$po2 = Position::model ()->find ( 'valueTh=:v1 ', array (
		':v1' => 'ผู้บริหาร' 
) );

if (! empty ( $po1->id ) || ! empty($po2->id)) {
	$list_off = Member::model ()->findAll ( 'position_id !=:v1 AND position_id!=:v2 ', array (
			':v1' => $po1->id,
			':v2' => $po2->id 
	) );
	$list_lec = Member::model ()->findAll ( 'position_id=:v1 OR position_id=:v2 ', array (
			':v1' => $po1->id,
			':v2' => $po2->id 
	) );
} else {
	$list_lec = array ();
	$list_off = array ();
}
$data_lec = array ();
$data_lecAll = array ();

for($i = 0; $i < sizeof ( $list_lec ); $i ++) {
	
		$prefix = Prefix::model ()->find ( 'id=:id', array (
				':id' => $list_lec [$i]->prefix_id 
		) );
		$academic = AcademicRank::model ()->find ( 'id=:id', array (
				':id' => $list_lec [$i]->academic_rank_id 
		) );

		$phd = @($list_lec [$i]->graduate[0]->graduatelevel->valueTh=="ปริญญาเอก")?" ดร. ":"";
		$txt = ($academic) ? $academic->valueTh . $phd : empty($phd)?$prefix->valueTh:$phd;
		
		if ( in_array($list_lec[$i]->id, $members) ){
			$data_select [intval ( $list_lec [$i]->id )]  = $txt . $list_lec [$i]->name . " " . $list_lec [$i]->surname;
			$data_lecAll [intval ( $list_lec [$i]->id )] = $txt . $list_lec [$i]->name . " " . $list_lec [$i]->surname;
		}else{
			$data_lec [intval ( $list_lec [$i]->id )] = $txt . $list_lec [$i]->name . " " . $list_lec [$i]->surname;
			$data_lecAll [intval ( $list_lec [$i]->id )] = $txt . $list_lec [$i]->name . " " . $list_lec [$i]->surname;
			$id_lec [$i] = $list_lec [$i]->id;
		}
}

$data_off = array ();
$data_offAll = array ();

for($i = 0; $i < sizeof ( $list_off ); $i ++) {
	$prefix = Prefix::model ()->find ( 'id=:id', array (
			':id' => $list_off [$i]->prefix_id 
	) );
	$academic = AcademicRank::model ()->find ( 'id=:id', array (
			':id' => $list_off [$i]->academic_rank_id 
	) );
	if ( in_array($list_off[$i]->id, $members) ){
		$data_select [intval ( $list_off [$i]->id )]  = $prefix->valueTh . $list_off [$i]->name . " " . $list_off [$i]->surname;
		$data_offAll [intval ( $list_off [$i]->id )]  = $prefix->valueTh . $list_off [$i]->name . " " . $list_off [$i]->surname;
	}else{
		$data_off [intval ( $list_off [$i]->id )] = $prefix->valueTh . $list_off [$i]->name . " " . $list_off [$i]->surname;
		$data_offAll[intval ( $list_off [$i]->id )] = $prefix->valueTh . $list_off [$i]->name . " " . $list_off [$i]->surname;
		$id_off [$i] = $list_off [$i]->id;
	}
}

?>

<div class="form">

	<?php
	
$form = $this->beginWidget ( 'CActiveForm', array (
			'id' => 'leave-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false ,
			/*'enableAjaxValidation' => true , 
		'clientOptions' => array(
      'validateOnSubmit'=>true,
      'validateOnChange'=>true,
      'validateOnType'=>false,
         ),*/
	) );
	?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row-fluid">
		<?php // echo $form->labelEx($modelMemberHasLeave,'member_id'); ?>

		<div class="span6f">

		<div class="row span7f">
		
			<div class="span4f">
			เลือกสมาชิก(อาจารย์)
					<?php echo $form->dropDownList($modelMemberHasLeave, 'member_id',$data_lec,array('multiple'=>true,'width'=>'200px','size'=>'10','id'=>'lec','name'=>'lec')); ?>
					<?php echo $form->dropDownList($modelMemberHasLeave, 'member_id',$data_lecAll,array('name'=>'lec_hide','id'=>'lec_hide','style'=>'display:none')); ?>
				</div>

				<div class="span3f">
					<div class="row"><?php echo CHtml::submitButton('>',array('onclick'=>'return addSelect("#member_id","#lec","")')); ?></div>
					<div class="row"><?php echo CHtml::submitButton('>>>',array('onclick'=>'return multiselect("#member_id","#lec","")')); ?></div>
			</div>
		</div>

			<hr class="span7f"></hr>
			
			<div class="row span7f">
			
				<div class="span4f">
				เลือกสมาชิก(เจ้าหน้าที่)
					<?php echo $form->dropDownList($modelMemberHasLeave, 'member_id',$data_off,array('multiple'=>true,'width'=>'200px','size'=>'10','id'=>'off','name'=>'off')); ?>
					<?php echo $form->dropDownList($modelMemberHasLeave, 'member_id',$data_offAll,array('name'=>'off','id'=>'off_hide','style'=>'display:none')); ?>
				</div>

				<div class="span3f">
					<div class="row"><?php echo CHtml::submitButton('>',array('onclick'=>'return addSelect("#member_id","#off","") ')); ?></div>
					<div class="row"><?php echo CHtml::submitButton('>>>',array('onclick'=>'return multiselect("#member_id","#off","")')); ?></div>
				</div>
			</div>
		</div>

		<div class="span6f">
			<div class="row">
				<div class="span3">
				<div class="row"><?php echo CHtml::submitButton('<',array('onclick'=>'return addSelect("#lec","#member_id","#off")',"class"=>"b1")); ?></div>
				<div class="row"><?php echo CHtml::submitButton('<<<',array('onclick'=>'return multiselect("#lec","#member_id","#off")',"class"=>"b1top")); ?></div>
				</div>

				<div class="span5">
					เจ้าหน้าที่ลา<br>
				<?php echo $form->dropDownList($modelMemberHasLeave, 'member_id',$data_select,array('multiple'=>true,'width'=>'200px','size'=>'30','id'=>'member_id')); ?>
				</div>
			</div>
		</div>	

		<?php echo $form->error($modelMemberHasLeave,'member_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'leave_type_id'); ?>
		<?php echo $form->dropDownList($model, 'leave_type_id',CHtml::listData(LeaveType::model()->findAll(),'id','value'),array( 'onchange'=>' $("#Leave_leave_type_id").val()=="9"?$(".leave_service").show():$(".leave_service").hide() ' ) );//$(".leave_service").toggle() ?>
		<?php echo $form->error($model,'leave_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_start'); ?>
		<?php
		
$form->widget ( 'ext.jui.EJuiDateTimePicker',
				array(
						'model'     => $model,
						'attribute' => 'date_start',
						'mode'    => 'datetime',
						'htmlOptions'=>array(
								'id' => 'datepicker_for_date_start',
								'size' => '10',
								'value' => convertDateTime($model->date_start),
								'width'=>'120px',
						),
				) );
		// echo '<span class="add-on"><i class="icon-calendar"></i></span></div>';		?>
		<?php echo $form->error($model,'date_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_end'); ?>
		<?php
		
$form->widget ( 'ext.jui.EJuiDateTimePicker',
								array(
										'model'     => $model,
										'attribute' => 'date_end',
										'mode'    => 'datetime',
										'options' => array (
												'buttonImage' => Yii::app ()->request->baseUrl . '/images/icon/calendar.png',
												'buttonImageOnly' => true
										),
										'htmlOptions'=>array(
												'id' => 'datepicker_for_date_end',
												'size' => '10',
												'value' => convertDateTime($model->date_end),
												'width'=>'120px',
										),
		) );
		// echo '<span class="add-on"><i class="icon-calendar"></i></span></div>';		?>
		<?php echo $form->error($model,'date_end'); ?>
	</div>

	<div class="row leave_service"
		style="display: <?php echo !empty($modelService->id)?"block":"none";?>; background-color: #0EE; padding: 20px; color: #000;">
		<p>ลาปฎิบัติงาน</p>
		<div>
			<?php echo $form->labelEx($modelService,'number'); ?>
			<?php echo $form->textField($modelService,'number',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($modelService,'number'); ?>
		</div>

		<div>
			<?php echo $form->labelEx($modelService,'header'); ?>
			<?php echo $form->textField($modelService,'header',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($modelService,'header'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('onclick'=>'selectAll("#member_id")','style'=>'margin:20px auto 0px 140px;')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->
