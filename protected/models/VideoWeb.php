<?php

/**
 * This is the model class for table "tbl_video_web".
 *
 * The followings are the available columns in table 'tbl_video_web':
 * @property integer $id_video_web
 * @property string $url_video
 * @property string $id_video
 * @property integer $servidor
 */
class VideoWeb extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VideoWeb the static model class
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
		return 'tbl_video_web';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url_video, servidor, name', 'required'),
			array('servidor', 'numerical', 'integerOnly'=>true),
			array('url_video', 'length', 'max'=>250),
			array('id_video', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_video_web, url_video, id_video, servidor', 'safe', 'on'=>'search'),
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
			'id_video_web' => 'Id Video Web',
			'url_video' => 'Url Video',
			'id_video' => 'Id Video',
			'servidor' => 'Youtube/Vimeo',
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

		$criteria->compare('id_video_web',$this->id_video_web);
		$criteria->compare('url_video',$this->url_video,true);
		$criteria->compare('id_video',$this->id_video,true);
		$criteria->compare('servidor',$this->servidor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}