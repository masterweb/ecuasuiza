<?php

/**
 * This is the model class for table "tbl_pdf".
 *
 * The followings are the available columns in table 'tbl_pdf':
 * @property integer $id_pdf
 * @property string $name
 * @property string $descripcion
 * @property string $name_real
 * @property string $pdf
 */
class Pdf extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Pdf the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_pdf';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, descripcion,categoria,keyword', 'required'),
            array('name, name_real, pdf', 'length', 'max' => 255),
            array('pdf', 'file', 'types' => 'pdf'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, descripcion, name_real, pdf, categoria, subcategoria', 'safe', 'on' => 'search'),
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
            'id' => 'Id Pdf',
            'name' => 'Nombre',
            'descripcion' => 'Descripcion',
            'keyword' => 'Palabra Clave',
            'categoria' => 'Categoria',
            'subcategoria' => 'Sub Categoria',
            'name_real' => 'Nombre Real',
            'pdf' => 'Pdf',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('name_real', $this->name_real, true);
        $criteria->compare('pdf', $this->pdf, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    private function sanear_string($string) {
        $string = (string) $string;
        $string = trim($string);

        $string = str_replace(
                array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string
        );

        $string = str_replace(
                array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string
        );

        $string = str_replace(
                array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string
        );

        $string = str_replace(
                array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string
        );

        $string = str_replace(
                array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string
        );

        $string = str_replace(
                array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C',), $string
        );
        $string = str_replace("+", "", $string);
        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
                array("\\", "¨", "º", "-", "~",
            "#", "@", "|", "!", "\"",
            "$", "%", "&", "/",
            "(", ")", "?", "'", "¡",
            "¿", "[", "^", "`", "]",
            "}", "{", "¨", "´",
            ">", "< ", ";", ",", ":",
            "+"), '_', $string
        );


        return $string;
    }

}