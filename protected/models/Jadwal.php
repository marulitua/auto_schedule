<?php

/**
 * This is the model class for table "jadwal".
 *
 * The followings are the available columns in table 'jadwal':
 * @property integer $id
 * @property integer $periode_id
 * @property integer $mata_kuliah_id
 * @property integer $dosen_id
 * @property integer $ruang_kelas_id
 * @property integer $jam_mulai
 * @property integer $jam_selesai
 *
 * The followings are the available model relations:
 * @property Dosen $dosen
 * @property MataKuliah $mataKuliah
 * @property Periode $periode
 * @property RuangKelas $ruangKelas
 */
class Jadwal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jadwal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('periode_id, mata_kuliah_id, dosen_id, ruang_kelas_id, jam_mulai, jam_selesai', 'required'),
			array('periode_id, mata_kuliah_id, dosen_id, ruang_kelas_id, jam_mulai, jam_selesai', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, periode_id, mata_kuliah_id, dosen_id, ruang_kelas_id, jam_mulai, jam_selesai', 'safe', 'on'=>'search'),
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
			'dosen' => array(self::BELONGS_TO, 'Dosen', 'dosen_id'),
			'mataKuliah' => array(self::BELONGS_TO, 'MataKuliah', 'mata_kuliah_id'),
			'periode' => array(self::BELONGS_TO, 'Periode', 'periode_id'),
			'ruangKelas' => array(self::BELONGS_TO, 'RuangKelas', 'ruang_kelas_id'),
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
			'dosen_id' => 'Dosen',
			'ruang_kelas_id' => 'Ruang Kelas',
			'jam_mulai' => 'Jam Mulai',
			'jam_selesai' => 'Jam Selesai',
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
		$criteria->compare('periode_id',  penjadwalan::activePeriode()->id);
		$criteria->compare('mata_kuliah_id',$this->mata_kuliah_id);
		$criteria->compare('dosen_id',$this->dosen_id);
		$criteria->compare('ruang_kelas_id',$this->ruang_kelas_id);
		$criteria->compare('jam_mulai',$this->jam_mulai);
		$criteria->compare('jam_selesai',$this->jam_selesai);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                            'pageSize' => 20,
                        )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jadwal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
