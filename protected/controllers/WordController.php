<?php

class WordController extends Controller {

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
//                'actions' => array('index', 'view'),
//                'users' => array('*'),
//            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('create', 'update', 'delete'),
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

    public function getNumActual($type) {
        $c = Resource::model()->countByAttributes(array("type_resource" => $type));
        return $c + 1;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Word;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Word'])) {
            $model->attributes = $_POST['Word'];
            if ($model->validate()) {
                $fword = CUploadedFile::getInstance($model, 'word');
                if ($fword == "" || $fword->getHasError()) {
                    $model->addError('word', 'Error en archivo word');
                } else {
                    if (isset($_POST['Word']['subcategoria'])) {
                        $model->subcategoria = $_POST['Word']['subcategoria'];
                    }
                    $name_real = $fword->getName();
                    $actual = $this->getNumActual(6);
                    $folder = "word{$actual}";
//                    $path = Yii::app()->params['folder'] . "/pdf/" . $folder;
//                    $model->pdf = $path . "." . $fpdf->extensionName;
//                    $fpdf->saveAs($model->pdf);
                    $fileName = "{$fword}";  // file name
                    $fileName = $this->sanear_string($fileName);
                    $model->word = $fileName;
                    $fword->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/word/" . $fileName);
                    $model->name_real = $folder;
                    $res = new Resource;
                    $res->type_resource = 4;
                    $res->name_resource = $model->name;
                    $res->folder_resource = $folder;
                    $res->date_register = date("Y-m-d H:i:s");
                    $res->account = 4;
                    $res->name_real = $name_real;
                    $res->save();
                    if ($model->save()) {
                        $this->redirect(array('word/admin'));
//                        Yii::app()->user->setFlash('create', 'Archivo subido exitosamente.');
//                        $this->refresh();
                    }
                }
            }
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
        $name_temp = $model->name_real;
        $file = $model->pdf;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pdf'])) {
            $model->attributes = $_POST['Pdf'];
            $fpdf = CUploadedFile::getInstance($model, 'pdf');
            if ($fpdf == "" || $fpdf->getHasError()) {
                $model->name_real = $name_temp;
                if ($model->save()) {
                    Resource::model()->updateResource($model->name_real, $model, false, '');
                    $this->redirect(array('multimedia/index'));
                }
            } else {
                $name_real = $fpdf->getName();
                $path = Yii::app()->params['folder'] . "/pdf/" . $name_temp;
                $model->pdf = $file;
                $fpdf->saveAs($model->pdf);
                Resource::model()->updateResource($model->name_real, $model, true, $name_real);
                if ($model->save())
                    $this->redirect(array('multimedia/index'));
            }
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
        $model = $this->loadModel($id);
        unlink($model->pdf);
        $this->loadModel($id)->delete();
        $this->redirect(array('multimedia/index'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Pdf');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Word('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Word']))
            $model->attributes = $_GET['Word'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Pdf::model()->findByAttributes(array('name_real' => $id));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pdf-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
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
            "+", " "), '_', $string
        );


        return $string;
    }

}
