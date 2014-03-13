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

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="container" id="page">
            <div class="row">
                <div class="span6">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/logo.jpg" class="img-responsive"/>
                </div>
                <div class="span3 offset2">
                    <p>Login</p>
                </div>
            </div>
            <div class="navbar">
                <div class="navbar-inner">
                    <ul class="nav">
                        <li class="active"><a href="#">RAMOS</a></li>
                        <li><a href="#">SERVICIOS</a></li>
                        <li><a href="#">INFORMACIÓN</a></li>
                        <li><a href="#">NOSOTROS</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-md-7">
                    <div id="logo">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/logo.jpg" class="img-responsive"/>
                    </div>
                </div><!-- header -->
                <div class="col-xs-4 col-md-3 col-md-offset-2">
                    <div class="cont-social">
                        <p class="login-link">Login:<b>|</b><img src="/ecuasuiza/img/header/search.jpg" alt="">
                        </p>
                        <p class="social-links">Síguenos en:&nbsp;</p>
                        <ul class="social">
                            <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/youtube.jpg" alt="" border="0">
                            </li>
                            <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/twitter.jpg" alt="" border="0">
                            </li>
                            <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/header/facebook.jpg" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="mainmenu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'HOME', 'url' => array('/site/index')),
                        array('label' => 'RAMOS', 'url' => array('/ramos/index')),
                        array('label' => 'SERVICIOS', 'url' => array('/servicios')),
                        array('label' => 'INFORMACIÓN', 'url' => array('/site/informacion'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'NOSOTROS', 'url' => array('/site/servicios')),
                        array('label' => 'CONTÁCTENOS', 'url' => array('/site/contact')),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                ));
                ?>
            </div><!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">

            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
