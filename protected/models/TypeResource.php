<?php

/**
 * This is the model class for table "tbl_type_resource".
 *
 * The followings are the available columns in table 'tbl_type_resource':
 * @property integer $id_type_resource
 * @property string $name_type_resource
 *
 * The followings are the available model relations:
 * @property TblResource[] $tblResources
 */
class TypeResource extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TypeResource the static model class
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
		return 'tbl_type_resource';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_type_resource', 'required'),
			array('name_type_resource', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_type_resource, name_type_resource', 'safe', 'on'=>'search'),
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
			'tblResources' => array(self::HAS_MANY, 'TblResource', 'type_resource'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_type_resource' => 'Id Type Resource',
			'name_type_resource' => 'Name Type Resource',
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

		$criteria->compare('id_type_resource',$this->id_type_resource);
		$criteria->compare('name_type_resource',$this->name_type_resource,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function loadTypeResource()
	{
		return CHtml::listData(TypeResource::model()->findAll(array(
						'select'=>'id_type_resource,name_type_resource',
						'order' => 'name_type_resource'
					)), 'id_type_resource', 'name_type_resource'); 
	}
}