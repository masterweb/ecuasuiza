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
            require_once 'email/mail_func.php';
            $model->attributes = $_POST['Contactenos'];
            $model->fecha = date("Y-m-d G:i:s");
            if ($model->validate()) {
                $model->save();
                $body = '<table border=0>
                            <tr><td><b>Formulario enviado desde la página de contáctanos :</b></td></tr>
                            <tr><td><b>Nombres:</b></td><td>' . $_POST['Contactenos']['nombres'] . '</td></tr>
                            <tr><td><b>Apellidos:</b></td><td>' . $_POST['Contactenos']['apellidos'] . '</td></tr>
                            <tr><td><b>Provincia:</b></td><td>' . $this->getProvincia($_POST['Contactenos']['provincia']) . '</td></tr>
                            <tr><td><b>Ciudad:</b></td><td>' . $this->getCiudad($_POST['Contactenos']['ciudad']) . '</td></tr>
                            <tr><td><b>Tema de Contacto:</b></td><td>' . $this->sanear_string($_POST['Contactenos']['tema']) . '</td></tr>
                            <tr><td><b>Teléfono:</b></td><td>' . $_POST['Contactenos']['telefono'] . '</td></tr>
                            <tr><td><b>Celular:</b></td><td>' . $_POST['Contactenos']['celular'] . '</td></tr>
                            <tr><td><b>Email:</b></td><td>' . $_POST['Contactenos']['email'] . '</td></tr> 
                            <tr><td><b>Comentarios:</b></td><td>' . $_POST['Contactenos']['comentarios'] . '</td></tr>
                            </table>';
                $codigohtml = $body;
                $headers = 'From: jorge.rodriguez@ariadna.com.ec' . "\r\n";
                $headers .= 'Content-type: text/html' . "\r\n";

                $asunto = 'Formulario enviado desde Ecuasuiza Ecuador';
                if (sendEmailFunction('jorge.rodriguez@ariadna.com.ec', "Ecuasuiza", 'servicioalcliente@ecuasuiza.ec', html_entity_decode($asunto), $codigohtml, 'utf-8')) {
                    // $email = 'servicioalcliente@ecuasuiza.ec';
                    Yii::app()->user->setFlash('contactenos', 'Gracias por contactarse con nosotros. Le responderemos lo más pronto posible');
                    $this->refresh();
                }
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
        $this->redirect($this->createUrl('site/index'));
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

    public function actionGetUserPassword() {
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";
        $password = md5($password);

        $criteria = new CDbCriteria(array(
                    'condition' => "username='{$username}' AND password='{$password}'"
                ));
        $data = TblUser::model()->find($criteria);
        if ($data === null) {
            $val = false;
        } else {
            $val = true;
        }

        $options = array('validate' => $val);
        echo json_encode($options);
    }

    public function actionGetnoticias() {
        $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : "";
        $criteria = new CDbCriteria(array('condition' => 'categoria="news"', 'order' => 'fecha DESC'));

        $noticias = Articulos::model()->findAll($criteria);
        $data = '<option value="">--Seleccione una noticia--</option>';
        foreach ($noticias as $value) {
            $data .= '<option value="'.$value['id_articulos'].'">'.$value['title'].'</option>';
        }
        $options = array('options' => $data);
        echo json_encode($options);
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
            "+"), ' ', $string
        );


        return $string;
    }

    private function getProvincia($idProvincia) {
        //$sql = "SELECT id, modelo, submodelo FROM tbl_marcas WHERE marca='{$modeloAuto}' GROUP BY submodelo ORDER BY modelo";

        $criteria = new CDbCriteria(array(
                    'condition' => "id_provincia='{$idProvincia}'"
                ));
        $provincia = Provincias::model()->findAll($criteria);
        $data = '';
        foreach ($provincia as $prov) {
            $data = $prov['nombre'];
        }
        return $data;
    }

    private function getCiudad($idCiudad) {
        $criteria = new CDbCriteria(array(
                    'condition' => "id_ciudad='{$idCiudad}'"
                ));
        $ciudades = Ciudades::model()->findAll($criteria);
        $data = '';
        foreach ($ciudades as $ciud) {
            $data = $ciud['nombre'];
        }
        return $data;
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
//                $servicios = Servicios::model()->findAll();
//                $ss .= '<ul>
//                <li><a href = "http://secure.ecuasuiza.ec/ecuasuiza/SoloPortal_Logon.asp" target = "_blank">Transporte Online</a></li>
//                <li><a href = "' . Yii::app()->createUrl('/site/suizamovil') . '">Suiza Móvil Plus</a></li>
//                <li><a href = "' . Yii::app()->createUrl('/servicios/index', array('id' => 6)) . '">Reclamos</a>';
//
//                foreach ($servicios as $s) {
//                    if ($s['categoria'] == 'reclamos'):
//                        $ss .= '<li><a href="' . Yii::app()->createUrl('/servicios/index', array('id' => $s['id'])) . '">' . $s['title'] . '</a></li>';
//                    endif;
//                }
//                $ss .= '</li></ul>';
//                break;
//            case 4:
//                $ss = '<ul>
//                            <li><a href="' . Yii::app()->createUrl('/noticias/') . '">Noticias</a></li>
//                            <li><a href="' . Yii::app()->createUrl('/informacion/index', array('cat' => 'programaEducacion')) . '">Programa de Educación Financiera</a></li>
//                            <li>
//                                <a href="' . Yii::app()->createUrl('/informacion/index', array('cat' => 'gobiernoCorporativo')) . '">Gobierno Corporativo</a>
//
//                            </li>
//                            <li><a href="#" class="no-link">Ley de Transparencia</a>
//                                <ul>
//                                    <li><a href="' . Yii::app()->createUrl('/informacion/index', array('subcat' => 'informacionFinanciera')) . '">Información Financiera</a></li>
//                                    <li><a href="' . Yii::app()->createUrl('/informacion/index', array('subcat' => 'indicadoresServicioCliente')) . '">Indicadores de Servicio al Cliente</a></li>';
//                if (!Yii::app()->user->isEditorUser()):
//                    $ss .= '<a href="#inline1" class="fancybox">Información de accionistas</a>';
//                else:
//                    $ss .= '<li><a href="' . Yii::app()->createUrl('/informacion/index', array('subcat' => 'informacionAccionistas')) . '">Información de accionistas </a></li>';
//                endif;
//
//                $ss .= '</ul>
//                            </li>
//                            <li><a href="' . Yii::app()->createUrl('/informacion/index', array('cat' => 'lavadoActivos')) . '">Lavado de Activos</a>
//                            </li>
//                            <li><a href="' . Yii::app()->createUrl('/informacion/index', array('cat' => 'glosario')) . '">Glosario de Términos</a></li>
//                            <li><a href="' . Yii::app()->createUrl('/informacion/index', array('cat' => 'preguntasFrecuentes')) . '">Preguntas Frecuentes</a></li>
//                        </ul>';
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