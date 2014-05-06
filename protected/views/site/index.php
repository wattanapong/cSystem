<?php
/* @var $this SiteController */
if ( Yii::app()->user->isGuest )  $this->redirect(Yii::app()->baseUrl.'/index.php/site/login');
?>
