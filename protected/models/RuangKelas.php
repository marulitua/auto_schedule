<?php

/**
 * This is the model class for table "ruang_kelas".
 *
 * The followings are the available columns in table 'ruang_kelas':
 * @property integer $id
 * @property integer $praktek
 * @property string $number
 * @property integer $gedung_id
 * @property integer $lantai
 *
 * The followings are the available model relations:
 * @property Gedung $gedung
 * @property TrxJadwal[] $trxJadwals
 */
class RuangKelas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ruang_kelas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('praktek, number, gedung_id', 'required'),
			array('praktek, lantai', 'numerical', 'integerOnly'=>true),
			array('number', 'length', 'max'=>50),
                        array('number', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, praktek, number, gedung_id, lantai', 'safe', 'on'=>'search'),
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
			'gedung' => array(self::BELONGS_TO, 'Gedung', 'gedung_id'),
			'trxJadwals' => array(self::HAS_MANY, 'TrxJadwal', 'ruang_kelas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'praktek' => 'Teori / Praktek',
			'number' => 'Nomor Ruangan',
			'gedung_id' => 'Gedung',
			'lantai' => 'Lantai',
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
		$criteria->compare('praktek',$this->praktek);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('gedung_id',$this->gedung_id);
		$criteria->compare('lantai',$this->lantai);
                $criteria->order = 'number';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                            'pageSize' => 20,
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RuangKelas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
