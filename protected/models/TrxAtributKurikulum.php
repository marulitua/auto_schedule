<?php

/**
 * This is the model class for table "trx_atribut_kurikulum".
 *
 * The followings are the available columns in table 'trx_atribut_kurikulum':
 * @property integer $id
 * @property integer $kurikulum_id
 * @property integer $atribut_id
 *
 * The followings are the available model relations:
 * @property TrxKurikulum $kurikulum
 * @property Atribut $atribut
 */
class TrxAtributKurikulum extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trx_atribut_kurikulum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kurikulum_id, atribut_id', 'required'),
			array('kurikulum_id, atribut_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, kurikulum_id, atribut_id', 'safe', 'on'=>'search'),
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
			'atribut' => array(self::BELONGS_TO, 'Atribut', 'atribut_id'),
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
			'atribut_id' => 'Atribut',
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
		$criteria->compare('atribut_id',$this->atribut_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrxAtributKurikulum the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function toAdd(){
                $result = Yii::app()->db->createCommand("
                    select a.id, a.atribut
                    from atribut a
                    where a.id not in (
                            select t.atribut_id
                            from trx_atribut_kurikulum t
                            left join trx_kurikulum k on k.id = t.kurikulum_id
                            where k.periode_id = ".penjadwalan::activePeriode()->id."
                    )
                    ")->queryAll();
            
                $data = array();
                
                if(count($result) == 0)
                    return $data;
                
                foreach ($result as $key => $value) {
                    $data[$value["id"]] = $value["atribut"];
                }
                
                return $data;
        }
        
        public static function preLoaded(){
            $data = array();
            
            // preload from table => for update 
            if(!isset($_REQUEST['TrxKurikulum'])){
                $query = TrxAtributKurikulum::model()->findAll("periode_id = ".penjadwalan::activePeriode()->id);
                
                if(count($query) != 0 ){
                    foreach ($query as $per) {
                        array_push($data, $per['atribut_id']);
                    }
                }
                
            }
            
            //preload from form => for insert
            if(self::isChecked())
                    foreach ($_REQUEST['TrxKurikulum']['atribut'] as $key => $value) {
                        array_push($data, $value);
                    }
            
            return implode(",", $data);
        }
        
        public static function isChecked(){
            
            if(isset($_REQUEST['TrxKurikulum']) && isset($_REQUEST['TrxKurikulum']['isAtribut']))
                if(isset($_REQUEST['TrxKurikulum']['atribut']))
                    return true;
            
            return false;
        }
}
