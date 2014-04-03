<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
            'yiichat' => array('class' => 'YiiChatAction'),
        );
    }

    public function actionChat() {
        $this->render('chat');
    }

    public function actionCotizador() {
        $this->render('cotizador');
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreatecotizador() {
        $model = new Cotizador;
        //die('cotizador');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cotizador'])) {
            //die('insert');

            $model->attributes = $_POST['Cotizador'];
            if ($model->save()) {
                //Yii::app()->user->setFlash('cotizadorinfo', 'Gracias por contactarse con nosotros. Le responderemmos lo más pronto posible');
                //$this->refresh();
                $this->render('cotizadorinfo');
            }
        }

        $this->render('cotizadorinfo', array(
            'model' => $model,
        ));
    }

    /**
     * Displays the contact page
     */
    public function actionContactenos() {
        $model = new Contactenos;
        if (isset($_POST['Contactenos'])) {
            $model->attributes = $_POST['Contactenos'];
            $model->fecha = date("Y-m-d G:i:s");
            if ($model->validate()) {
                $model->save();
//                $name = '=?UTF-8?B?' . base64_encode($model->nombres) . '?=';
//                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
//                $headers = "From: $name <{$model->email}>\r\n" .
//                        "Reply-To: {$model->email}\r\n" .
//                        "MIME-Version: 1.0\r\n" .
//                        "Content-Type: text/plain; charset=UTF-8";
//
//                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contactenos', 'Gracias por contactarse con nosotros. Le responderemos lo más pronto posible');
                $this->refresh();
            }
        }
        $this->render('contactenos', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionBusqueda() {

        $txt = "";
        if (isset($_POST['buscar'])) {
            $txt = $_POST['buscar'];


            $sql = "SELECT id, title, desc_min, categoria 
                    FROM tbl_seguros WHERE title LIKE '%{$txt}%' OR desc_min LIKE '%{$txt}%'";
            $documento = Seguros::model()->findAllBySQL($sql);


//            $sql = "SELECT id_documento, id_salaprensa, url_documento, extension, fecha, `open`, name_file, tags
//FROM tbl_documento_salaprensa WHERE tags LIKE '%{$txt}%' OR name_file LIKE '%{$txt}%'";
//            $documentosp = DocumentoSalaprensa::model()->findAllBySQL($sql);

            $sql = "SELECT id_articulos, title, desc_min, categoria, contenido
                FROM tbl_articulos WHERE title LIKE '%{$txt}%' OR desc_min LIKE '%{$txt}%' OR contenido LIKE '%{$txt}%'";
            $articulo = Articulos::model()->findAllBySQL($sql);

//            $sql = "SELECT id_actualidad,texto_actualidad,num_order,titulo,subtitulo,descripcionSEO,titleSEO,keywords FROM tbl_actualidad
//					WHERE texto_actualidad LIKE '%{$txt}%' OR titulo LIKE '%{$txt}%' OR subtitulo LIKE '%{$txt}%'";
//            $actualidad = Actualidad::model()->findAllBySQL($sql);
//
//            $sql = "SELECT id_video, id_subseccion, type_video, url_video, name_video, description_video
//					FROM tbl_subseccion_video
//					WHERE description_video LIKE '%{$txt}%' OR name_video LIKE '%{$txt}%'";
//            $video = SubseccionVideo::model()->findAllBySQL($sql);

            /* $articulo = Articulo::model()->findAll();		 */
            //,'documentosp'=>$documentosp, 'articulo'=>$articulo
            //$this->render('busqueda', array('search' => $txt, 'documento' => $documento, 'documentosp' => $documentosp, 'articulo' => $articulo, 'actualidad' => $actualidad, 'video' => $video));
            $this->render('busqueda', array('search' => $txt, 'documento' => $documento, 'articulo' => $articulo));
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect($this->createUrl('admin/login'));
    }

    public function actionNosotros() {
        $model = new Articulos;
        $this->render('nosotros', array('model' => $model));
    }

    public function actionReaseguradores() {
        $model = new Articulos;
        $this->render('reaseguradores', array('model' => $model));
    }

    public function actionProyectos() {
        $model = new Articulos;
        $this->render('proyectos', array('model' => $model));
    }

    public function actionSuizamovil() {
        $this->render('suizamovil');
    }

    public function actionMisionvision() {
        $this->render('misionvision');
    }

    public function actionOficinas() {
        $model = new Articulos;
        $this->render('oficinas', array('model' => $model));
    }

}