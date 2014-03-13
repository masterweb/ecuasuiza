<?php

class MultimediaController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionBusqueda() {
        $this->render('buscador');
    }

    public function actionTest() {
        $this->render('test');
    }

    public function getArrayDir($path) {
        $array = array();
        $obj = array();
        $dir = dir($path);
        while ($elemento = $dir->read()) {
            if ($elemento != '..' && $elemento != '.') {
                $obj['folder'] = $elemento;
                $withoutextension = $elemento;
                if (strpos($elemento, '.') !== false)
                    $withoutextension = substr($elemento, 0, strpos($elemento, '.'));
                $resource = Resource::model()->findByAttributes(array('folder_resource' => $withoutextension));
                $obj['name_resource'] = $resource['name_resource'];
                $array[] = $obj;
            }
        }
        return $array;
    }

    public function getTypeResource() {
        $allType = TypeResource::model()->findAll(array(
            'select' => 'id_type_resource,name_type_resource',
            'order' => 'name_type_resource'
                ));
        $html = "<select>";
        foreach ($allType as $t) {
            $html = $html . "<option value='{$t['id_type_resource']}'>" . $t['name_type_resource'] . "</option>";
        }
        $html .= "</select>";
        return $html;
    }

    public function urlUpdate($name) {
        $url = $name;
        if (strpos($name, 'audio') !== false) {
            $url = CController::createUrl('audio/update', array('id' => $name));
        } else if (strpos($name, 'video') !== false) {
            $url = CController::createUrl('video/update', array('id' => $name));
        } else if (strpos($name, 'pdf') !== false) {
            $url = CController::createUrl('pdf/update', array('id' => $name));
        } else if (strpos($name, 'swf') !== false) {
            $url = CController::createUrl('swf/update', array('id' => $name));
        } else if (strpos($name, 'imagenes') !== false) {
            $url = CController::createUrl('image/update', array('id' => $name));
        }
        return $url;
    }

    public function urlDelete($name) {
        $url = $name;
        if (strpos($name, 'audio') !== false) {
            $url = CController::createUrl('audio/delete', array('id' => $name));
        } else if (strpos($name, 'video') !== false) {
            $url = CController::createUrl('video/delete', array('id' => $name));
        } else if (strpos($name, 'pdf') !== false) {
            $url = CController::createUrl('pdf/delete', array('id' => $name));
        } else if (strpos($name, 'swf') !== false) {
            $url = CController::createUrl('swf/delete', array('id' => $name));
        } else if (strpos($name, 'imagenes') !== false) {
            $url = CController::createUrl('image/delete', array('id' => $name));
        }
        return $url;
    }

    public function getNameModel($name) {
        $return = $name;
        if (strpos($name, 'audio') !== false) {
            $return = 'audio';
        } else if (strpos($name, 'video') !== false) {
            $return = 'video';
        } else if (strpos($name, 'pdf') !== false) {
            $return = 'pdf';
        } else if (strpos($name, 'swf') !== false) {
            $return = 'swf';
        } else if (strpos($name, 'imagenes') !== false) {
            $return = 'imagenes';
        }
        return $return;
    }

    public function generateEmbedded($name) {
        $label = $this->getNameModel($name);
        if ($label == "imagenes" || $label == "video" || $label == "swf") {
            if ($label == "video") {
                $msg = "{" . $label . " w=xxx%}" . $name . "{-" . $label . "} <br /> reemplazar xxx% por el porcentaje del ancho. <br />";
                $msg .= "<b> Para ingresarlo como video en una subseccion copie en ubicacion </b> {$name}";
                return $msg;
            }else
                return "{" . $label . " w=xxx%}" . $name . "{-" . $label . "} <br /> reemplazar xxx% por el porcentaje del ancho.";
        }
        else
            return "{" . $label . "}" . $name . "{-" . $label . "}";
    }

    public function actionGetInfo() {
        $temp = $_REQUEST['str'];
        $array = explode(".", $temp);
        $str = $array[0];
        $a = array();
        $res = Resource::model()->findByAttributes(array('folder_resource' => $str));
        if ($res) {
            $update = $this->urlUpdate($res['folder_resource']);
            $delete = $this->urlDelete($res['folder_resource']);
            $a['update'] = $update;
            $a['delete'] = $delete;
            $a['name'] = $res['name_resource'];
            $a['name_real'] = $res['name_real'];
            $a['account'] = $res['account'];
            $a['codigo'] = $this->generateEmbedded($res['folder_resource']);
            $a['success'] = true;
        } else {
            $a['success'] = false;
            $a['message'] = $str;
        }
        echo json_encode($a);
    }

    public function getClassCSS($type) {
        $return = $this->getNameModel($type);
        if ($return == 'audio')
            $return = 'mp3.jpg';
        if ($return == 'video')
            $return = 'videos.jpg';
        if ($return == 'swf')
            $return = 'swf.png';
        if ($return == 'pdf')
            $return = 'pdf.png';

        return $return;
    }

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
//    public function accessRules() {
//        return array(
//            array('allow', // allow all users to perform 'index' and 'view' actions
//                'actions' => array('test'),
//                'users' => array('*'),
//            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('index', 'getInfo', 'busqueda', ''),
//                'users' => array('@'),
//            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array(),
//                'users' => array('admin'),
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
//            ),
//        );
//    }

}