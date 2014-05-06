<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="hero-unit text-center" style="width:500px; margin:0 auto">

<h2>Login</h2>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'login-form',
	'type'=>'horizontal',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
				'validateOnSubmit'=>true,
		),
	'htmlOptions'=>array('style'=>'width:400px;','class'=>'myform'),
)); ?>
<fieldset>
	<?php echo $form->textFieldRow($model,'username',array('maxlength'=>45)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('maxlength'=>45)); ?>
	
	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'login')); ?>
</fieldset>
<?php $this->endWidget(); ?>
</div>
