<?php

// change the following paths if necessary

// path of yii framework stay at D:/Git/yii
// this index.php stay at  D:/copy/workspace/www/cSystem/index.php
$yii=dirname(__FILE__).'/../../../../Git/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
