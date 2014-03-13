<?php

class SegurosController extends Controller {

    //public $layout = '//layouts/main_cms';

    public function actionIndex() {
        $this->render('index');
    }

    public function actionEmpresariales() {
        $this->render('empresariales');
    }

    public function actionIndividuales() {
        $this->render('individuales');
    }

    public function actionAdmin() {
        $model = new Seguros('search');
        $model->unsetAttributes();
        $this->render('admin', array('model' => $model,));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $id_seguros = $model->id;

        if (isset($_POST['Seguros'])) {
            $model->attributes = $_POST['Seguros'];
            //$this->updateOrder();
            if ($model->save())
                $this->redirect(array('admin'));
        }
        $this->render('update', array(
            'model' => $model,
        ));
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

}

?>
