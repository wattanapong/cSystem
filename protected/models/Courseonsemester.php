<?php

/**
 * This is the model class for table "courseonsemester".
 *
 * The followings are the available columns in table 'courseonsemester':
 * @property integer $id
 * @property integer $course_id
 * @property integer $semester_id
 * @property integer $yeared_id
 */
class Courseonsemester extends CActiveRecord
{
	public $section;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'courseonsemester';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, semester_id, yeared_id', 'required'),
			array('course_id, semester_id,yeared_id', 'ECompositeUniqueValidator',
					'attributesToAddError'=>'course_id',
					'message'=>'{attr_course_id} '.
					'{attr_semester_id} '.
					'{attr_yeared_id}  มีอยู่แล้ว'),
				
			array('course_id, semester_id, yeared_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, course_id, semester_id, yeared_id', 'safe', 'on'=>'search'),
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
				'course'=>array(self::BELONGS_TO, 'course', 'course_id'),
				'semester'=>array(self::BELONGS_TO, 'semester', 'semester_id'),
				'yeared'=>array(self::BELONGS_TO, 'yeared', 'yeared_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'course_id' => 'วิชา',
			'course' => 'วิชา',
			'semester_id' => 'ภาคการศึกษา',
			'yeared_id' => 'ปีการศึกษา(พ.ศ.)',
			'section'=>'หมู่เรียน',
			'adddelsection'=>'เพิ่ม ลบ หมู่เรียน'
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
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('semester_id',$this->semester_id);
		$criteria->compare('yeared_id',$this->yeared_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Courseonsemester the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
