<?php

/**
 * This is the model class for table "assignment".
 *
 * The followings are the available columns in table 'assignment':
 * @property integer $id
 * @property string $topic
 * @property string $pdf
 * @property string $start
 * @property string $end
 * @property string $create
 * @property integer $member_has_section_id
 */
class Assignment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'assignment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_has_section_id', 'required'),
			array('member_has_section_id', 'numerical', 'integerOnly'=>true),
			array('topic, pdf', 'length', 'max'=>100),
			array('start, end, create', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, topic, pdf, start, end, create, member_has_section_id', 'safe', 'on'=>'search'),
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
			'topic' => 'หัวข้อโจทย์',
			'pdf' => 'โจทย์',
			'start' => 'เวลาเริ่มทำโจทย์',
			'end' => 'เวลาสิ้นสุดการทำโจทย์',
			'create' => 'เวลาสร้างทำโจทย์',
			'member_has_section_id' => 'Member Has Section',
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
		$criteria->compare('topic',$this->topic,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('end',$this->end,true);
		$criteria->compare('create',$this->create,true);
		$criteria->compare('member_has_section_id',$this->member_has_section_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Assignment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
