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
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
        <!-- Add fancyBox -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
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
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.fancybox').fancybox();
                });
            </script>
            <style>
                .form-signin{
                    width: 50%;
                    margin: 0 auto;
                }
                .data-register a{
                    color: #555555;
                    display: block;
                    text-align: right;
                }
                .data-register .link-register{
                    font-weight: bold;
                }
                .register-divisor{
                    background: none;
                    border-bottom: 1px dotted #4b9e44 !important;
                    border-top: none !important;
                }
                .form label{
                    font-size: 15px !important;
                }
            </style>
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
                        
                        <?php if (Yii::app()->user->isEditorUser()): ?>
                            <?php
                            $this->widget('zii.widgets.CMenu', array(
                                'htmlOptions' => array("class" => "nav", "id" => "nav-top-menu"),
                                'items' => array(
                                    array('label' => 'Nosotros', 'url' => array('/site/nosotros', 'id' => 5)),
                                    array('label' => 'Contáctanos', 'url' => array('/site/contactenos')),
                                    array('label' => 'Cerrar Sesión', 'url' => array('/site/logout'))
                                ),
                            ));
                            ?>
                        <?php else: ?>
                            <?php
                            $this->widget('zii.widgets.CMenu', array(
                                'htmlOptions' => array("class" => "nav", "id" => "nav-top-menu"),
                                'items' => array(
                                    array('label' => 'Nosotros', 'url' => array('/site/nosotros', 'id' => 5)),
                                    array('label' => 'Contáctanos', 'url' => array('/site/contactenos'))
                                ),
                            ));
                            ?>
                        <?php endif; ?>
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
                    <?php 
                    $categorias = Categorias::model()->findAll(array('order' => 'pos'));
                    ?>
                    <ul class="nav nav-principal menudrop" id="menudrop">
                        <?php foreach ($categorias as $cat) { ?>
                            <li><a href="#" class="no-link"><?php echo $cat['title_categoria']; ?></a>
                               <?php echo $this->getSubSecciones($cat['id']); ?>
                            </li>
                        <?php } ?>
                    </ul>
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
                            <li><a href="<?php echo Yii::app()->createUrl('site/index') ?>">Inicio</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('seguros/individuales') ?>">Seguros Individuales</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('seguros/empresariales') ?>">Seguros Empresariales</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('/servicios/'); ?>">Servicios</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('/informacion/info'); ?>">Información</a></li>
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
        <div id="inline1" style="display: none; width: 500px;">

            <div class="form">
                <form class="form-signin" action="/ecuasuiza/index.php/admin/loginEditor" method="post" id="form-login">
                    <div id="error-login" style="color:#4b9e44"></div>
                    <div class="row">
                        <label for="LoginForm_Usuario">Usuario:</label>
                        <input name="LoginForm[username]" id="LoginForm_username" type="text">
                    </div>
                    <div class="row">
                        <label for="LoginForm_Password">Contraseña:</label>
                        <input name="LoginForm[password]" id="LoginForm_password" type="password">
                    </div>
                    <div class="row submit">
                        <input type="submit" name="yt0" value="Ingresar" id="ingresar">
                    </div>
                </form>
                <hr class="register-divisor">
                <div class="data-register">
<!--                    <a href="<?php echo Yii::app()->createUrl('user/create') ?>" class="link-register">Registrarme</a>-->
                    <a href="#" style="text-decoration: underline;">*No recuerdo mis datos</a>
                </div>
            </div>
        </div>

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
