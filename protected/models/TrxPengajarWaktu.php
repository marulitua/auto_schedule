<?php

/**
 * This is the model class for table "trx_pengajar_waktu".
 *
 * The followings are the available columns in table 'trx_pengajar_waktu':
 * @property integer $id
 * @property integer $pengajar_id
 * @property integer $hari_id
 * @property integer $start
 * @property integer $end
 *
 * The followings are the available model relations:
 * @property TrxPengajar $pengajar
 * @property Hari $hari
 */
class TrxPengajarWaktu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trx_pengajar_waktu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pengajar_id, hari_id, start, end', 'required'),
			array('pengajar_id, hari_id, start, end', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pengajar_id, hari_id, start, end', 'safe', 'on'=>'search'),
                        
                        //validation composite 
                        array('*', 'compositeUniqueKeysValidator'),
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
			'pengajar' => array(self::BELONGS_TO, 'TrxPengajar', 'pengajar_id'),
			'hari' => array(self::BELONGS_TO, 'Hari', 'hari_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pengajar_id' => 'Pengajar',
			'hari_id' => 'Hari',
			'start' => 'Start',
			'end' => 'End',
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
		$criteria->compare('pengajar_id',$this->pengajar_id);
		$criteria->compare('hari_id',$this->hari_id);
		$criteria->compare('start',$this->start);
		$criteria->compare('end',$this->end);
                $criteria->join = "left join trx_pengajar p on p.id = pengajar_id";
                $criteria->addCondition('p.periode_id = '.penjadwalan::activePeriode()->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                            'pageSize' => 20
                        )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrxPengajarWaktu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function toAdd(){
            
            $data = Yii::app()->db->createCommand(
                    "select t.id, d.full_name "
                    . "from trx_pengajar t "
                    . "left join dosen d on d.id = t.dosen_id "
                    . "where t.periode_id = ".penjadwalan::activePeriode()->id
                    )->queryAll();
            
            $in = array();
            
            foreach ($data as $key) {
                $in[$key['id']] = $key['full_name'];
            }
            
            return array("" => "") + $in;
        }
        
        public function behaviors() {
            return array(
                'ECompositeUniqueKeyValidatable' => array(
                    'class' => 'ECompositeUniqueKeyValidatable',
                    'uniqueKeys' => array(
                        'attributes' => 'pengajar_id, hari_id',
                        'errorMessage' => 'Waktu pengajar sudah dialokasikan',
                        'skipOnErrorIn' => 'pengajar_id, hari_id',
                        'errorAttributes' => 'hari_id',
                    )
                ),
            );
        }
        
        public function compositeUniqueKeysValidator() {
            $this->validateCompositeUniqueKeys();
        }
        
        public function waktu(){
            return $this->start.":00 - ".$this->end.":00";
        }
}
