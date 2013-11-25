<?php

/**
 * This is the model class for table "trx_pengajar_mata_kuliah".
 *
 * The followings are the available columns in table 'trx_pengajar_mata_kuliah':
 * @property integer $id
 * @property integer $pengajar_id
 * @property integer $mata_kuliah_id
 *
 * The followings are the available model relations:
 * @property MataKuliah $mataKuliah
 * @property TrxPengajar $pengajar
 */
class TrxPengajarMataKuliah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trx_pengajar_mata_kuliah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pengajar_id, mata_kuliah_id', 'required'),
			array('pengajar_id, mata_kuliah_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pengajar_id, mata_kuliah_id', 'safe', 'on'=>'search'),
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
			'pengajar' => array(self::BELONGS_TO, 'TrxPengajar', 'pengajar_id'),
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
			'mata_kuliah_id' => 'Mata Kuliah',
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
		$criteria->compare('mata_kuliah_id',$this->mata_kuliah_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrxPengajarMataKuliah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function toAdd(){
                $result = array();
                
                $result = Yii::app()->db->createCommand("
                select m.id, m.mata_kuliah
                from mata_kuliah m
                ")->queryAll();
                
                $data = array();
                
                if(count($result) == 0)
                    return $data;
                
                foreach ($result as $key => $value) {
                    $data[$value["id"]] = $value["mata_kuliah"];
                }
                
                return $data;
        }
        
        public static function preLoaded($param){
            $data = array();
            
            // preload from table => for update 
            if($param != null){
                 $query = Yii::app()->db->createCommand("
                             select t.mata_kuliah_id
                             from trx_pengajar_mata_kuliah t
                             left join trx_pengajar k on k.id = t.pengajar_id
                             where t.pengajar_id = $param and k.periode_id = ".penjadwalan::activePeriode()->id)->queryAll();

                 if(count($query) > 0 ){
                       foreach ($query as $per) {
                            array_push($data, $per['mata_kuliah_id']);
                        }
                    }
            } 
            //preload from form => for insert
            else{
                if(isset($_REQUEST['TrxPengajar']) && isset($_REQUEST['TrxPengajar']['mataKuliah']))
                    foreach ($_REQUEST['TrxPengajar']['mataKuliah'] as $key => $value) {
                            array_push($data, $value);
                    }
            }
 
            return implode(",", $data);
        }
        
        public static function isChecked($param = null){
            
            if($param != null){
                $query = Yii::app()->db->createCommand("
                    select count(t.mata_kuliah_id)
                    from trx_pengajar_mata_kuliah t
                    left join trx_pengajar k on k.id = t.pengajar_id
                    where t.pengajar_id = $param and k.periode_id = ".penjadwalan::activePeriode()->id)->queryScalar();
                
                if($query > 0)
                    return true;
            }
            else{
                if(isset($_REQUEST['TrxPengajar']))
                    if(isset($_REQUEST['TrxPengajar']['mataKuliah']))
                        return true;
            
            }
            
            return false;
        }
}
