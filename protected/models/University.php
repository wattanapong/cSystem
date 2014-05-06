<?php

/**
 * This is the model class for table "university".
 *
 * The followings are the available columns in table 'university':
 * @property integer $id
 * @property string $valueTh
 * @property string $valueEn
 * @property string $abb
 *
 * The followings are the available model relations:
 * @property Faculty[] $faculties
 */
class University extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'university';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('valueTh, valueEn', 'length', 'max'=>45),
			array('abb', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, valueTh, valueEn, abb', 'safe', 'on'=>'search'),
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
			'faculties' => array(self::HAS_MANY, 'Faculty', 'university_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'valueTh' => 'Value Th',
			'valueEn' => 'Value En',
			'abb' => 'Abb',
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
		$criteria->compare('valueTh',$this->valueTh,true);
		$criteria->compare('valueEn',$this->valueEn,true);
		$criteria->compare('abb',$this->abb,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return University the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
