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
        $model = new Seguros('search');
        $this->render('index', array('model' => $model,));
    }

    public function actionCreate() {
        $model = new Seguros;

        //$this->performAjaxValidation($model);
        if (isset($_POST['Seguros'])) {
            //die('enter create');
            $model->attributes = $_POST['Seguros'];

            $model->fecha = date("Y-m-d G:i:s");
            $model->img_banner = $_POST['Seguros']['img_banner'];
            $model->categoria = $_POST['Seguros']['categoria'];

            $archivoBanner = CUploadedFile::getInstance($model, 'link_img');
            if ($archivoBanner != '' && !$archivoBanner->getHasError()) {
                $fileName = "{$archivoBanner}";
                $model->link_img = $fileName;
                $archivoBanner->saveAs(Yii::getPathOfAlias("webroot") . "/img/seguros/" . $fileName);
            }
            
            if ($model->save()) {
                $this->redirect(array('seguros/admin'));
            }


//            if ($model->img_banner == 'Si') {
//                $archivoBanner = CUploadedFile::getInstance($model, 'link_img');
//                //die('archivo: '.$archivoBanner);
//                $fileName = "{$archivoBanner}";  // file name
//                $fileName2 = "{$archivoAdjunto}"; // archivo adjunto
//
//                if ($archivoBanner != '' && $archivoAdjunto != '') {
//                    if (!$archivoBanner->getHasError() && !$archivoAdjunto->getHasError()) {
//                        $model->link_img = $fileName;
//                        $model->link_attachment = $fileName2;
//                        if ($model->save()) {
//                            $archivoBanner->saveAs(Yii::getPathOfAlias("webroot") . "/img/seguros/" . $fileName);
//                            $archivoAdjunto->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/" . $fileName2);
//                            $this->redirect(array('seguros/admin'));
//                        } else {
//                            echo 'registro no grabado';
//                            //print_r($model->getErrors());
//                        }
//                    }
//                } else {
//                    $model->save();
//                    $this->redirect(array('cms/list'));
//                }
//                if ($archivoBanner != '') {
//                    if (!$archivoBanner->getHasError()) {
//                        $model->link_img = $fileName;
//                        if ($model->save()) {
//                            $archivoBanner->saveAs(Yii::getPathOfAlias("webroot") . "/img/seguros/" . $fileName);
//                            $this->redirect(array('seguros/admin'));
//                        } else {
//                            echo 'registro no grabado';
//                            //print_r($model->getErrors());
//                        }
//                    }
//                }
//            } else {
//                $fileName2 = "{$archivoAdjunto}"; // archivo adjunto
//                if ($archivoAdjunto != '') {
//                    if (!$archivoAdjunto->getHasError()) {
//                        $model->link_attachment = $fileName2;
//
//                        if ($model->save()) {
//                            $archivoAdjunto->saveAs(Yii::getPathOfAlias("webroot") . "/img/seguros" . $fileName2);
//                            //$archivoAdjunto->saveAs(Yii::app()->basePath . '/docs/' . $fileName2);
//                            $this->redirect(array('seguros/admin'));
//                        } else {
//                            echo 'registro no grabado';
//                        }
//                    }
//                } else {
//                    //die('enter no attachment');
//                    if ($model->save()) {
//                        $this->redirect(array('seguros/admin'));
//                    }
//                }
//            }
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $id_seguro = $model->id;

        //$this->performAjaxValidation($model);
        if (isset($_POST['Seguros'])) {

            $model->attributes = $_POST['Seguros'];
            $model->fecha = date("Y-m-d G:i:s");
            $model->categoria = $_POST['Seguros']['categoria'];
            $archivoBanner = CUploadedFile::getInstance($model, 'link_img');
            //die('archivoadjunto: '.$archivoAdjunto.' <br>archivobanner: '.$archivoBanner);
            if (($archivoBanner != '') && !$archivoBanner->getHasError()){
                $model->img_banner = $_POST['Seguros']['link_img'];
                $fileName = "{$archivoBanner}"; 
                $model->link_img = $fileName;
                $archivoBanner->saveAs(Yii::getPathOfAlias("webroot") . "/img/seguros/" . $fileName);
                $model->save();
                $this->redirect(array('cms/list'));
            }else{
                $model->save();
                $this->redirect(array('cms/list'));
            }

//            if (($archivoAdjunto != '') && ($archivoBanner != '')) {
//                //die('archivoadjunto archivobanner not empty');
//                $model->img_banner = $_POST['Seguros']['link_img'];
//                $fileName = "{$archivoBanner}";  // file name
//                $model->tipo_attachment = $_POST['Seguros']['tipo_attachment'];
//                $fileName2 = "{$archivoAdjunto}"; // archivo adjunto
//                $model->link_img = $fileName;
//                $model->link_attachment = $fileName2;
//
//                if (!$archivoBanner->getHasError() && !$archivoAdjunto->getHasError()) :
//                    $archivoBanner->saveAs(Yii::getPathOfAlias("webroot") . "/img/seguros/" . $fileName);
//                    $archivoAdjunto->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/" . $fileName2);
//                endif;
//
//                // actualizar datos
//                $model->save();
//                $this->redirect(array('cms/list'));
//            }
//            if (($archivoAdjunto == '') && ($archivoBanner != '')):
//                //$model->img_banner = $_POST['Seguros']['link_img'];
//                $fileName = "{$archivoBanner}";  // file name
//                $model->link_img = $fileName;
//                $model->link_attachment = $_POST['Seguros']['link_attachment_ready'];
//                $model->tipo_attachment = $_POST['Seguros']['tipo_attachment_ready'];
//
//                if (!$archivoBanner->getHasError()):
//                    $archivoBanner->saveAs(Yii::getPathOfAlias("webroot") . "/img/seguros/" . $fileName);
//                endif;
//                //
//                // actualizar datos
//                $model->save();
//                $this->redirect(array('cms/list'));
//            endif;
//            if (($archivoAdjunto != '') && ($archivoBanner == '')):
//                $model->tipo_attachment = $_POST['Seguros']['tipo_attachment'];
//                $fileName2 = "{$archivoAdjunto}"; // archivo adjunto
//                $model->link_attachment = $fileName2;
//                $model->link_img = $_POST['Seguros']['link_img_ready'];
//                //
//                if (!$archivoAdjunto->getHasError()):
//                    $archivoAdjunto->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/" . $fileName2);
//                endif;
//                // actualizar datos
//                $model->save();
//                $this->redirect(array('cms/list'));
//            endif;
//
//            if (($archivoAdjunto == '') && ($archivoBanner == '')) {
//                //die('archivoadjunto empty');
//                // solo actualiza campos de texto y desplegables
//                $model->link_img = $_POST['Seguros']['link_img_ready'];
//                $model->link_attachment = $_POST['Seguros']['link_attachment_ready'];
//                $model->tipo_attachment = $_POST['Seguros']['tipo_attachment_ready'];
//                //die('linkimg: '.$model->link_img.'<br>link attachment: '.$model->link_attachment);
//                $model->save();
//                $this->redirect(array('cms/list'));
//            }
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
        $model = Seguros::model()->findByPk($id);
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

}

?>
