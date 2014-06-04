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

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create', 'admin', 'update', 'delete', 'adjuntar'),
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

    public function actionAdmin() {
        $this->layout = '//layouts/main_cms';
        $model = new Seguros('search');
        $model->unsetAttributes();
        $this->render('admin', array('model' => $model,));
    }

    public function actionUpdate($id) {
        $this->layout = '//layouts/main_cms';
        $model = $this->loadModel($id);
        $id_seguros = $model->id;

        if (isset($_POST['Seguros'])) {
            $model->attributes = $_POST['Seguros'];
            $model->link_img = $_POST['Seguros']['link_img'];
            //$this->updateOrder();
            if ($model->save())
                $this->redirect(array('admin'));
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

//    public function getSubSecciones($id) {
//        $subseccion = Subcategorias::model()->findAllByAttributes(array("id_categoria" => $id), array('order' => 'posicion'));
//
//        $ss = '';
//        switch ($id) {
//            case 1:
//                $seguros = Seguros::model()->findAll(array('order' => 'categoria'));
//                $ss = "<ul class='seguros-ind'>";
//                foreach ($seguros as $s) {
//                    if (($s['categoria'] == 'hogar') || ($s['categoria'] == 'auto') || ($s['categoria'] == 'vida')):
//                        $ss.= '<li><a href="' . Yii::app()->createUrl('/seguros/individuales', array('id' => $s['id'])) . '">' . $s['title'] . '</a></li>';
//                    endif;
//                }
//                $ss .= '</ul>';
//                break;
//            case 2:
//                $ss = "<ul class='sub-empresariales'>";
//                $condition = 'categoria ="empresarial"';
//
//                $criteria = new CDbCriteria(array(
//                            'condition' => $condition,
//                            'order' => 'title ASC'
//                        ));
//
//                $segurosEmp = Seguros::model()->findAll($criteria);
//                $resultado = count($segurosEmp);
//                $numFilas = ceil($resultado / 2);
//                //echo $numFilas;
//                $condition = 'categoria ="empresarial"';
//                $limit = $numFilas;
//                $offset = 0;
//
//                $criteria2 = new CDbCriteria(array(
//                            'condition' => $condition,
//                            'limit' => $limit,
//                            'offset' => $offset,
//                            'order' => 'title ASC'
//                        ));
//
//                $segurosEmp = Seguros::model()->findAll($criteria2);
//
//                $ss .= '<p class="column-emp">';
//                foreach ($segurosEmp as $se) {
//                    if ($se['categoria'] == 'empresarial'):
//                        $ss .= '<a href="' . Yii::app()->createUrl('/seguros/empresariales', array('id' => $se['id'])) . '">' . $se['title'] . '</a>';
//                    endif;
//                }
//                $ss .= '</p>';
//
//                $condition = 'categoria ="empresarial"';
//                $limit = $resultado;
//                $offset = $numFilas;
//                $criteria2 = new CDbCriteria(array(
//                            'condition' => $condition,
//                            'limit' => $limit,
//                            'offset' => $offset,
//                            'order' => 'title ASC'
//                        ));
//
//                $segurosEmp = Seguros::model()->findAll($criteria2);
//
//                $ss .= '<p class="column-emp">';
//                foreach ($segurosEmp as $se) {
//                    if ($se['categoria'] == 'empresarial'):
//                        $ss .= '<a href="' . Yii::app()->createUrl('/seguros/empresariales', array('id' => $se['id'])) . '">' . $se['title'] . '</a>';
//                    endif;
//                }
//                $ss .= '</p>';
//                $ss .= '</ul>';
//
//                break;
//            case 3:
//
//                break;
//            case 4:
//
//                break;
//
//            default:
//                break;
//        }
//        
//        return $ss;
//    }
}

?>
