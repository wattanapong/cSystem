<?php

/**
 * This is the model class for table "section".
 *
 * The followings are the available columns in table 'section':
 * @property integer $id
 * @property integer $value
 * @property integer $course_id
 */
class Section extends CActiveRecord
{
	public $courseon,$courseonSemester_id,$courseonYeared_id,$teacher,$student,$empty;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'section';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('value,courseonSemester_id', 'required'),
			array('value, courseonSemester_id', 'ECompositeUniqueValidator',
					'attributesToAddError'=>'value',
					'message'=>'{attr_value} {value_value}'.
					'ในภาคการศึกษานี้มีอยู่แล้ว'),
			array('value, courseonSemester_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, value, courseonSemester_id', 'safe', 'on'=>'search'),
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
				'courseonsemester'=>array(self::BELONGS_TO, 'courseonsemester', 'courseonSemester_id'),
				'course'=>array(self::BELONGS_TO,'course',array('course_id'=>'id'),'through'=>'courseonsemester'),
				'semester'=>array(self::BELONGS_TO,'semester',array('semester_id'=>'id'),'through'=>'courseonsemester'),
				'yeared'=>array(self::BELONGS_TO,'yeared',array('yeared_id'=>'id'),'through'=>'courseonsemester'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'value' => 'หมู่เรียนที่',
			'courseon'=>'รายวิชา',
			'courseonSemester_id' => 'ภาคการศึกษา',
			'courseonYeared_id'=>'ปีการศึกษา',
			'teacher'=>'ผู้สอนทั้งหมด',
			'student'=>'นักเรียนทั้งหมด',
			'empty'=>'',
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
		$criteria->compare('value',$this->value);
		$criteria->compare('course_id',$this->course_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Section the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
