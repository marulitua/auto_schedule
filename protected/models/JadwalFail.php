<?php

/**
 * This is the model class for table "jadwal_fail".
 *
 * The followings are the available columns in table 'jadwal_fail':
 * @property integer $id
 * @property integer $periode_id
 * @property integer $mata_kuliah_id
 * @property integer $sks
 * @property integer $praktek
 *
 * The followings are the available model relations:
 * @property MataKuliah $mataKuliah
 * @property Periode $periode
 */
class JadwalFail extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jadwal_fail';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('periode_id, mata_kuliah_id, sks, praktek', 'required'),
            array('periode_id, mata_kuliah_id, sks, praktek', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, periode_id, mata_kuliah_id, sks, praktek', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
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
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'periode_id' => 'Periode',
            'mata_kuliah_id' => 'Mata Kuliah',
            'sks' => 'Sks',
            'praktek' => 'Praktek',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('periode_id', $this->periode_id);
        $criteria->compare('mata_kuliah_id', $this->mata_kuliah_id);
        $criteria->compare('sks', $this->sks);
        $criteria->compare('praktek', $this->praktek);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return JadwalFail the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function summary($id) {
       
        $sql = "SELECT DISTINCT (select m.mata_kuliah from mata_kuliah m where m.id = t.mata_kuliah_id) as mata_kuliah, t.sks, t.praktek, 
	(select count(*) from jadwal_fail j where j.periode_id = t.periode_id and j.mata_kuliah_id = t.mata_kuliah_id) as 'jumlah_kelas'
FROM jadwal_fail t
where t.periode_id = $id";
        $count = Yii::app()->db->createCommand($sql)->queryAll();

        return new CSqlDataProvider($sql, array(
            'totalItemCount' => count($count),
            'sort' => array(
                'attributes' => array(
                    'mata_kuliah', 'sks', 'praktek',
                ),
            ),
//            'pagination' => array(
//                'pageSize' => 5,
//            ),
        ));
    }

}
