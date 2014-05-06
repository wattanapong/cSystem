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
	public $password1,$password2,$checkList,$memberlist,$major_id,$faculty_id,$university_id;
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
			array('prefix_id, academic_rank_id, status, privilege_id, phd', 'numerical', 'integerOnly'=>true),
			array('username, password, name, surname', 'length', 'max'=>45),
			array('fuser', 'length', 'max'=>100),
			array('date_registered,password1,password2,memberlist,major_id,faculty_id,university_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, fuser, prefix_id, name, surname,code, academic_rank_id, date_registered, status, privilege_id, phd,major_id,faculty_id', 'safe', 'on'=>'search'),
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
				'privilege'=>array(self::BELONGS_TO, 'privilege', 'privilege_id'),
				'major'=>array(self::BELONGS_TO,'major','major_id'),
				'faculty'=>array(self::BELONGS_TO,'faculty',array('faculty_id'=>'id'),'through'=>'major'),
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
			'name' => 'ชื่อ',
			'surname' => 'นามสกุล',
			'code'=>'รหัสนิสิต(นักศึกษา)',
			'academic_rank_id' => 'ตำแหน่งวิชาการ',
			'date_registered' => 'วันสมัครสมาชิก',
			'status' => 'สถานะสมาชิก',
			'privilege_id' => 'ประเภทสมาชิก',
			'phd' => 'Phd',
			'memberlist'=>'อัพโหลดไฟล์สมาชิก(CSV)',
			'major_id'=>'ภาควิชา(สาขาวิชา)',
			'faculty_id'=>'คณะ',
			'university_id'=>'มหาวิทยาลัย',
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
		$criteria->addCondition(array($cond));
		
		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('fuser',$this->fuser,true);
		$criteria->compare('prefix_id',$this->prefix_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('academic_rank_id',$this->academic_rank_id);
		$criteria->compare('t.date_registered','>='.Date2Sql( $this->date_registered ));
		$criteria->compare('status',$this->status);
		$criteria->compare('privilege_id',$this->privilege_id);
		$criteria->compare('phd',$this->phd);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
	
}
