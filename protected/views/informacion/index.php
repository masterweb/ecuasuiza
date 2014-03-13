<?php
$idcat = 0;
if (isset($_GET['cat'])) {
    $idcat = $_GET['cat'];
    //echo 'categoria: '.$idcat;
    $condition = "categoria ='{$idcat}'";
    switch ($idcat) {
        case 'noticias':
            $title = 'Noticias';
            break;
        case 'programaEducacion':
            $title = 'Programa de Educación';
            break;
        case 'glosario':
            $title = 'Glosario de Términos';
            break;
        case 'preguntasFrecuentes':
            $title = 'Preguntas Frecuentes';
            break;

        default:
            break;
    }
}

$idSubCat = 0;
if (isset($_GET['subcat'])) {
    $idcat = $_GET['subcat'];
    //echo 'categoria: '.$idcat;
    $condition = "subcategoria ='{$idcat}'";
    switch ($idcat) {
        case 'informacionFinanciera':
            $title = 'Información Financiera';
            break;
        case 'indicadoresServicioCliente':
            $title = 'Indicadores de Servicio al Cliente';
            break;
        case 'informacionAccionistas':
            $title = 'Información de Accionistas';
            break;
        case 'manualPrevencion':
            $title = 'Manual de Prevención';
            break;
        case 'formularioPersonaNatural':
            $title = 'Persona Natural';
            break;
        case 'formularioPersonaJuridica':
            $title = 'Persona Jurídica';
            break;
        default:
            break;
    }
}
$criteria = new CDbCriteria(array('condition' => $condition,));

$informacion = Pdf::model()->findAll($criteria);
$word = Word::model()->findAll($criteria);

$this->pageTitle = Yii::app()->name;

$count = 0;

$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
        'Información',
        $title,
    ),
));
?>
<div class="row">
    <div class="span8" id="cont-hogar">
        <!--            <div class="home-icon">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_empresarial.png"/> 
                    </div>-->
        <div class="hogar-title">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="clear"></div>
        <p>
            <?php          
//echo $servicios['desc_min'];         
            ?>
        </p>
        <div>

            <?php if ($idcat == 'noticias' || $idcat == 'programaEducacion' || $idcat == 'preguntasFrecuentes'):
                foreach ($informacion as $info) {
                    echo $info['descripcion'];
                }
            endif;  
            ?>
            <h3 class="desc-title">DESCARGAS:</h3>
            <div class="descargas">
                <?php if ($idcat == 'informacionFinanciera'): ?>

                    <div class="tabbable"> <!-- Only required for left/right tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Estados Financieros 2012</a></li>
                            <li><a href="#tab2" data-toggle="tab">Estados Financieros 2013</a></li>
                            <li><a href="#tab3" data-toggle="tab">Margen de Solvencia 2012</a></li>
                            <li><a href="#tab4" data-toggle="tab">Margen de Solvencia 2013</a></li>
                            <li><a href="#tab5" data-toggle="tab">Balance General 2013</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <ul>
                                    <?php
                                    if (!empty($informacion)) {
                                        foreach ($informacion as $info) {
                                            if ($info['keyword'] == 'Estados Financieros 2012') {
                                                echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/></a>' . $info['name'] . '</li>';
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <ul>
                                    <?php
                                    if (!empty($informacion)) {
                                        foreach ($informacion as $info) {
                                            if ($info['keyword'] == 'Estados Financieros 2013') {
                                                echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/></a>' . $info['name'] . '</li>';
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <ul>
                                    <?php
                                    if (!empty($informacion)) {
                                        foreach ($informacion as $info) {
                                            if ($info['keyword'] == 'Margen de Solvencia 2012') {
                                                echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/></a>' . $info['name'] . '</li>';
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <ul>
                                    <?php
                                    if (!empty($informacion)) {
                                        foreach ($informacion as $info) {
                                            if ($info['keyword'] == 'Margen de Solvencia 2013') {
                                                echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/></a>' . $info['name'] . '</li>';
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="tab-pane" id="tab5">
                                <ul>
                                    <?php
                                    if (!empty($informacion)) {
                                        foreach ($informacion as $info) {
                                            if ($info['keyword'] == 'Balance General 2013') {
                                                echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/></a>' . $info['name'] . '</li>';
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                else:
                    if (!empty($informacion)) {
                        echo '<ul>';
                        foreach ($informacion as $info) {
                            echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '"><img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/></a>' . $info['name'] . '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                <?php endif; ?>
                <ul>
                    <?php
                    if (!empty($word)) {
                        foreach ($word as $info) {
                            echo '<li><a href="/ecuasuiza/uploads/word/' . $info['word'] . '"><img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_word.png"/></a>' . $info['name'] . '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>

        </div>
    </div>
    <div class="span2">
        <div class="btn-cotizar">
            <a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
            <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/cotizar.jpg"/></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="span11" id="divisor-down">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/line_down.png"/> 
    </div>
</div>
<div class="row cont-icos">
    <h4>OTROS PRODUCTOS ></h4>
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('hogar/index') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_hogar.png"/></a></div>
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 53)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 54)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/empresariales') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_empresarial.png"/></a></div>
</div>
