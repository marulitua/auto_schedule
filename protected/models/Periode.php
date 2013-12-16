<?php

/**
 * This is the model class for table "periode".
 *
 * The followings are the available columns in table 'periode':
 * @property integer $id
 * @property string $tahun_ajar
 * @property integer $semester_id
 * @property string $create_time
 * @property string $finished_time
 *
 * The followings are the available model relations:
 * @property Semester $semester
 * @property TrxDosenMakul[] $trxDosenMakuls
 * @property TrxDosenProdi[] $trxDosenProdis
 * @property TrxJadwal[] $trxJadwals
 * @property TrxJadwalRequirement[] $trxJadwalRequirements
 * @property TrxKurikulum[] $trxKurikulums
 */
class Periode extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $periodeName; 
         
	public function tableName()
	{
		return 'periode';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tahun_ajar, semester_id, create_time', 'required'),
			array('semester_id', 'numerical', 'integerOnly'=>true),
			array('tahun_ajar', 'length', 'max'=>50),
			array('finished_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tahun_ajar, semester_id, create_time, finished_time', 'safe', 'on'=>'search'),
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
			'semester' => array(self::BELONGS_TO, 'Semester', 'semester_id'),
			'trxDosenMakuls' => array(self::HAS_MANY, 'TrxDosenMakul', 'periode'),
			'trxDosenProdis' => array(self::HAS_MANY, 'TrxDosenProdi', 'periode'),
			'trxJadwals' => array(self::HAS_MANY, 'TrxJadwal', 'periode'),
			'trxJadwalRequirements' => array(self::HAS_MANY, 'TrxJadwalRequirement', 'periode'),
			'trxKurikulums' => array(self::HAS_MANY, 'TrxKurikulum', 'periode_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tahun_ajar' => 'Tahun Ajar',
			'semester_id' => 'Semester',
			'create_time' => 'Create Time',
			'finished_time' => 'Finished Time',
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
		$criteria->compare('tahun_ajar',$this->tahun_ajar,true);
		$criteria->compare('semester_id',$this->semester_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('finished_time',$this->finished_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Periode the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getPeriodeName(){
            $name = $this->tahun_ajar;
            $name .= $this->semester_id == 1 ? " Ganjil" : " Genap";
            
            return $name;
        }
}
