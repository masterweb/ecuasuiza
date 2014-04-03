<?php

/**
 * This is the model class for table "tbl_cotizador".
 *
 * The followings are the available columns in table 'tbl_cotizador':
 * @property integer $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $email
 * @property string $cedula
 * @property string $celular
 * @property string $telefono
 * @property string $provincia
 * @property string $ciudad
 * @property string $tipo
 * @property string $marca
 * @property string $modelo
 * @property string $year
 * @property string $uso
 * @property string $fecha
 */
class Cotizador extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_cotizador';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombres, apellidos, email, cedula, celular, telefono, provincia, ciudad', 'required'),
            array('nombres, apellidos, telefono, provincia, ciudad', 'length', 'max' => 200),
            array('email, uso', 'length', 'max' => 100),
            array('cedula', 'length', 'max' => 250),
            array('celular, marca, modelo, fecha', 'length', 'max' => 150),
            array('tipo, year', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nombres, apellidos, email, cedula, celular, telefono, provincia, ciudad, tipo, marca, modelo, year, uso, fecha', 'safe', 'on' => 'search'),
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
            'email' => 'Email',
            'cedula' => 'Cedula',
            'celular' => 'Celular',
            'telefono' => 'Telefono',
            'provincia' => 'Provincia',
            'ciudad' => 'Ciudad',
            'tipo' => 'Tipo',
            'marca' => 'Marca',
            'id_modelo' => 'IdModelo',
            'modelo' => 'Modelo',
            'submodelo' => 'Submodelo',
            'year' => 'Año',
            'uso' => 'Uso',
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
        $criteria->compare('nombres', $this->nombres, true);
        $criteria->compare('apellidos', $this->apellidos, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('cedula', $this->cedula, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('provincia', $this->provincia, true);
        $criteria->compare('ciudad', $this->ciudad, true);
        $criteria->compare('tipo', $this->tipo, true);
        $criteria->compare('marca', $this->marca, true);
        $criteria->compare('id_modelo', $this->modelo, true);
        $criteria->compare('modelo', $this->modelo, true);
        $criteria->compare('submodelo', $this->modelo, true);
        $criteria->compare('year', $this->year, true);
        $criteria->compare('uso', $this->uso, true);
        $criteria->compare('fecha', $this->fecha, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cotizador the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
