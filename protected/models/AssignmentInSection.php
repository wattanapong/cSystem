<?php

/**
 * This is the model class for table "assignment_in_section".
 *
 * The followings are the available columns in table 'assignment_in_section':
 * @property integer $id
 * @property integer $assignment_id
 * @property integer $section
 * @property string $assignment_title
 */
class AssignmentInSection extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $assignment_name,$assignment_group;
	public function tableName()
	{
		return 'assignment_in_section';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('assignment_id, section,assignment_title', 'required', 'message'=>'{attribute} ต้องไม่เป็นค่าว่าง'),
			array('assignment_id, section', 'numerical', 'integerOnly'=>true),
			array('assignment_title', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, assignment_id, section, assignment_title', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'assignment_id' => 'ชื่อ Assignment',
			'assignment_name' => 'ชื่อ Assignment',
				'assignment_group' => 'กลุ่ม Assignment',
			'section' => 'หมู่เรียน',
			'assignment_title' => 'ชื่อที่ต้องการแสดง',
				'start' => 'เวลาเริ่มทำโจทย์',
				'end' => 'เวลาสิ้นสุดการทำโจทย์',
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
		$criteria->compare('assignment_id',$this->assignment_id);
		$criteria->compare('section',$this->section);
		$criteria->compare('assignment_title',$this->assignment_title,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('end',$this->end,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchSection()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('assignment_id',$this->assignment_id);
		$criteria->compare('section',$this->section);
		$criteria->compare('assignment_title',$this->assignment_title,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('end',$this->end,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AssignmentInSection the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
