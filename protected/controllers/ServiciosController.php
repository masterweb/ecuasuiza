<?php

class ServiciosController extends Controller {

    public $layout = '//layouts/main_cms';

    public function actionIndex() {
        $this->layout = 'main';
        $this->render('index');
    }

    public function actionCreate() {
        $model = new Servicios;
        if (isset($_POST['Servicios'])) {

            $model->attributes = $_POST['Servicios'];
            if ($model->validate()) {
                $model->fecha = date("Y-m-d G:i:s");
                $adjunto = $_POST['adjuntoRadio'];
//                $model->has_foto = $_POST['Servicios']['img_banner'];
//                // si el servicio tiene foto
//                if ($model->has_foto == 1) {
//                    $archivoBanner = CUploadedFile::getInstance($model, 'banner');
//                    $model->banner = $archivoBanner;
//                    $fileNameBanner = "{$archivoBanner}";
//                    $archivoBanner->saveAs(Yii::getPathOfAlias("webroot") . "/img/servicios/" . $fileNameBanner);
//                }
                $model->has_adjuntos = $_POST['adjuntoRadio'];
                if ($adjunto == 'si') {
                    $num_adjuntos = $_POST['Servicios']['num_adjuntos'];

                    switch ($num_adjuntos) {
                        case '1':
                            $archivoAdjunto1 = CUploadedFile::getInstance($model, 'adjunto');
                            //die('adjunto1: '.$archivoAdjunto1);
                            $model->num_adjuntos = $_POST['Servicios']['num_adjuntos'];
                            $model->adjunto = $archivoAdjunto1;
                            $fileName = "{$archivoAdjunto1}";  // file name
                            $fileName = $this->sanear_string($fileName);
                            $archivoAdjunto1->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/servicios/" . $fileName);
                            $model->save();
                            $this->redirect(array('servicios/admin'));
                            break;
                        case '2':
                            $archivoAdjunto1 = CUploadedFile::getInstance($model, 'adjunto');
                            $archivoAdjunto2 = CUploadedFile::getInstance($model, 'adjunto2');
                            $model->num_adjuntos = $_POST['Servicios']['num_adjuntos'];
                            $model->adjunto = $archivoAdjunto1;
                            $model->adjunto2 = $archivoAdjunto2;
                            $fileName = "{$archivoAdjunto1}";
                            $fileName2 = "{$archivoAdjunto2}";
                            $fileName = $this->sanear_string($fileName);
                            $fileName2 = $this->sanear_string($fileName2);
                            $archivoAdjunto1->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/servicios/" . $fileName);
                            $archivoAdjunto2->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/servicios/" . $fileName2);
                            $model->save();
                            $this->redirect(array('servicios/admin'));
                            //die('adjunto1: '.$archivoAdjunto1.'<br>adjunto2: '.$archivoAdjunto2);
                            break;
                        case '3':
                            $archivoAdjunto1 = CUploadedFile::getInstance($model, 'adjunto');
                            $archivoAdjunto2 = CUploadedFile::getInstance($model, 'adjunto2');
                            $archivoAdjunto3 = CUploadedFile::getInstance($model, 'adjunto3');
                            $model->num_adjuntos = $_POST['Servicios']['num_adjuntos'];
                            $model->adjunto = $archivoAdjunto1;
                            $model->adjunto2 = $archivoAdjunto2;
                            $model->adjunto3 = $archivoAdjunto3;
                            $fileName = "{$archivoAdjunto1}";
                            $fileName2 = "{$archivoAdjunto2}";
                            $fileName3 = "{$archivoAdjunto3}";
                            $fileName = $this->sanear_string($fileName);
                            $fileName2 = $this->sanear_string($fileName2);
                            $fileName3 = $this->sanear_string($fileName3);
                            $archivoAdjunto1->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/servicios/" . $fileName);
                            $archivoAdjunto2->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/servicios/" . $fileName2);
                            $archivoAdjunto3->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/servicios/" . $fileName3);
                            $model->save();
                            $this->redirect(array('servicios/admin'));
                            //die('adjunto1: '.$archivoAdjunto1.'<br>adjunto2: '.$archivoAdjunto2.'<br>adjunto3: '.$archivoAdjunto3);
                            break;

                        default:
                            break;
                    }
                } else {
                    $model->save();
                    $this->redirect(array('servicios/admin'));
                }
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $id_seguro = $model->id;

        if (isset($_POST['Servicios'])) {
            $model->attributes = $_POST['Servicios'];
            $model->fecha = date("Y-m-d G:i:s");
            $model->categoria = $_POST['Servicios']['categoria'];
            if ($model->save()) {
                $this->render('admin', array(
                    'model' => $model,
                ));
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
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Servicios::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'articulo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAdmin() {
        $model = new Servicios;
        $this->render('admin', array('model' => $model));
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

?>
