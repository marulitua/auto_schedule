<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property integer $id
 * @property integer $variable_size
 * @property double $execute_time
 * @property integer $min_domain
 * @property integer $max_domain
 * @property integer $solved
 * @property integer $unsolved
 * @property integer $n_backtracking
 */
class Log extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('variable_size, execute_time, min_domain, max_domain, solved, unsolved', 'required'),
			array('variable_size, min_domain, max_domain, solved, unsolved, n_backtracking', 'numerical', 'integerOnly'=>true),
			array('execute_time', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, variable_size, execute_time, min_domain, max_domain, solved, unsolved, n_backtracking', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'variable_size' => 'Variable Size',
			'execute_time' => 'Execution Time',
			'min_domain' => 'Min Domain',
			'max_domain' => 'Max Domain',
			'solved' => 'Solved',
			'unsolved' => 'Unsolved',
			'n_backtracking' => 'N Backtracking',
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
		$criteria->compare('variable_size',$this->variable_size);
		$criteria->compare('execute_time',$this->execute_time);
		$criteria->compare('min_domain',$this->min_domain);
		$criteria->compare('max_domain',$this->max_domain);
		$criteria->compare('solved',$this->solved);
		$criteria->compare('unsolved',$this->unsolved);
		$criteria->compare('n_backtracking',$this->n_backtracking);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Log the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getTimeExecution(){
            return $this->execute_time." S";
        }
        
}
