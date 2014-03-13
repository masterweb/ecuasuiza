<?php /* @var $this Controller */ ?>
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

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/prettify.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-wysihtml5.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/wysiwyg-color.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/validationEngine.jquery.css" type="text/css"/>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/wysihtml5-0.3.0.js"></script>
        <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/prettify.js"></script>
        <script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap-wysihtml5.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap-fileupload.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/functions.js"></script>
        
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="container" id="page">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        //'htmlOptions' => array('class' => 'nav nav-principal'),
                        'htmlOptions' => array('class' => 'nav'),
                        'items' => array(
                            array('label' => 'Login', 'url' => array('admin/login'), 'visible' => Yii::app()->user->isAdminUser()),
                            //array('label' => 'Users', 'url' => array('/admin/users'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                            array('label' => 'Home', 'url' => array('/site/index'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser(),
                                'items' => array(
                                    array('label' => 'Slider', 'url' => array('slider/admin'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                                    array('label' => 'Banners Seguros', 'url' => array('admin/banners'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                                    array('label' => 'Noticias', 'url' => array('noticias/admin'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser())
                                )),
                            array('label' => 'Multimedia', 'url' => array('/admin/multimedia'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser(),
                                'items' => array(
                                    //array('label' => 'Administrar Pdfs', 'url' => array('pdf/admin'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                                    array('label' => 'Subir Imágen', 'url' => array('image/create'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                                    array('label' => 'Administrar PDF', 'url' => array('pdf/admin'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                                    array('label' => 'Administrar Word', 'url' => array('word/admin'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                                )
                                ),
                            array('label' => 'Seguros', 'url' => array(''), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser(),
                                'items' => array(
                                    array('label' => 'Administrar', 'url' => array('cms/list'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                                )
                            ),
                            array('label' => 'Servicios', 'url' => array(''), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser(),
                                'items' => array(
                                    array('label' => 'Administrar', 'url' => array('servicios/admin'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                                )),
                            array('label' => 'Información', 'url' => array('/site/informacion'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser())
                        ),
                    ));
                    ?>
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

            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
<script>
    $('.textarea').wysihtml5({
        "html": true //Button which allows you to edit the generated HTML. Default false
    });
    $(prettyPrint);
</script>
