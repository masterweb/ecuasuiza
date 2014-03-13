<?php
//$seguros = Seguros::model()->findAll(array('order' => 'pos'));
$seguros = Seguros::model()->findAll();
$servicios = Servicios::model()->findAll();
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-responsive.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/functions.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="nav-collapse collapse">
                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'htmlOptions' => array("class" => "nav", "id" => "nav-top-menu"),
                            'items' => array(
                                array('label' => 'Nosotros', 'url' => array('/trabajaNosotros/create')),
                                array('label' => 'Contáctenos', 'url' => array('/site/contactenos'))
                            ),
                        ));
                        ?>
                        <div class="navbar-text pull-right">
                            <div class="span2" id="reference">
                                <p>Síguenos en:</p> 
                                <ul class="list-unstyled">
                                    <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/twitter.png"/></a></li>
                                    <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/youtube.png"/></a></li>
                                </ul>
                            </div>
                        </div> 
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container" id="page">
            <div class="row">
                <div class="span6">
                    <a href="<?php echo Yii::app()->createUrl('/site/index'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/logo.jpg" id="logo"/></a>
                </div>
                <div class="span3 offset1">
                    <form id="custom-search-form" class="form-search form-horizontal pull-right">
                        <div class="input-append span3">
                            <button type="submit" class="btn btn-ecu"><i class="icon-search icon-search-ecu"></i></button>
                            <input type="text" class="search-query search-ecu" placeholder="Buscar">
                        </div>
                    </form>
                </div>
            </div>
            <div class="navbar">
                <div class="navbar-inner navbar-ecu">
                    <ul class="nav nav-principal">
                        <li><a href="<?php echo Yii::app()->createUrl('/site/index'); ?>">Seguros Individuales</a>
                            <ul>
                                <?php
                                foreach ($seguros as $s) {
                                    if (($s['categoria'] == 'hogar') || ($s['categoria'] == 'auto') || ($s['categoria'] == 'vida')):
                                        echo '<li><a href="' . Yii::app()->createUrl('/seguros/individuales', array('id' => $s['id'])) . '">-' . $s['title'] . '</a></li>';
                                    endif;
                                }
                                ?>
                            </ul> 
                        </li>
                        <li><a href="<?php echo Yii::app()->createUrl('/seguros/empresariales'); ?>">Seguros Empresariales</a>
                            <ul>
                                <?php
                                foreach ($seguros as $s) {
                                    if ($s['categoria'] == 'empresarial'):
                                        echo '<li><a href="' . Yii::app()->createUrl('/seguros/empresariales', array('id' => $s['id'])) . '">-' . $s['title'] . '</a></li>';
                                    endif;
                                }
                                ?>
                            </ul>    
                            <!--                            <ul>
                                                            <li><a href="/ecuasuiza/index2.php/admin/slider">Slider</a></li>
                                                        </ul>-->
                        </li>
                        <li><a href="<?php echo Yii::app()->createUrl('/servicios'); ?>">Servicios</a>
                            <ul>
                                <li><a href="<?php Yii::app()->createUrl('/servicios/index') ?>">-Transporte Online</a></li>
                                <li><a href="<?php Yii::app()->createUrl('/servicios/index') ?>">-Suiza Móvil Plus</a></li>
                                <li><a href="<?php Yii::app()->createUrl('/servicios/index') ?>">-Reclamos</a>
                                    <ul>
                                        <?php
                                        foreach ($servicios as $s) {
                                            if ($s['categoria'] == 'reclamos'):
                                                echo '<li><a href="' . Yii::app()->createUrl('/servicios/index', array('id' => $s['id'])) . '">-' . $s['title'] . '</a></li>';
                                            endif;
                                        }
                                        ?>
                                    </ul>    
                                </li>
                            </ul> 
                        </li>
                        <li><a href="<?php echo Yii::app()->createUrl('/informacion'); ?>">Información</a>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('cat' => 'noticias')); ?>">-Noticias</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('cat' => 'programaEducacion')); ?>">-Programa de Educación</a></li>
                                <li><a href="#">-Ley de Transparencia</a>
                                    <ul>
                                        <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'informacionFinanciera')); ?>">Información Financiera</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'indicadoresServicioCliente')); ?>">Indicadores de Servicio al Cliente</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'informacionAccionistas')); ?>">Información de accionistas </a></li>
                                    </ul>
                                </li>
                                <li><a href="#">-Lavado de Activos</a>
                                    <ul>
                                        <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'manualPrevencion')); ?>">Manual de Prevención</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'formularioPersonaNatural')); ?>">Persona Natural</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'formularioPersonaJuridica')); ?>">Persona Jurídica</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('cat' => 'glosario')); ?>">-Glosario de Términos</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('cat' => 'preguntasFrecuentes')); ?>">-Preguntas Frecuentes</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php
//                    $this->widget('zii.widgets.CMenu', array(
//                        'htmlOptions' => array('class' => 'nav nav-principal'),
//                        'items' => array(
//                            array('label' => 'Seguros Individuales', 'url' => array('/site/index')),
//                            array('label' => 'Seguros Empresariales', 'url' => array('/seguros/empresariales'),
//                                'items' => array(
//                                    array('label' => 'Slider', 'url' => array('admin/slider'))
//                                )
//                                ),
//                            array('label' => 'Servicios', 'url' => array('/servicios')),
//                            array('label' => 'Información', 'url' => array('/site/informacion'), 'visible' => Yii::app()->user->isGuest),
//                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
//                        ),
//                    ));
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="span11" id="divisor-up-menu">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/line_menu.png"/> 
                </div>
            </div>
            <!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>
            <?php
//            foreach ($seguros as $s) {
//                echo 'categoria-----------' . $categoria = $s['categoria'].'<br>';
//            }
            ?>    
            <div class="clear"></div>
            <div class="row">
                <div class="span11" id="divisor-up">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/divisor_up.gif"/> 
                </div>
            </div>
            <div id="footer">

                <div class="row">
                    <div class="span7">
                        <ul class="access-links">
                            <li><a href="">Seguros Individuales</a></li>
                            <li><a href="">Seguros Empresariales</a></li>
                            <li><a href="">Servicios</a></li>
                            <li><a href="">Información</a></li>
                            <li><a href="">Nosotros</a></li>
                            <li><a href="">Contáctenos</a></li>
                        </ul>
                        <p class="copy">Copyright © 2014 EcuaSuiza.</p>
                    </div>
                    <div class="span3" id="social-twitter">
                        <div class="twitter-big">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/footer/twitter_big.png"/>
                        </div>
                        <div class="list-twitter">
                            <p>Hace 10 horas</p>
                            <p>Lorem ipsum dolor sit.</p>
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                        <div class="span2" id="reference">
                            <p>Síguenos en:</p> 
                            <ul class="list-unstyled">
                                <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/twitter.png"/></a></li>
                                <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/youtube.png"/></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
