<?php

class TrabajaNosotrosController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionCreate() {
        $model = new TrabajaNosotros;
        if (isset($_POST['TrabajaNosotros'])) {
            $model->attributes = $_POST['TrabajaNosotros'];
            $model->fecha = date("Y-m-d G:i:s");
            
            $archivoAdjunto = CUploadedFile::getInstance($model, 'link');
            $fileName = "{$archivoAdjunto}";  // file name
            $model->link = $fileName;
            if ($model->validate()) {
                //die('validate');
//                $model->save();
//                Yii::app()->user->setFlash('create', 'Gracias por enviar tu hoja de vida.');
//                $this->refresh();
                if ($archivoAdjunto != '') {
                    $archivoAdjunto->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/hvs/" . $fileName);
                    $model->save();
                    Yii::app()->user->setFlash('create', 'Gracias por enviar tu hoja de vida.');
                    $this->refresh();
                }
            }
        }
        $this->render('create',array('model'=>$model));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}