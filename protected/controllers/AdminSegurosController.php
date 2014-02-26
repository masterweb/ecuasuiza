<?php

class AdminSegurosController extends Controller {

    public $layout = '//layouts/main_cms';

    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Displays the login page
     */
    public function actionHogar() {
        $model = new Seguros;
        $this->layout = '//layouts/main_cms';
        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {
        $model = new Seguros;
        
        //$this->performAjaxValidation($model);
        if (isset($_POST['Seguros'])) {

            $model->attributes = $_POST['Seguros'];

            $archivoAdjunto = CUploadedFile::getInstance($model, 'link_attachment');
            $model->fecha = date("Y-m-d G:i:s");
            $model->img_banner = $_POST['Seguros']['img_banner'];

            if ($model->img_banner == 'Si') {
                $archivoBanner = CUploadedFile::getInstance($model, 'link_img');
                $fileName = "{$archivoBanner}";  // file name
                $fileName2 = "{$archivoAdjunto}"; // archivo adjunto

                if ($archivoBanner != '' && $archivoAdjunto != '') {
                    if (!$archivoBanner->getHasError() && !$archivoAdjunto->getHasError()) {
                        $model->link_img = $fileName;
                        $model->link_attachment = $fileName2;
                        if ($model->save()) {
                            $archivoBanner->saveAs(Yii::getPathOfAlias("webroot")."/img/seguros/".$fileName);
                            $archivoAdjunto->saveAs(Yii::getPathOfAlias("webroot")."/uploads/".$fileName2);
//                            $archivoBanner->saveAs(Yii::app()->basePath . '/docs/' . $fileName);
//                            $archivoAdjunto->saveAs(Yii::app()->basePath . '/docs/' . $fileName2);
                            $this->redirect(array('adminseguros/hogar'));
                        } else {
                            echo 'registro no grabado';
                        }
                    }
                } else {
                    $model->save();
                    $this->redirect(array('adminseguros/hogar'));
                }
            }else{
                $fileName2 = "{$archivoAdjunto}"; // archivo adjunto
                if ($archivoAdjunto != '') {
                    if (!$archivoAdjunto->getHasError()) {
                        $model->link_attachment = $fileName2;
                        
                        if ($model->save()) {
                            $archivoAdjunto->saveAs(Yii::getPathOfAlias("webroot")."/img/seguros".$fileName2);
                            //$archivoAdjunto->saveAs(Yii::app()->basePath . '/docs/' . $fileName2);
                            $this->redirect(array('adminseguros/hogar'));
                        } else {
                            echo 'registro no grabado';
                        }
                    }
                }
            }
            
        }
        
        $this->render('index', array(
            'model' => $model,
        ));
    }
    
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'articulo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

?>
