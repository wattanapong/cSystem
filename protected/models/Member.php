<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $fuser
 * @property integer $prefix_id
 * @property string $name
 * @property string $surname
 * @property integer $academic_rank_id
 * @property string $date_registered
 * @property integer $status
 * @property integer $privilege_id
 * @property integer $phd
 */
class Member extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $password1,$password2,$checkList,$memberlist,$major_id,$faculty_id,$university_id,$academic_rank,$year,$gender;
	private $fullName;
	public function tableName()
	{
		return 'member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				
			array('username, password', 'required', 'on'=>'insert','message'=>' {attribute} ต้องไม่เป็นค่าว่าง'),
			array('name, surname', 'required','on'=>'update'),
			array('username,code','unique', 'attributes' => array('username', 'code'), 'message'=>' {attribute} มีอยู่แล้ว'),
			array('password1', 'compare', 'compareAttribute'=>'password2', 'on'=>'update', 'message'=>' {attribute}และ{compareAttribute}   ต้องเหมือนกัน'),
			array('prefix_id, academic_rank_id, status, privilege_id, phd,gender_id', 'numerical', 'integerOnly'=>true),
			array('username, password, name, surname', 'length', 'max'=>45),
			array('fuser', 'length', 'max'=>100),
			array('date_registered,password1,password2,memberlist,major_id,faculty_id,university_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, fuser, prefix_id, gender_id,year,name, surname,code, academic_rank_id, 
					date_registered, status, privilege_id, phd,major_id,faculty_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'prefix'=>array(self::BELONGS_TO, 'prefix', 'prefix_id'),
				'gender'=>array(self::BELONGS_TO, 'gender', 'gender_id'),
				'privilege'=>array(self::BELONGS_TO, 'privilege', 'privilege_id'),
				'major'=>array(self::BELONGS_TO,'major','major_id'),
				'faculty'=>array(self::BELONGS_TO,'faculty',array('faculty_id'=>'id'),'through'=>'major'),
				'academic_rank'=>array(self::BELONGS_TO, 'academic_rank', 'academic_rank_id'),
				'ms'=>array(self::MANY_MANY, 'section','member_has_section(member_id,section_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'ชื่อเข้าใช้',
			'password' => 'รหัสผ่าน',
				'password1' => 'รหัสผ่านใหม่',
				'password2' => 'ยืนยันรหัสผ่าน',
			'fuser' => 'เฟซบุ๊คลิงค์',
			'prefix_id' => 'คำนำหน้า',
				'gender_id'=>'เพศ',
			'name' => 'ชื่อ',
			'surname' => 'นามสกุล',
			'code'=>'รหัสนิสิต(นักศึกษา)',
				'year'=>'ชั้นปี',
			'academic_rank_id' => 'ตำแหน่งวิชาการ',
			'date_registered' => 'วันสมัครสมาชิก',
			'status' => 'สถานะสมาชิก',
			'privilege_id' => 'ประเภทสมาชิก',
			'phd' => 'Phd',
			'memberlist'=>'อัพโหลดไฟล์สมาชิก(CSV)',
			'major_id'=>'ภาควิชา(สาขาวิชา)',
			'faculty_id'=>'คณะ',
			'university_id'=>'มหาวิทยาลัย',
			'fullName'=>'ชื่อ นามสกุล',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($pid=0,$opt="")
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		$cond = "";
		if ($opt == "activated" ) $cond = " t.status = 0 ";
		if ( $pid != 0 && !is_array($pid)) $cond .= (($cond == '')?'':' AND ').'t.privilege_id = '.$pid;
		elseif( is_array($pid) ) foreach($pid as $p_id) $cond .= (($cond == '')?'':' AND ').'t.privilege_id = '.$p_id.' ';
		if (!empty($cond) ) $criteria->addCondition(array($cond));
		
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.username',$this->username,true);
		$criteria->compare('t.password',$this->password,true);
		$criteria->compare('t.fuser',$this->fuser,true);
		$criteria->compare('t.prefix_id',$this->prefix_id);
		$criteria->compare('t.gender_id',$this->gender_id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.surname',$this->surname,true);
		$criteria->compare('t.code',$this->code,true);
		if (!empty($this->year)) $criteria->compare('t.code',(Yii::app()->params['yearNow']%100+$this->year-1)."%",true,"AND",false);
		$criteria->compare('t.academic_rank_id',$this->academic_rank_id);
		$criteria->compare('t.date_registered','>='.Date2Sql( $this->date_registered ));
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.privilege_id',$this->privilege_id);
		$criteria->compare('t.phd',$this->phd);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchSelectUser($pid=0,$opt,$secid,$sec,$pagination,$members=array())
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		$criteria->with = array( 'ms' );
		$criteria->together = true;
		if ($sec) $criteria->order = ('ms_ms.id DESC');
		else  $criteria->order = ('t.id DESC');
		//$criteria->group = ('t.username');
	
		$cond = "";
		if ($opt == "hasCode" ) $cond = " t.code != '' ";
		if ( !empty($secid) ){
			if ($sec) $cond .= (($cond == '')?'':' AND ').' ms.id = '.$secid;
		}
		if ( $pid != 0 && !is_array($pid)) $cond .= (($cond == '')?'':' AND ').'ms.id = '.$pid;
		elseif( is_array($pid) ) foreach($pid as $p_id) $cond .= (($cond == '')?'':' AND ').'t.privilege_id = '.$p_id.' ';
		if (!empty($cond) ){
			if ( count($members)>0 ) $criteria->addNotInCondition('t.id',$members);
			$criteria->addCondition(array($cond));
		}
	
		$criteria->compare('t.username',$this->username,true);
		$criteria->compare('t.gender_id',$this->gender_id);
		if (!empty($this->year)) $criteria->compare('t.code',((Yii::app()->params['yearNow']) % 100 - $this->year +1)."%",true,"AND",false);
		/*$criteria->compare('t.code',$this->code,true);
		$criteria->compare('t.academic_rank_id',$this->academic_rank_id);
		$criteria->compare('t.phd',$this->phd);*/
	
		$criteria2=new CDbCriteria;
		$criteria2->compare('t.name',$this->name,true);
		$criteria2->compare('t.surname',$this->name,true,'OR');
		
		
		$criteria->mergeWith($criteria2, 'AND');
		
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				 'pagination'=>$pagination,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Member the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getFullName(){
		$pre = '';

		 if ( Yii::app()->user->getPrivilegeId('teacher') == $this->privilege_id ){
		$pre = (isset($this->academic_rank->valueTh)?$this->academic_rank->valueTh:"").$this->phd?"ดร.":"";
		$pre = empty($pre)?$this->prefix->valueTh:$pre;
			return $this->name.' '.$this->surname;
		}elseif ( Yii::app()->user->getPrivilegeId('student') == $this->privilege_id){
		//$pre = $this->code."  ";//.$this->prefix->valueTh;
			return $this->name.' '.$this->surname;
		}  
		 
	}
	
}
