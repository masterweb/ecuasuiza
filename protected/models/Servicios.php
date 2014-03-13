<?php

/**
 * This is the model class for table "tbl_servicios".
 *
 * The followings are the available columns in table 'tbl_servicios':
 * @property string $id
 * @property string $banner
 * @property string $title
 * @property string $desc_min
 * @property string $contenido
 * @property string $adjunto
 * @property string $fecha
 */
class Servicios extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_servicios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, desc_min, contenido, categoria', 'required'),
            array('banner, title, adjunto, fecha', 'length', 'max' => 150),
            array('banner','file', 'types'=>'jpg, jpeg, png'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, banner, title, desc_min, contenido, adjunto, fecha', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'banner' => 'Banner',
            'title' => 'Título',
            'desc_min' => 'Descripción Mínima',
            'contenido' => 'Contenido',
            'adjunto' => 'Adjunto',
            'categoria' => 'Categoría',
            'num_adjuntos' => 'Numero de adjuntos',
            'has_adjuntos' => 'Tiene adjuntos',
            'has_foto' => 'Tiene foto',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('banner', $this->banner, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('desc_min', $this->desc_min, true);
        $criteria->compare('contenido', $this->contenido, true);
        $criteria->compare('adjunto', $this->adjunto, true);
        $criteria->compare('fecha', $this->fecha, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Servicios the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
