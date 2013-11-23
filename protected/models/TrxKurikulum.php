<?php

/**
 * This is the model class for table "trx_kurikulum".
 *
 * The followings are the available columns in table 'trx_kurikulum':
 * @property integer $id
 * @property integer $periode_id
 * @property integer $mata_kuliah_id
 * @property integer $jumlah_kelas
 *
 * The followings are the available model relations:
 * @property MataKuliah $mataKuliah
 * @property Periode $periode
 */
class TrxKurikulum extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trx_kurikulum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('periode_id, mata_kuliah_id, jumlah_kelas', 'required'),
			array('periode_id, mata_kuliah_id, jumlah_kelas', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, periode_id, mata_kuliah_id, jumlah_kelas', 'safe', 'on'=>'search'),
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
			'mataKuliah' => array(self::BELONGS_TO, 'MataKuliah', 'mata_kuliah_id'),
			'periode' => array(self::BELONGS_TO, 'Periode', 'periode_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'periode_id' => 'Periode',
			'mata_kuliah_id' => 'Mata Kuliah',
			'jumlah_kelas' => 'Jumlah Kelas',
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
		$criteria->compare('periode_id',$this->periode_id);
		$criteria->compare('mata_kuliah_id',$this->mata_kuliah_id);
		$criteria->compare('jumlah_kelas',$this->jumlah_kelas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrxKurikulum the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
