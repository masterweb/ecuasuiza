<?php

/**
 * This is the model class for table "tbl_resource".
 *
 * The followings are the available columns in table 'tbl_resource':
 * @property string $id_resource
 * @property integer $type_resource
 * @property string $name_resource
 * @property string $folder_resource
 * @property integer $account
 * @property string $date_register
 *
 * The followings are the available model relations:
 * @property TblTypeResource $typeResource
 */
class Resource extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Resource the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_resource';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_resource, name_resource, folder_resource, account, date_register', 'required'),
			array('type_resource, account', 'numerical', 'integerOnly'=>true),
			array('name_resource, folder_resource', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_resource, type_resource, name_resource, folder_resource, account, date_register', 'safe', 'on'=>'search'),
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
			'typeResource' => array(self::BELONGS_TO, 'TblTypeResource', 'type_resource'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_resource' => 'Id Resource',
			'type_resource' => 'Type Resource',
			'name_resource' => 'Name Resource',
			'folder_resource' => 'Folder Resource',
			'account' => 'Account',
			'date_register' => 'Date Register',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_resource',$this->id_resource,true);
		$criteria->compare('type_resource',$this->type_resource);
		$criteria->compare('name_resource',$this->name_resource,true);
		$criteria->compare('folder_resource',$this->folder_resource,true);
		$criteria->compare('account',$this->account);
		$criteria->compare('date_register',$this->date_register,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function updateResource($name_folder, $model, $change_name, $name_real)
	{
		$res  = Resource::model()->findByAttributes(array('folder_resource'=>$name_folder));
		$res->name_resource = $model->name;
		if($change_name)
			$res->name_real = $name_real;
		$res->date_register = date("Y-m-d H:i:s");
		$res->save();
	}
	
	public function updateResourceAccount($name_folder, $model, $change_name, $name_real, $acc)
	{
		$res  = Resource::model()->findByAttributes(array('folder_resource'=>$name_folder));
		$res->name_resource = $model->name;
		$res->account = $acc;
		if($change_name)
			$res->name_real = $name_real;
		$res->date_register = date("Y-m-d H:i:s");
		$res->save();
	}

}