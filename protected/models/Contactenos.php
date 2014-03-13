<?php

/**
 * This is the model class for table "tbl_contactenos".
 *
 * The followings are the available columns in table 'tbl_contactenos':
 * @property string $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $provincia
 * @property string $ciudad
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property string $comentarios
 * @property string $fecha
 */
class Contactenos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_contactenos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, apellidos, provincia, ciudad, telefono, celular, email', 'required'),
			array('nombres, apellidos, email, fecha', 'length', 'max'=>200),
			array('provincia, ciudad, telefono, celular', 'length', 'max'=>150),
			array('comentarios', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombres, apellidos, provincia, ciudad, telefono, celular, email, comentarios, fecha', 'safe', 'on'=>'search'),
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
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'provincia' => 'Provincia',
			'ciudad' => 'Ciudad',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'email' => 'Email',
			'comentarios' => 'Comentarios',
			'fecha' => 'Fecha',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('provincia',$this->provincia,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('comentarios',$this->comentarios,true);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contactenos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
