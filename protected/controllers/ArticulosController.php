<?php

class ArticulosController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/main_cms';

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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','create','admin','update','delete','adjuntar'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

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
        $model = new Articulos;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Articulos'])) {
            $model->attributes = $_POST['Articulos'];
            $model->fecha = date("Y-m-d");
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_articulos));
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

        if (isset($_POST['Articulos'])) {
            $model->attributes = $_POST['Articulos'];
            if ($model->save())
                $this->redirect(array('articulos/admin'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }
    
    // adjuntar una foto thumb a la noticia
    public function actionAdjuntar($id){
        
        $model = new Articulos;
        if (isset($_POST['Articulos'])) {
            die('articulos');
        }
        $this->render('adjuntar', array(
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
        $this->layout = 'main';
        $dataProvider = new CActiveDataProvider('Articulos');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Articulos('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Articulos']))
            $model->attributes = $_GET['Articulos'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Articulos the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Articulos::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Articulos $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'articulos-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    // fecha en formato humano
    public function getFecha($fecha){
        $params = explode("-", $fecha);
        //print_r($params);
        $year = $params[0];
        $mes = $params[1];
        $dia = $params[2];
        
        switch ($mes) {
            case 01:
                $mesH = 'enero';
                break;
            case 02:
                $mesH = 'febrero';
                break;
            case 03:
                $mesH = 'marzo';
                break;
            case 04:
                $mesH = 'abril';
                break;
            case 05:
                $mesH = 'mayo';
                break;
            case 06:
                $mesH = 'junio';
                break;
            case 07:
                $mesH = 'julio';
                break;
            case 08:
                $mesH = 'agosto';
                break;
            case 09:
                $mesH = 'septiembre';
                break;
            case 10:
                $mesH = 'octubre';
                break;
            case 11:
                $mesH = 'noviembre';
                break;
            case 12:
                $mesH = 'diciembre';
                break;
            

            default:
                break;
        }
        
        $fechaString = $dia.' de '.$mesH.' del '.$year;
        return $fechaString;
    }

}
