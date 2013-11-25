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
		$criteria->compare('periode_id',  penjadwalan::activePeriode()->id);
		$criteria->compare('mata_kuliah_id',$this->mata_kuliah_id);
		$criteria->compare('jumlah_kelas',$this->jumlah_kelas);

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
	 * @return TrxKurikulum the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function toAdd($param = false){
            
            $data = Yii::app()->db->createCommand("
                    select a.id, a.mata_kuliah
                    from mata_kuliah a
                    left join trx_kurikulum t on t.mata_kuliah_id = a.id
                    where a.id not in (
                            select t.mata_kuliah_id 
                            from trx_kurikulum t 
                            where t.periode_id = ".penjadwalan::activePeriode()->id."
                    )")->queryAll();
            
            $in = array();
            
            
            foreach ($data as $key) {
                $in[$key['id']] = $key['mata_kuliah'];
            }
            
            if($param != false)
                $in[$param] = MataKuliah::model ()->findByPk($param)->mata_kuliah;
            
            
            return array("" => "") + $in;
        }
        
        public static function createFilter(){            
            
            
            $criteria = new CDbCriteria();
            $criteria->select =  array("m.id", "m.mata_kuliah");
            $criteria->join = "left join mata_kuliah m on m.id = t.mata_kuliah_id";
            $criteria->condition = "periode_id = ".penjadwalan::activePeriode()->id;
            
            TrxKurikulum::model()->findAll("periode_id = ".penjadwalan::activePeriode()->id);
            
            $query = TrxKurikulum::model()->findAll($criteria);
            
            $return = array();
            
            if(count($query) > 0)
                foreach ($query as $value) {
                    $return[$value["id"]] = MataKuliah::model()->findByPk($value["id"])->mata_kuliah;
                }
            
            return $return;
        }
        
        public static function hari($param){
            
            $data = array();
            
            $query = Yii::app()->db->createCommand(""
                    . "select h.hari "
                    . "from hari h "
                    . "left join trx_hari_kurikulum t on t.hari_id = h.id "
                    . "where t.kurikulum_id = $param")->queryAll();
            
            foreach ($query as $key => $value) {
                array_push($data, $value['hari']);
            }
            
            return implode(",", $data);
        }
        
        public static function ruang($param){
            $data = array();
            
            $query = Yii::app()->db->createCommand(""
                    . "select r.number "
                    . "from ruang_kelas r "
                    . "left join trx_ruang_kurikulum t on t.ruang_kelas_id = r.id "
                    . "where t.kurikulum_id = $param")->queryAll();
            
            if(count($query) > 0){
                foreach ($query as $key => $value) {
                    array_push($data, $value['number']);
                }
            }
            else{
                $query = Yii::app()->db->createCommand(""
                    . "select a.atribut "
                    . "from atribut a "
                    . "left join trx_atribut_kurikulum t on t.atribut_id = a.id "
                    . "where t.kurikulum_id = $param")->queryAll();
            
            
                foreach ($query as $key => $value) {
                    array_push($data, $value['atribut']);
                }
            }
            
            return implode(", ", $data);
        }
}
