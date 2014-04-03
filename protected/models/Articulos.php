<?php

/**
 * This is the model class for table "tbl_articulos".
 *
 * The followings are the available columns in table 'tbl_articulos':
 * @property string $id_articulos
 * @property string $has_image
 * @property string $link_img
 * @property string $title
 * @property string $desc_min
 * @property string $contenido
 * @property string $categoria
 * @property string $fecha
 * @property integer $activo
 */
class Articulos extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_articulos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, desc_min, contenido', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('has_image', 'length', 'max' => 2),
            array('link_img, title', 'length', 'max' => 150),
            array('categoria, fecha', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_articulos, has_image, link_img, title, desc_min, contenido, categoria, fecha, activo', 'safe', 'on' => 'search'),
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
            'id_articulos' => 'Id Articulos',
            'has_image' => 'Subir Imágen',
            'link_img' => 'Link Img',
            'title' => 'Title',
            'desc_min' => 'Descripción',
            'contenido' => 'Contenido',
            'categoria' => 'Categoria',
            'fecha' => 'Fecha',
            'activo' => 'Activo',
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

        $criteria->compare('id_articulos', $this->id_articulos, true);
        $criteria->compare('has_image', $this->has_image, true);
        $criteria->compare('link_img', $this->link_img, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('desc_min', $this->desc_min, true);
        $criteria->compare('contenido', $this->contenido, true);
        $criteria->compare('categoria', $this->categoria, true);
        $criteria->compare('fecha', $this->fecha, true);
        $criteria->compare('activo', $this->activo);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Articulos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
