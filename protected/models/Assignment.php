<?php

/**
 * This is the model class for table "assignment".
 *
 * The followings are the available columns in table 'assignment':
 * @property integer $id
 * @property string $topic
 * @property string $pdf
 * @property integer $category_id
 * @property string $created
 */
class Assignment extends CActiveRecord
{
	
	public $pdfFile;
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
			array('topic,category_id','required','message'=>' ต้องกำหนด {attribute} ด้วย'),
			//array('topic, category_id', 'required','on'=>'update','message'=>' ต้องกำหนด {attribute} ด้วย'),
			//array('pdf','file','types'=>'pdf','message'=>' {attribute} ต้องเป็นประเภท pdf เท่านั้น'),
				array('pdfFile', 'file','on'=>'insert',
						'allowEmpty' => false,
						'types'=> 'pdf',
						'maxSize' => 1024 * 1024 * 10, // 10MB
						'tooLarge' => '{attribute} ต้องเป็นประเภท pdf ขนาดไม่เกิน 10MB เท่านั้น',
				),
				array('pdfFile', 'file','on'=>'update',
						'allowEmpty' => true,
						'types'=> 'pdf',
						'maxSize' => 1024 * 1024 * 10, // 10MB
						'tooLarge' => '{attribute} ต้องเป็นประเภท pdf ขนาดไม่เกิน 10MB เท่านั้น',
				),
			array('topic','unique', 'attributes' => array('topic'), 'message'=>' {attribute} มีอยู่แล้ว'),
			array('topic', 'length', 'max'=>100),
			array('created,pdf', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, topic, pdf, start, end, created,category_id', 'safe', 'on'=>'search'),
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
				'category'=>array(self::BELONGS_TO, 'category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'topic' => 'ชื่อโจทย์',
			'pdf' => 'อัพโหลดโจทย์',
			'pdfFile' => 'อัพโหลดโจทย์',	
			'category_id'=>'กลุ่มโจทย์',
			'created'=>'วันที่สร้าง',
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
		//$criteria->order = ' id desc';
		
		$criteria->compare('id',$this->id);
		$criteria->compare('topic',$this->topic,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('category_id',$this->category_id);
		//$criteria->compare('created',DateTime2Sql($this->created),true);

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
