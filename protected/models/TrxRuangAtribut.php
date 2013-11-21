<?php

/**
 * This is the model class for table "trx_ruang_atribut".
 *
 * The followings are the available columns in table 'trx_ruang_atribut':
 * @property integer $id
 * @property integer $ruang_kelas_id
 * @property integer $atribut_id
 *
 * The followings are the available model relations:
 * @property RuangKelas $ruangKelas
 * @property Atribut $atribut
 */
class TrxRuangAtribut extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trx_ruang_atribut';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ruang_kelas_id, atribut_id', 'required'),
			array('ruang_kelas_id, atribut_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ruang_kelas_id, atribut_id', 'safe', 'on'=>'search'),
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
			'ruangKelas' => array(self::BELONGS_TO, 'RuangKelas', 'ruang_kelas_id'),
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
			'ruang_kelas_id' => 'Ruang Kelas',
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
		$criteria->compare('ruang_kelas_id',$this->ruang_kelas_id);
		$criteria->compare('atribut_id',$this->atribut_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrxRuangAtribut the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function cariAtribut($ruangKelas){
            $criteria=new CDbCriteria;

            $criteria->compare('ruang_kelas_id',$ruangKelas);

            return new CActiveDataProvider($this, array(
		'criteria'=>$criteria,
                'pagination' => array(
                            'pageSize' => 5,
                        ),
            ));
        }
}
