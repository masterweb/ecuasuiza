<?php

/**
 * This is the model class for table "tbl_seguros".
 *
 * The followings are the available columns in table 'tbl_seguros':
 * @property integer $id
 * @property string $link_img
 * @property string $title
 * @property string $desc_min
 * @property string $contenido
 * @property string $link_attachment
 * @property string $tipo_attachment
 * @property string $img_banner
 * @property string $fecha
 */
class Seguros extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $title;
    public $desc_min;
    public $contenido;
    
    
    public function tableName() {
        return 'tbl_seguros';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array("title, desc_min, contenido","required"),
            array('link_img, title, link_attachment, fecha', 'length', 'max' => 150),
            array('tipo_attachment', 'length', 'max' => 30),
            array('img_banner', 'length', 'max' => 10),
            array('desc_min, contenido', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, link_img, title, desc_min, contenido, link_attachment, tipo_attachment, img_banner, fecha', 'safe', 'on' => 'search'),
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
            'link_img' => 'Link Img',
            'title' => 'Título',
            'desc_min' => 'Descripción breve',
            'contenido' => 'Contenido',
            'link_attachment' => 'Link Attachment',
            'tipo_attachment' => 'Tipo Attachment',
            'img_banner' => 'Img Banner',
            'categoria' => 'Categoría',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('link_img', $this->link_img, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('desc_min', $this->desc_min, true);
        $criteria->compare('contenido', $this->contenido, true);
        $criteria->compare('link_attachment', $this->link_attachment, true);
        $criteria->compare('tipo_attachment', $this->tipo_attachment, true);
        $criteria->compare('img_banner', $this->img_banner, true);
        $criteria->compare('fecha', $this->fecha, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Seguros the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
