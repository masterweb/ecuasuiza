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
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap-fileupload.min.js"></script>
        <style type="text/css">
            /*            .form-signin {
                            max-width: 300px;
                            padding: 19px 29px 29px;
                            margin: 0 auto 20px;
                            background-color: #F2F2F2;
                            border: 1px solid #e5e5e5;
                            -webkit-border-radius: 5px;
                            -moz-border-radius: 5px;
                            border-radius: 5px;
                            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                            box-shadow: 0 1px 2px rgba(0,0,0,.05);               
                        }
                        .form-signin .form-signin-heading,
                        .form-signin .checkbox {
                            margin-bottom: 10px;
                        }
                        .form-signin input[type="text"],
                        .form-signin input[type="password"] {
                            font-size: 16px;
                            height: auto;
                            margin-bottom: 15px;
                            padding: 7px 9px;
                        }
            
                        input{
                            height: 14px !important;
                            background: red !important;
                        }
                        .add-on{
                            height: 26px !important;
                            padding: 4px 9px !important;
                        }*/
        </style>
        <script>
            $( document ).ready(function() {
                $("#ingresoOferta").validationEngine();
                $("#upload-file").hide();
                $('#imageSelect').change(function() {
                    var value = $(this).attr('value');
                    if(value == 'Si'){
                        $("#upload-file").show(); 
                    }else if(value == 'No'){
                        $("#upload-file").hide();
                    }
                });
                
            });
            
            function checkHELLO(field, rules, i, options){
                var tipodoc = field.val();
                var ext = filename.split('.').pop();
                
                if (ext != "pdf") {
                    // this allows the use of i18 for the error msgs
                    return options.allrules.validate2fields.alertText;
                }
            }
            function checkInputFile(){
                
                var tipodoc = $( "#tipodoc option:selected" ).text();
                
                var validateInput;
                var filename = $('#fileGeneral').val();
                var ext = filename.split('.').pop();
                //alert('extension: '+ext)
               
                switch(tipodoc)
                {
                    case 'pdf':
                        if(ext != 'pdf'){
                            return false;
                        }
                        break;
                    case 'word':
                        if(ext != 'docx'){
                            return options.allrules.validate2fields.alertText;
                        }
                        break;
                    case 'excel':
                        if(ext != 'xlsx'){
                            return options.allrules.validate2fields.alertText;
                        }
                        break;
                    default:
                        
                }
            }
            
        </script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="container" id="page">
            <div class="navbar">
                <div class="navbar-inner">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        //'htmlOptions' => array('class' => 'nav nav-principal'),
                        'htmlOptions' => array('class' => 'nav'),
                        'items' => array(
                            array('label' => 'Login', 'url' => array('admin/login'), 'visible' => Yii::app()->user->isAdminUser()),
                            array('label' => 'Artículos', 'url' => array('/site/index'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                            array('label' => 'Multimedia', 'url' => array('/ramos/index'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                            array('label' => 'Seguros', 'url' => array('/servicios'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser(),
                                'items' => array(
                                    array('label' => 'Seguros Hogar', 'url' => array('adminseguros/hogar'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                                    array('label' => 'Seguros Empresariales', 'url' => array('adminseguros/empresarial'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser()),
                                    array('label' => 'Seguros Autos', 'url' => array('adminseguros/autos'), 'visible' => Yii::app()->user->isGuest && Yii::app()->user->isAdminUser())
                                )
                            ),
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
