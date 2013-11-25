<?php

/**
 * This is the model class for table "trx_pengajar".
 *
 * The followings are the available columns in table 'trx_pengajar':
 * @property integer $id
 * @property integer $periode_id
 * @property integer $dosen_id
 *
 * The followings are the available model relations:
 * @property Periode $periode
 * @property Dosen $dosen
 */
class TrxPengajar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trx_pengajar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('periode_id, dosen_id', 'required'),
			array('periode_id, dosen_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, periode_id, dosen_id', 'safe', 'on'=>'search'),
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
			'periode' => array(self::BELONGS_TO, 'Periode', 'periode_id'),
			'dosen' => array(self::BELONGS_TO, 'Dosen', 'dosen_id'),
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
			'dosen_id' => 'Dosen',
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
		$criteria->compare('dosen_id',$this->dosen_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                            'pageSize' => '20'
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrxPengajar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function toAdd($param = false){
            
            $data = Yii::app()->db->createCommand("
                    select d.id, d.full_name
                    from dosen d
                    left join trx_pengajar t on t.dosen_id = d.id
                    where d.id not in (
                            select t.dosen_id 
                            from trx_pengajar t 
                            where t.periode_id = ".penjadwalan::activePeriode()->id."
                    )")->queryAll();
            
            $in = array();
            
            foreach ($data as $key) {
                $in[$key['id']] = $key['full_name'];
            }
            
            if($param != false)
                $in[$param] = Dosen::model ()->findByPk($param)->full_name;
            
            return array("" => "") + $in;
        }
        
        public static function mataKuliah($param){
            
            $data = array();
            
            $query = Yii::app()->db->createCommand(""
                    . "select m.mata_kuliah "
                    . "from mata_kuliah m "
                    . "left join trx_pengajar_mata_kuliah t on t.mata_kuliah_id = m.id "
                    . "where t.pengajar_id = $param")->queryAll();
            
            foreach ($query as $key => $value) {
                array_push($data, $value['mata_kuliah']);
            }
            
            return implode(",", $data);
        }
        
        public static function createFilter(){
            $criteria = new CDbCriteria();
            $criteria->select =  array("d.id", "d.full_name");
            $criteria->join = "left join dosen d on d.id = t.dosen_id";
            $criteria->condition = "periode_id = ".penjadwalan::activePeriode()->id;
            
            $query = TrxPengajar::model()->findAll($criteria);
            
            $return = array();
            
            if(count($query) > 0)
                foreach ($query as $value) {
                    $return[$value["id"]] = Dosen::model()->findByPk($value["id"])->full_name;
                }
            
            return $return;
        }
}
