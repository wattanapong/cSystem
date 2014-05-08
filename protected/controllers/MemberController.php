<?php

class MemberController extends Controller
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
'actions'=>array('view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('profile','create','update','upfile'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','activate'),
'users'=>array('@'),
'expression'=>' isset( $user ) && ( $user->getPrivilege() !== "student" ) '
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

public function actionProfile($id)
{
	$this->render('profile',array(
			'model'=>$this->loadModel($id),
	));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Member;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Member']))
{
	
	$model->attributes=$_POST['Member'];
	
if ($model->validate() ){
	$_POST['Member']['password'] = md5($_POST['Member']['password']);
	$model->attributes=$_POST['Member'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}
}

$this->render('create',array(
'model'=>$model,
));
}
public function actionUpfile() {
	$model = new Member ();
	$msg = "";
	$type = "failed";
	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);
	if (isset ( $_POST ['Member'] )) {
		
		$model->attributes = $_POST ['Member'];
		$model->memberlist = CUploadedFile::getInstance ( $model, 'memberlist' );

			if ( empty($model->memberlist) ){ 
				$msg = "กรุณาเลือกไฟล์อัพโหลด";
			}elseif (strpos($model->memberlist->getExtensionName(),'csv')=== false){
				$msg = "กรุณาเลือกไฟล์อัพโหลดเป็นประเภท CSV เท่านั้น";
			}
			else{	
				$newfname = dirname(Yii::app()->request->scriptFile)."/tmp/uploadMember.csv";
				$model->memberlist->saveAs ( $newfname );
				// redirect to success page
				$msg = $this->insertMembers($newfname);
				if (count($msg) < 1 ) {
					$msg = "เพิ่มนักเรียนเสร็จสมบูรณ์";
					$type = "completed";
				}
			}

	}
	
	$this->render ( 'upfile', array (
			'model' => $model,
			'msg'=>$msg,
			'type'=>$type,
	) );
}

private function insertMembers($file){
	
	include '../'.Yii::app()->baseUrl.'/function/myArray.php';
	
	$header = array("username","code","prefix_id","name","surname","facebook","privilege_id","major_id");
	//$academicRanks = [];
	$majors = array("วิศวกรรมคอมพิวเตอร์ ","วิศวกรรมซอฟต์แวร์","วิศวกรรมสารสนเทศและการสื่อสาร",
	"คอมพิวเตอร์ธุรกิจ","เทคโนโลยีสารสนเทศ","ภูมิสารสนเทศศาสตร์","วิทยาการคอมพิวเตอร์","เทคโนโลยีคอมพิวเตอร์เคลื่อนที่");
	
	$fp = fopen($file,'r');
	$msg = array();
	$key = array();
	if ($fp) {
		
		//read header
		if (($buffer = fgets($fp, 4096)) !== false ) {
		$line = explode(",",$buffer);
			if ( !in_array("username", $line) && !in_array("code", $line) ) 
				$msg[] = array('failed'=>"ต้องกำหนด username หรือรหัสนิสิต โดยใช้หัวข้อ csv เป็น username หรือ code ตามลำดับ");
			elseif ( !in_array("name", $line) ) $msg[] = array('failed'=>"ต้องกำหนดชื่อ โดยใช้หัวข้อ csv เป็น name");
			
			else {
				foreach($line as $l){
					$no = array_search(trim($l), $header);
					if (false === $no ) {
						$msg[] = array('failed'=>"หัวข้อ ".$l." ไม่มีในข้อกำหนด");
						break;
					}else{
						$key[] = $header[$no];
					}
				}
			}

			if (count($key) == count($line)) {
			while (($buffer = fgets($fp, 4096)) !== false) {
				
				//loop for define txt follow header with key
				$lines = explode(",",iconv('tis-620', 'UTF-8', $buffer));
				$line = mapKey( $key,$lines);

				if (isset($line['code']) ) $line['username'] = $line['code'];
				
				
				if ( isset($line['prefix_id'] ) && !is_numeric($line['prefix_id']) )  $line['prefix_id'] = 1;
				else $line['prefix_id'] = 1;
					
				if ( isset($line['privilege_id'] ) &&  $line['privilege_id'] !=2 && $line['privilege_id'] != 3 )  $line['privilege_id'] = 3;
				else $line['privilege_id'] = 3;
					
				if ( isset($line['major_id'] ) && !is_numeric($line['major_id']) )  $line['major_id'] = 1;
				else $line['major_id'] = 1;
					
				if (isset($line['name'])) $line['name'] = $line['name'];

				//0 = id , 1 = name
				if ( isset($line['name']) && Member::model()->find(" name = '".$line['name']."' AND  surname = '".@$line['surname']."' OR 
						name = '".preg_replace("/นาย|นาง|นางสาว|\s/", "", $line['name'])."' ") !== null)
					$msg[] =  array('failed'=>$line['name']." ".$line['surname']." มีอยู่แล้ว ");
				elseif ( isset($line['username']) &&  Member::model()->find(" username = '".$line['username']."' ") !== null)
				//echo "username หรือรหัสประจำตัว ".$line['username']." มีอยู่แล้ว  <br>";
				$msg[] =  array('failed'=>"username หรือรหัสประจำตัว ".$line['username']." มีอยู่แล้ว ");
				else{
					
					$member = new Member();
					$line['password'] = md5('1234');
					$member->attributes = $line;
					if ($member->save() ) $msg[] =  array('completed'=>"username ".$line['username']." สร้างสำเร็จ ");
					else $msg[] =  array('failed'=>"username ".$line['username']." ไม่สามารถสร้างได้ ");
/* 					print_r($member->getErrors());
					die(); */
				}
			}
		}
		}
		else{
			$msg[] =  array('failed'=>"กรุณาอัพโหลดไฟล์ที่มีข้อมูลตามรูปแบบที่กำหนด");
		}
	}
	return $msg;
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model = $this->loadModel ( $id );
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Member'] )) {
			
			$model->attributes = $_POST ['Member'];
			
			//if ( $model->validate() ){
				
				
				if (  !empty($_POST['Member']['password1']) ){
					$_POST['Member']['password'] = md5($_POST['Member']['password1']);
					$model->attributes = $_POST ['Member'];
				}
					if ($model->save ()){
						$this->redirect ( array (
								'view',
								'id' => $model->id
						) );
					}
				
				
			//}
			
			
		}
		
		$this->render ( 'update', array (
				'model' => $model 
		) );
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

if (Yii::app()->user->id != $id) {
// we only allow deletion via POST request
$this->loadModel($id)->delete();
}

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
$dataProvider=new CActiveDataProvider('Member');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Member('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Member']))
$model->attributes=$_GET['Member'];

$this->render('admin',array(
'model'=>$model,
));
}

public function actionActivate()
{
	$msg = "";
	$model=new Member('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['Member']))
		$model->attributes=$_GET['Member'];
	if ( isset($_GET['id'])){
		
		$member = Member::model()->findByPk($_GET['id']);
		$member->status = 1;
		$member->update();
		$msg = "ยืนยันการใช้งานสมาชิกหมายเลข ".$_GET['id']." เสร็จสิ้น ";
	}elseif ( isset($_POST['id'])){
		if( is_array($_POST['id'])){
			foreach($_POST['id'] as $id){
				$member = Member::model()->findByPk($id);
				$member->status = 1;
				$member->update();
			}
			$msg = "ยืนยันการใช้งานสมาชิกทั้งหมดเสร็จสิ้น ";
		}
	}
	$this->render('activate',array(
			'model'=>$model,
			'msg'=>$msg,
	));
/* 	else{
		Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You successfully read this important alert message.');
	} */
	
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Member::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='member-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

}
