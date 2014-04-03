<?php

class CotizadorController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/main';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
//    public function accessRules() {
//        return array(
//            array('allow', // allow all users to perform 'index' and 'view' actions
//                'actions' => array('index', 'view','create'),
//                'users' => array('*'),
//            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('create', 'update'),
//                'users' => array('@'),
//            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array('admin', 'delete'),
//                'users' => array('admin'),
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
//            ),
//        );
//    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        //die('enter create');
        $model = new Cotizador;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cotizador'])) {
            require_once 'email/mail_func.php';
            $model->attributes = $_POST['Cotizador'];
            if ($model->validate()) {

                $model->fecha = date("Y-m-d G:i:s");
                if (isset($_POST['Cotizador']['modelo'])):
                    $params = explode('@', $_POST['Cotizador']['modelo']);
                    $model->id_modelo = $params[0];
                    $model->modelo = $params[1];
                    $model->submodelo = $params[2];
                endif;

                $tipo = $_POST['Cotizador']['tipo'];
                if ($model->save()) {
                    switch ($tipo) {
                        case 'auto':
                            $valor = $this->getPvp($params[0], $_POST['Cotizador']['year'], $params[1], $params[2]);
                            $body = '<table border=0>
                            <tr><td><b>Formulario enviado desde el cotizador :</b></td><td>' . ucfirst($tipo) . '</td></tr>
                            <tr><td><b>Nombres:</b></td><td>' . $_POST['Cotizador']['nombres'] . '</td></tr>
                            <tr><td><b>Apellidos:</b></td><td>' . $_POST['Cotizador']['apellidos'] . '</td></tr>
                            <tr><td><b>Email:</b></td><td>' . $_POST['Cotizador']['email'] . '</td></tr> 
                            <tr><td><b>Cédula:</b></td><td>' . $_POST['Cotizador']['cedula'] . '</td></tr>
                            <tr><td><b>Teléfono:</b></td><td>' . $_POST['Cotizador']['telefono'] . '</td></tr>
                            <tr><td><b>Celular:</b></td><td>' . $_POST['Cotizador']['celular'] . '</td></tr>
                            <tr><td><b>Provincia:</b></td><td>' . $_POST['Cotizador']['provincia'] . '</td></tr>
                            <tr><td><b>Marca de Vehículo:</b></td><td>' . $_POST['Cotizador']['marca'] . '</td></tr>
                            <tr><td><b>Modelo:</b></td><td>' . $params[1] .' '.$params[2]. '</td></tr>
                            <tr><td><b>Año:</b></td><td>' . $_POST['Cotizador']['year'] . '</td></tr>
                            <tr><td><b>Uso:</b></td><td>' . $_POST['Cotizador']['uso'] . '</td></tr>
                            </table>';
                            $codigohtml = $body;
                            $headers = 'From: jorge.rodriguez@ariadna.com.ec' . "\r\n";
                            $headers .= 'Content-type: text/html' . "\r\n";

                            $asunto = 'Formulario enviado desde Ecuasuiza: Cotizador Auto';
                            if ($valor != ''):
                                sendEmailFunction('jorge.rodriguez@ariadna.com.ec', "Ecuasuiza", 'gansaldo72@hotmail.com', html_entity_decode($asunto), $codigohtml, 'utf-8');
                                Yii::app()->user->setFlash('cotizadorinfo', '<h4>Valor aproximado</h4>
                                <p>USD.:<b>' . number_format($valor) . '</b></p>
                                <p class="rec-title">Recuerda que este es un valor referencial</p>
                                En un período de 24 horas nuestros asesores se comunicarán contigo
                                para brindarte una atención personalizada.', array('id' => 'confirmate'));
                                $this->redirect(array('cotizadorinfo'));
                            else:
                                sendEmailFunction('jorge.rodriguez@ariadna.com.ec', "Ecuasuiza", 'gansaldo72@hotmail.com', html_entity_decode($asunto), $codigohtml, 'utf-8');
                                Yii::app()->user->setFlash('cotizadorinfo', '
                            <p>No existe un valor de éste modelo para el año solicitado</p>
                            <p>Seleccione un nuevo año u otro modelo.</p>', array('id' => 'confirmate'));
                                $this->redirect(array('cotizadorinfo'));
                            endif;

                            break;
                        case 'hogar':
                        case 'vida':
                        case 'empresarial':
                            //die('enter hogar');
                            $body = '<table border=0>
                            <tr><td><b>Formulario enviado desde el cotizador :</b></td><td>' . ucfirst($tipo) . '</td></tr>
                            <tr><td><b>Nombres:</b></td><td>' . $_POST['Cotizador']['nombres'] . '</td></tr>
                            <tr><td><b>Apellidos:</b></td><td>' . $_POST['Cotizador']['apellidos'] . '</td></tr>
                            <tr><td><b>Email:</b></td><td>' . $_POST['Cotizador']['email'] . '</td></tr> 
                            <tr><td><b>Cédula:</b></td><td>' . $_POST['Cotizador']['cedula'] . '</td></tr>
                            <tr><td><b>Teléfono:</b></td><td>' . $_POST['Cotizador']['telefono'] . '</td></tr>
                            <tr><td><b>Celular:</b></td><td>' . $_POST['Cotizador']['celular'] . '</td></tr>
                            <tr><td><b>Provincia:</b></td><td>' . $_POST['Cotizador']['provincia'] . '</td></tr>
                            <tr><td><b>Ciudad:</b></td><td>' . $_POST['Cotizador']['ciudad'] . '</td></tr>
                            </table>';
                            $codigohtml = $body;
                            $headers = 'From: jorge.rodriguez@ariadna.com.ec' . "\r\n";
                            $headers .= 'Content-type: text/html' . "\r\n";

                            $asunto = 'Formulario enviado desde Ecuasuiza';
                            if (sendEmailFunction('jorge.rodriguez@ariadna.com.ec', "Ecuasuiza", 'gansaldo72@hotmail.com', html_entity_decode($asunto), $codigohtml, 'utf-8')) {
                                //die('before email');
                                Yii::app()->user->setFlash('cotizadorinfo', '<h4>Información Enviada</h4>En un período de 24 horas nuestros asesores se comunicarán contigo
                            para brindarte una atención personalizada.');
                                $this->redirect(array('cotizadorinfo'));
                            }

                            break;

                        default:
                            break;
                    }
                }
            }
        }

        $this->render('cotizadorinfo', array(
            'model' => $model,
        ));
    }

    public function actionCreateres() {
        $model = new Cotizador;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cotizador'])) {
            $model->attributes = $_POST['Cotizador'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cotizador'])) {
            $model->attributes = $_POST['Cotizador'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Cotizador');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Cotizador('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cotizador']))
            $model->attributes = $_GET['Cotizador'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Cotizador the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Cotizador::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Cotizador $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cotizador-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionCotizador() {
        $model = new Cotizador;
        $this->render('cotizador', array('model' => $model));
    }

    public function actionCotizadorinfo() {
        $model = new Cotizador;
        $this->render('cotizadorinfo', array('model' => $model));
    }

    public function actionGetmodelos() {
        $modeloAuto = isset($_POST["marca"]) ? $_POST["marca"] : "";
        $data = '<option value="">--Seleccione un modelo--</option>';
        $data .= $this->getModelosAutos($modeloAuto);

        $options = array('options' => $data);
        echo json_encode($options);
    }

    public function actionGetyears() {
        $idModelo = isset($_POST["modelo"]) ? $_POST["modelo"] : "";
        $data = '<option value="">--Seleccione el año--</option>';
        $data .= $this->getYears($idModelo);

        $options = array('options' => $data);
        echo json_encode($options);
    }

    private function getModelosAutos($modeloAuto) {
        //$sql = "SELECT id, modelo, submodelo FROM tbl_marcas WHERE marca='{$modeloAuto}' GROUP BY submodelo ORDER BY modelo";

        $criteria = new CDbCriteria(array(
                    'condition' => "marca='{$modeloAuto}'",
                    'group' => 'submodelo',
                    'order' => 'modelo asc'
                ));
        $modelos = Marcas::model()->findAll($criteria);
        $data = '';
        foreach ($modelos as $model) {
            $data .= '<option value="' . $model['id'] . '@' . $model['modelo'] . '@' . $model['submodelo'] . '">' . $model['modelo'] . ' ' . $model['submodelo'] . '</option>';
        }
        return $data;
    }

    private function getYears($idModelo) {
        //$sql = "SELECT id, modelo, submodelo FROM tbl_marcas WHERE marca='{$modeloAuto}' GROUP BY submodelo ORDER BY modelo";

        $criteria = new CDbCriteria(array(
                    'condition' => "id='{$idModelo}'",
                    'group' => 'year',
                    'order' => 'year asc'
                ));
        $modelos = Marcas::model()->findAll($criteria);
        $data = '';
        foreach ($modelos as $model) {
            $data .= '<option value="' . $model['year'] . '">' . $model['year'] . '</option>';
        }
        return $data;
    }

    /*OBTENER PRECIO DE TOMA PARA EL COTIZADOR DE VEHICULOS*/
    private function getPvp($id, $year, $modelo, $submodelo) {
        $minimo = $id - 10;
        $maximo = $id + 10;

        $criteria = new CDbCriteria(array(
                    'condition' => "id<={$maximo} and id>={$minimo} and year = '{$year}' and modelo='{$modelo}'",
                ));
        $modelos = Marcas::model()->findAll($criteria);
        $data = '';
        foreach ($modelos as $value) {
            $data = $value['pvp'];
        }

        return $data;
    }

}
