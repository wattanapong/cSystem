<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property integer $id
 * @property string $code
 * @property string $valueTh
 * @property string $valueEn
 * @property integer $semester_id
 */
class Course extends CActiveRecord
{
	public $yeared_id,$semester_id;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code,valueTh,valueEn', 'required'),
			//array('yearEd_id', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>10),
			array('code,valueTh,valueEn', 'filter', 'filter'=>'trim'),
			array('code', 'ECompositeUniqueValidator',
					'attributesToAddError'=>'code',
					'message'=>' {value_code}  มีอยู่แล้ว'),
			array('code','unique', 'attributes' => array('code'), 'message'=>' {attribute} มีอยู่แล้ว'),
			array('valueTh, valueEn', 'length', 'max'=>70),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, valueTh, valueEn', 'safe', 'on'=>'search'),
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
				'courseonsemester'=>array(self::HAS_MANY, 'courseonsemester', 'course_id'),
				'semester'=>array(self::HAS_MANY, 'semester',array('semester_id'=>'id'),'through'=> 'courseonsemester'),
				'yeared'=>array(self::HAS_MANY, 'yeared',array('yeared_id'=>'id'),'through'=> 'courseonsemester'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'รหัสวิชา',
			'valueTh' => 'ชื่อคอร์สภาษาไทย',
			'valueEn' => 'ชื่อคอร์สภาษาอังกฤษ',
			'yeared_id'=>'ปีการศึกษา',
			'semester_id'=>'ภาคการศึกษา',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('valueTh',$this->valueTh,true);
		$criteria->compare('valueEn',$this->valueEn,true);
		//$criteria->compare('semester_id',$this->semester_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Course the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
