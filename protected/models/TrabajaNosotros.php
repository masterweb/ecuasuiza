<?php

/**
 * This is the model class for table "tbl_trabaja_nosotros".
 *
 * The followings are the available columns in table 'tbl_trabaja_nosotros':
 * @property string $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $telefono
 * @property string $celular
 * @property string $ciudad
 * @property string $email
 * @property string $disponibilidad
 * @property string $area_interes
 * @property string $link
 * @property string $fecha
 */
class TrabajaNosotros extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_trabaja_nosotros';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombres, apellidos, telefono, celular, ciudad, email, disponibilidad, area_interes', 'required'),
            array('nombres, apellidos, telefono, celular, ciudad, email, fecha', 'length', 'max' => 100),
            array('disponibilidad, area_interes', 'length', 'max' => 50),
            array('link','file', 'types'=>'doc, docx, pdf, xls, xlsx'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nombres, apellidos, telefono, celular, ciudad, email, disponibilidad, area_interes, link, fecha', 'safe', 'on' => 'search'),
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
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'telefono' => 'Teléfono de contacto',
            'celular' => 'Celular',
            'ciudad' => 'Ciudad',
            'email' => 'Email',
            'disponibilidad' => 'Disponibilidad de tiempo',
            'area_interes' => 'Area de interés',
            'link' => 'Sube tu currículum',
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
        $criteria->compare('nombres', $this->nombres, true);
        $criteria->compare('apellidos', $this->apellidos, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('ciudad', $this->ciudad, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('disponibilidad', $this->disponibilidad, true);
        $criteria->compare('area_interes', $this->area_interes, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('fecha', $this->fecha, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TrabajaNosotros the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
