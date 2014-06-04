<?php

class AdminController extends Controller {

    public $layout = '//layouts/main_cms';

    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = '//layouts/main_cms';
        $model = new LoginForm;
        //$comprobar = TblUser::model()->find('username=:username AND password=:password', array(':username' => $this->username, ':password' => md5($this->password)));
        //die('comprobar: '.$comprobar->user_level);
        if (isset($_POST['LoginForm'])) {
            // collects user input data
            $model->attributes = $_POST['LoginForm'];
            // validates user input and redirect to previous page if validated
            if ($model->validate())
                $this->redirect($this->createUrl('cms/index'));
        }
        // displays the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLoginEditor() {
        $this->layout = '//layouts/main';
        $model = new LoginForm;
        //$comprobar = TblUser::model()->find('username=:username AND password=:password', array(':username' => $this->username, ':password' => md5($this->password)));
        //die('comprobar: '.$comprobar->user_level);
        
        if (isset($_POST['LoginForm'])) {
            $model2 = new TblUser;
            $comprobar = TblUser::model()->find('username=:username AND password=:password', array(':username' => $_POST['LoginForm']['username'], ':password' => md5($_POST['LoginForm']['password'])));
            if ($comprobar != NULL) {
                if ($comprobar->email == '') {
                    //$this->render('register', array('model' => $model2));
                    $this->redirect($this->createUrl('admin/loginEditor', array('id' => $comprobar->id)));
                } else {
                    $model->attributes = $_POST['LoginForm'];
                    // validates user input and redirect to previous page if validated
                    if ($model->validate()) {
                        $this->redirect($this->createUrl('/informacion/index', array('id' => 26)));
                    }
                }
            }
            // collects user input data
        }
        // displays the login form
        $this->render('register');
    }

    public function actionUpdateEditor() {
        //die('enter update: '.$_POST['TblUser']['id']);
        $model = new LoginForm;
        $this->layout = '//layouts/main';
         if (isset($_POST['TblUser'])) {
            $sql = "UPDATE tbl_user SET email = '{$_POST['TblUser']['email']}', 
                pregunta_secreta = '{$_POST['TblUser']['pregunta_secreta']}',
                respuesta_secreta = '{$_POST['TblUser']['respuesta_secreta']}'    
                        WHERE id={$_POST['TblUser']['id']}";
            //            die('sql: '.$sql);
            $connection=Yii::app()->db;                 
            $command = $connection->createCommand($sql);
            $rowCount=$command->execute();   // execute the non-query SQL
            yii::app()->user->setState("isEditorUser", true);
            $this->redirect($this->createUrl('/informacion/index', array('id' => 26)));
        }
        // displays the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Articulos the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TblUser::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}

?>
