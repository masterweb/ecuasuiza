<?php
//$seguros = Seguros::model()->findAll(array('order' => 'pos'));
$seguros = Seguros::model()->findAll(array('order' => 'categoria'));
$servicios = Servicios::model()->findAll();
if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $mobile_agents = '!(tablet|pad|mobile|phone|symbian|android|ipod|ios|blackberry|webos)!i';
    if (preg_match($mobile_agents, $_SERVER['HTTP_USER_AGENT'])) {
        $mobile = true;
    } else {
        $mobile = false;
    }
}
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css"/>               
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css"/>        
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menudrop.css" type="text/css"/>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/functions.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/menudrop.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php if ($mobile == false): ?>
            <!--Start of Zopim Live Chat Script-->
            <script type="text/javascript">
                window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
                        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
                            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
                    $.src='//v2.zopim.com/?1yrsDtbpeh47BVNtjoMUIa87K9yIfRl0';z.t=+new Date;$.
                        type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
            </script>
            <!--End of Zopim Live Chat Script-->
        <?php endif; ?>
        <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
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
                                array('label' => 'Nosotros', 'url' => array('/site/nosotros', 'id' => 5)),
                                array('label' => 'Contáctenos', 'url' => array('/site/contactenos'))
                            ),
                        ));
                        ?>
                        <div class="navbar-text pull-right">
                            <div class="span2" id="reference">
                                <p>Síguenos en:</p> 
                                <ul class="list-unstyled">
                                    <li><a href="https://twitter.com/EcuaSuiza" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/twitter.png"/></a></li>
                                    <li><a href="http://www.youtube.com/user/EcuaSuiza" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/youtube.png"/></a></li>
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
                    <form id="custom-search-form" class="form-search form-horizontal pull-right" method="post" action="<?php echo Yii::app()->createUrl('site/busqueda'); ?>">
                        <div class="input-append span3">
                            <button type="submit" class="btn btn-ecu icon_buscador"><i class="icon-search icon-search-ecu"></i></button>
                            <input type="text" class="search-query search-ecu" placeholder="Buscar" id="txt_search" name="buscar">
                        </div>
                    </form>
                </div>
            </div>
            <div class="navbar">
                <div class="navbar-inner navbar-ecu">
                    <ul class="nav nav-principal menudrop" id="menudrop">
                        <li><a href="#" class="no-link">Seguros Individuales</a>
                            <ul class="seguros-ind">
                                <?php
                                foreach ($seguros as $s) {
                                    if (($s['categoria'] == 'hogar') || ($s['categoria'] == 'auto') || ($s['categoria'] == 'vida')):
                                        echo '<li><a href="' . Yii::app()->createUrl('/seguros/individuales', array('id' => $s['id'])) . '">' . $s['title'] . '</a></li>';
                                    endif;
                                }
                                ?>
                            </ul> 
                        </li>
                        <li><a href="#" class="no-link">Seguros Empresariales</a>
                            <ul class="sub-empresariales">
                                <?php
                                $condition = 'categoria ="empresarial"';

                                $criteria = new CDbCriteria(array(
                                            'condition' => $condition,
                                            'order' => 'title ASC'
                                        ));

                                $segurosEmp = Seguros::model()->findAll($criteria);
                                $resultado = count($segurosEmp);
                                $numFilas = ceil($resultado / 2);
                                //echo $numFilas;
                                $condition = 'categoria ="empresarial"';
                                $limit = $numFilas;
                                $offset = 0;

                                $criteria2 = new CDbCriteria(array(
                                            'condition' => $condition,
                                            'limit' => $limit,
                                            'offset' => $offset,
                                            'order' => 'title ASC'
                                        ));

                                $segurosEmp = Seguros::model()->findAll($criteria2);

                                echo '<p class="column-emp">';
                                foreach ($segurosEmp as $se) {
                                    if ($se['categoria'] == 'empresarial'):
                                        echo '<a href="' . Yii::app()->createUrl('/seguros/empresariales', array('id' => $se['id'])) . '">' . $se['title'] . '</a>';
                                    endif;
                                }
                                echo '</p>';

                                $condition = 'categoria ="empresarial"';
                                $limit = $resultado;
                                $offset = $numFilas;
                                $criteria2 = new CDbCriteria(array(
                                            'condition' => $condition,
                                            'limit' => $limit,
                                            'offset' => $offset,
                                            'order' => 'title ASC'
                                        ));

                                $segurosEmp = Seguros::model()->findAll($criteria2);

                                echo '<p class="column-emp">';
                                foreach ($segurosEmp as $se) {
                                    if ($se['categoria'] == 'empresarial'):
                                        echo '<a href="' . Yii::app()->createUrl('/seguros/empresariales', array('id' => $se['id'])) . '">' . $se['title'] . '</a>';
                                    endif;
                                }
                                echo '</p>';
                                ?>
                            </ul>
                        </li>
                        <li><a href="#" class="no-link">Servicios</a>
                            <ul>
                                <li><a href="http://secure.ecuasuiza.ec/ecuasuiza/SoloPortal_Logon.asp" target="_blank">Transporte Online</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/site/suizamovil') ?>">Suiza Móvil Plus</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/servicios/index', array('id' => 6)); ?>">Reclamos</a>
                                    <!--                                    <ul>
                                    <?php
                                    foreach ($servicios as $s) {
                                        if ($s['categoria'] == 'reclamos'):
                                            echo '<li><a href="' . Yii::app()->createUrl('/servicios/index', array('id' => $s['id'])) . '">' . $s['title'] . '</a></li>';
                                        endif;
                                    }
                                    ?>
                                                                        </ul>    -->
                                </li>
                            </ul> 
                        </li>
                        <li><a href="#" class="no-link">Información</a>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('/noticias/'); ?>">Noticias</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('cat' => 'programaEducacion')); ?>">Programa de Educación Financiera</a></li>
                                <li><a href="#" class="no-link">Ley de Transparencia</a>
                                    <ul>
                                        <!--<li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('cat' => 'gobiernoCorporativo')); ?>">Gobierno Corporativo</a></li>-->
                                        <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'informacionFinanciera')); ?>">Información Financiera</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'indicadoresServicioCliente')); ?>">Indicadores de Servicio al Cliente</a></li>
                                        <!--<li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'informacionAccionistas')); ?>">Información de accionistas </a></li>-->
                                    </ul>
                                </li>
                                <!--<li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('cat' => 'gobiernoCorporativo')); ?>">Gobierno Corporativo</a></li>-->
                                <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('cat' => 'lavadoActivos')); ?>">Lavado de Activos</a>
                                    <!--                                    <ul>
                                                                            <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'manualPrevencion')); ?>">Manual de Prevención</a></li>
                                                                            <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'formularioPersonaNatural')); ?>">Persona Natural</a></li>
                                                                            <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('subcat' => 'formularioPersonaJuridica')); ?>">Persona Jurídica</a></li>
                                                                        </ul>-->
                                </li>
                                <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('cat' => 'glosario')); ?>">Glosario de Términos</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/informacion/index', array('cat' => 'preguntasFrecuentes')); ?>">Preguntas Frecuentes</a></li>
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
            <!--            <div class="row">
                            <div class="span2 offset8 chat">
                                <a href="<?php echo Yii::app()->createUrl('site/chat') ?>">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/chat.png" title="Horario de 8:30 a 10:00 y 14:30 a 16:00" class="chat-tool"/>
                                </a> 
                            </div>
                        </div>-->
            <div class="row">
                <div class="span11" id="divisor-up">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/divisor_up.gif"/> 
                </div>
            </div>
            <div id="footer">

                <div class="row">
                    <div class="span7">
                        <ul class="access-links">
                            <li><a href="<?php echo Yii::app()->createUrl('site/index') ?>">Inicio</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 53)) ?>">Seguros Individuales</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('seguros/empresariales') ?>">Seguros Empresariales</a></li>
                            <li><a href="http://secure.ecuasuiza.ec/ecuasuiza/SoloPortal_Logon.asp" target="_blank">Servicios</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('/noticias/'); ?>">Información</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('site/nosotros', array('id' => 5)); ?>">Nosotros</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('site/contactenos/'); ?>">Contáctenos</a></li>
                        </ul>
                        <p class="copy-pbx">Atención a Nivel Nacional PBX: 3731515</p>
                        <p class="copy">Copyright © 2014 EcuaSuiza.</p>
                    </div>
                    <div class="span3" id="social-twitter">
                        <div class="twitter-big">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/footer/twitter_big.png" width="75%"/>
                        </div>
                        <div class="list-twitter">
                            <a class="twitter-timeline" data-widget-id="446696202617110528" data-chrome="noheader nofooter transparent" data-tweet-limit="" data-link-color="#4b9e44" data-border-color="#FFFFFF" lang="EN" data-theme="" height="150" width="220" data-screen-name="EcuaSuiza" data-show-replies="" data-aria-polite="assertive" > </a> 
                            <!-- Thank you for using "TweetsDecoder" <a href="//tweetsdecoder.com"> @TweetsDecoder.COM</a>--> 
                            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                        <!--                        <div class="span2" id="reference2">
                                                    <p>Síguenos en:</p> 
                                                    <ul class="list-unstyled">
                                                        <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/twitter.png"/></a></li>
                                                        <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/youtube.png"/></a></li>
                                                    </ul>
                                                </div>-->
                    </div>
                </div>

            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
<script>
    var menudrop=new menudrop.dd("menudrop");
    menudrop.init("menudrop","menuhover");
    $('.icon_buscador').click(function()
    {
        sendSearch();
    });

    $("#txt_search").keypress(function(event) {
        if(event.which == 13)
            sendSearch(); 
    });
    //$( "#seccion7" ).mouseover(function() {
    //    $( ".juiciocrudo" ).show();
    //});
    //$( "#seccion7" ).mouseout(function() {
    //    $( ".juiciocrudo" ).hide();
    //});

    function sendSearch()
    {
        var txt = $('#txt_search').val();
        if(txt != "")
        {
            var url =  "<?php echo Yii::app()->createUrl('site/busqueda'); ?>";
            url += "/" + txt;
            document.location.href = url;
        }
    }
</script>
