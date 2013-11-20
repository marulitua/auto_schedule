<?php

/**
 * This is the model class for table "gedung".
 *
 * The followings are the available columns in table 'gedung':
 * @property integer $id
 * @property string $gedung
 * @property integer $max_lantai
 *
 * The followings are the available model relations:
 * @property RuangKelas[] $ruangKelases
 */
class Gedung extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gedung';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gedung, max_lantai', 'required'),
			array('max_lantai', 'numerical', 'integerOnly'=>true),
			array('gedung', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, gedung, max_lantai', 'safe', 'on'=>'search'),
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
			'ruangKelases' => array(self::HAS_MANY, 'RuangKelas', 'gedung_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'gedung' => 'Gedung',
			'max_lantai' => 'Max Lantai',
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
		$criteria->compare('gedung',$this->gedung,true);
		$criteria->compare('max_lantai',$this->max_lantai);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gedung the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
