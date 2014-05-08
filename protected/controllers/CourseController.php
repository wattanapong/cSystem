<?php

class CourseController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view','autocomplete'),
'users'=>array('*'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('create','update','ajax','admin','delete'),
'users'=>array('@'),
'expression'=>'( !Yii::app()->user->isStudent() )',
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate() {
		$model = new Course ();
		$modelCS = new Courseonsemester ();
		$modely = new Yeared ();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Course[id]'] ) && 
		isset ( $_POST ['Courseonsemester[semester_id]'] ) && 
		isset ( $_POST ['Courseonsemester[yeared_id]'] )) {
			
			$modelCS->attributes = array( $_POST ['Course[id]'],
			$_POST ['Courseonsemester[semester_id]'],
			$_POST ['Courseonsemester[yeared_id]'] );
			
			if ($modelCS->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->id ,
						'model' => $model,
						'modelCS' => $modelCS,
						'modely' => $modely
				) );
		}
		
		$this->render ( 'create', array (
				'model' => $model,
				'modelCS' => $modelCS,
				'modely' => $modely 
		) );
	}

public function actionAjax()
{
	$model=new Yeared();

	// uncomment the following code to enable ajax-based validation
	/*
	 if(isset($_POST['ajax']) && $_POST['ajax']==='person-form-edit_person-form')
	 {
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	*/


	if(isset($_POST['Yeared']))
	{
		$model->attributes=$_POST['Yeared'];
		if( $model->save() ) die("เพิ่มข้อมูลสำเร็จ");
		else die("ไม่สามารถเพิ่มปีการศึกษาได้ กรุณาลองใหม่");
	}else throw new CHttpException(404,'The requested page does not exist.');
	//$this->render('Graduate',array('model'=>$model));

}

public function actionAutocomplete()
{
	$q = strtolower($_GET["term"]);
	$return = array();
	//if(isset($_POST['Course']))
	//{
		foreach ( Course::model ()->findAll (" code LIKE '%".$q."%' ") as $c ) 
			array_push($return,array('label'=>$c->code,'id'=>$c->id,'valueTh'=>$c->valueTh,'valueEn'=>$c->valueEn));
			
		echo(json_encode($return));
	//}else throw new CHttpException(404,'The requested page does not exist.');

}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Course']))
{
$model->attributes=$_POST['Course'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('Course');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Course('search');
$modelCS=new Courseonsemester;
$modely=new Yeared;

$model->unsetAttributes();  // clear any default values
if(isset($_GET['Course']))
$model->attributes=$_GET['Course'];

$this->render('admin',array(
'model'=>$model,
		'modelCS'=>$modelCS,
		'modely'=>$modely,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Course::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='course-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}