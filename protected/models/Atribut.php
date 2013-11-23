<?php

/**
 * This is the model class for table "atribut".
 *
 * The followings are the available columns in table 'atribut':
 * @property integer $id
 * @property string $atribut
 *
 * The followings are the available model relations:
 * @property TrxRuangAtribut[] $trxRuangAtributs
 */
class Atribut extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'atribut';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('atribut', 'required'),
			array('atribut', 'length', 'max'=>200),
                        array('atribut', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, atribut', 'safe', 'on'=>'search'),
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
			'trxRuangAtributs' => array(self::HAS_MANY, 'TrxRuangAtribut', 'atribut_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'atribut' => 'Atribut',
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
		$criteria->compare('atribut',$this->atribut,true);

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
	 * @return Atribut the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function selectAble($id){
            return $this->findAll();
        }
        
        public static function toSelect($id){
            $query = Yii::app()->db->createCommand("SELECT a.atribut
                    from atribut a
                    where a.id not in (
                    select t.atribut_id
                    from trx_ruang_atribut t
                    where t.ruang_kelas_id = $id
                    )")->queryAll();
            
            $data = array();
            if(count($query) == 0)
                return "";
            
            foreach ($query as $key => $value) {
                array_push($data, $value['atribut']);
            }
            
            return implode("','",$data);
        } 
}
