<?php

/**
 * This is the model class for table "trx_ruang_kurikulum".
 *
 * The followings are the available columns in table 'trx_ruang_kurikulum':
 * @property integer $id
 * @property integer $kurikulum_id
 * @property integer $ruang_kelas_id
 *
 * The followings are the available model relations:
 * @property TrxKurikulum $kurikulum
 * @property RuangKelas $ruangKelas
 */
class TrxRuangKurikulum extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trx_ruang_kurikulum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kurikulum_id, ruang_kelas_id', 'required'),
			array('kurikulum_id, ruang_kelas_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, kurikulum_id, ruang_kelas_id', 'safe', 'on'=>'search'),
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
			'kurikulum' => array(self::BELONGS_TO, 'TrxKurikulum', 'kurikulum_id'),
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
			'kurikulum_id' => 'Kurikulum',
			'ruang_kelas_id' => 'Ruang Kelas',
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
		$criteria->compare('kurikulum_id',$this->kurikulum_id);
		$criteria->compare('ruang_kelas_id',$this->ruang_kelas_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrxRuangKurikulum the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function toAdd(){
                $result = Yii::app()->db->createCommand("
                    select r.id, r.number
                    from ruang_kelas r
                    ")->queryAll();
            
                $data = array();
                
                if(count($result) == 0)
                    return $data;
                
                foreach ($result as $key => $value) {
                    $data[$value["id"]] = $value["number"];
                }
                
                return $data;
        }
        
        public static function preLoaded($param){
            $data = array();
            
            // preload from table => for update 
            if($param != null){
                $query = Yii::app()->db->createCommand("
                            select t.ruang_kelas_id
                            from trx_ruang_kurikulum t
                            left join trx_kurikulum k on k.id = t.kurikulum_id
                            where t.kurikulum_id = $param and k.periode_id = ".penjadwalan::activePeriode()->id)->queryAll();
                
                if(count($query) != 0 ){
                    foreach ($query as $per) {
                        array_push($data, $per['ruang_kelas_id']);
                    }
                }
                
            }
            //preload from form => for insert
            else{
                if(isset($_REQUEST['TrxKurikulum']) && isset($_REQUEST['TrxKurikulum']['ruang']))
                        foreach ($_REQUEST['TrxKurikulum']['ruang'] as $key => $value) {
                            array_push($data, $value);
                        }
            }
            
            return implode(",", $data);
        }
        
        public static function isChecked($param = null){
              
            if($param != null){
                $query = Yii::app()->db->createCommand("
                    select count(t.ruang_kelas_id)
                    from trx_ruang_kurikulum t
                    left join trx_kurikulum k on k.id = t.kurikulum_id
                    where t.kurikulum_id = $param and k.periode_id = ".penjadwalan::activePeriode()->id)->queryScalar();
                if($query > 0)
                    return true;
            }
            else{
                if(isset($_REQUEST['TrxKurikulum']) && isset($_REQUEST['TrxKurikulum']['isRuang']))
                    if(isset($_REQUEST['TrxKurikulum']['ruang']))
                        return true;
            }
            
            return false;
            
        }
}
