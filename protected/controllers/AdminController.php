<?php

class AdminController extends Controller {
    
    public $layout='//layouts/main_cms';

    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = '//layouts/main_cms';
        $model = new LoginForm;
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

}

?>
