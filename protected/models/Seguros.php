<?php

/**
 * This is the model class for table "tbl_seguros".
 *
 * The followings are the available columns in table 'tbl_articulo':
 * @property string $id_articulo
 * @property string $id_subseccion
 * @property string $short_des
 * @property string $thumb
 * @property integer $orden
 * @property string $contenido
 * @property string $fecha
 */
class Seguros extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Articulo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
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
            array('title, desc_min, content', 'required'),
            array('image', 'file','types'=>'doc, docx, pdf', 'allowEmpty'=>true, 'on'=>'update'),
            array('link_img, title, link_attachment', 'length', 'max' => 150),
//            array('tipo_attachment', 'length', 'max' => 30),
//            array('desc_min, contenido', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, link_img, title, desc_min, content, link_attachment, tipo_attachment', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
                //'idSubseccion' => array(self::BELONGS_TO, 'Subseccion', 'id_subseccion'),
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
            'desc_min' => 'Descripción Breve',
            'content' => 'Contenido',
            'link_attachment' => 'Link Attachment',
            'tipo_attachment' => 'Tipo Attachment',
            'img_banner' => 'Img Banner',
            'fecha' => 'Fecha',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_articulo', $this->id_articulo, false);
        $criteria->compare('id_subseccion', $this->id_subseccion, false);
        $criteria->compare('short_des', $this->short_des, true);
        $criteria->compare('thumb', $this->thumb, true);
        $criteria->compare('orden', $this->orden);
        $criteria->compare('contenido', $this->contenido, true);
        $criteria->compare('fecha', $this->fecha, true);

        $sort = new CSort();
        $sort->defaultOrder = array(
            //'create_time' => CSort::SORT_DESC,
            'orden' => CSort::SORT_ASC,
            'sort' => $sort,
        );

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                    'sort' => $sort,
                    'pagination' => array(
                        'pageSize' => 300
                    ),
                ));
    }

    public function filterSubseccion($id_subseccion) {
        $criteria = new CDbCriteria;
        $criteria->compare('id_subseccion', $id_subseccion, true);
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function loadContenido() {
        $seccion = Articulo::model()->findAll(array(
            'select' => 'id_articulo,title',
            'order' => 'title'
                ));
        $array = array();
        $obj = array();
        foreach ($seccion as $s) {
            $obj['id_articulo'] = $s['id_articulo'];
            $titulo = $s['title'];
            $titulo = strip_tags($titulo);
            $titulo = str_replace("\r", '', $titulo);
            $titulo = str_replace("\n", '', $titulo);
            $obj['title'] = $titulo;
            $array[] = $obj;
        }
        return CHtml::listData($array, 'id_articulo', 'title');
    }

}