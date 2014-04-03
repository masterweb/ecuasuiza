<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
$slider = Slider::model()->findAll();
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bjqs.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bjqs-1.3.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function($) {

        $('#swapp').bjqs({
            height      : 151,
            width       : 559,
            responsive  :true,
            animduration : 450, // how fast the animation are
            animspeed : 3000, // the delay between each slide
            automatic : true,
            showmarkers : false,
            showcontrols : false
        });

    });
    
</script>
<div class="row">

    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <?php
            $count = 1;
            foreach ($slider as $sl) {
                if ($count == 1) {
                    echo '<div class="item active">';
                    echo '<a href="' . Yii::app()->createUrl('/seguros/'.$sl['categoria'], array('id' => $sl['link_yii'])) . '"><img src="' . Yii::app()->request->baseUrl . '/img/sliderSeguros/' . $sl['link'] . '"/></div></a>';
                } else {
                    echo '<div class="item">';
                    echo '<a href="' . Yii::app()->createUrl('/seguros/'.$sl['categoria'], array('id' => $sl['link_yii'])) . '"><img src="' . Yii::app()->request->baseUrl . '/img/sliderSeguros/' . $sl['link'] . '"/></div></a>';
                }
                $count++;
            }
            ?>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
    </div>
</div>
<div class="row">
    <div class="span11" id="divisor">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/divisor_down.gif"/> 
    </div>
</div>
<div class="row">
    <div class="span8" id="slider-seguros">
        <div class="row">
            <div class="span4">
                <a href="<?php echo Yii::app()->createUrl('/seguros/individuales', array('id' => 53)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/img_AUTO.jpg"/></a>
            </div>
            <div class="span4 img-left">
                <a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 49)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/img_HOGAR.jpg"/></a>
            </div>
        </div>
        <div class="row">
            <div class="span4">
                <a href="<?php echo Yii::app()->createUrl('/seguros/individuales', array('id' => 54)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/img_VIDA.jpg"/></a>

            </div>
            <div class="span4 img-left">
                <a href="<?php echo Yii::app()->createUrl('seguros/empresariales') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/img_EMPRESARIALES.jpg"/></a>
            </div>
        </div>
    </div>
    <div class="span3" id="cont-cotizador">
        <div class="row">
            <div class="span1">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/sliderSeguros/calc.jpg"/>
            </div>
            <div class="span2">
                <h3>COTIZADOR</h3>
            </div>
        </div>
        <p>Cotiza con nosotros el plan de seguros que mas se acomode a tus necesidades</p>
        <form class="" name="formCotizador" id="formCotizador" action="<?php echo Yii::app()->createUrl('cotizador/cotizador'); ?>" method="post">
            <fieldset>
                <div class="control-group">
                    <div class="controls">
                        <select name="cotizador" id="cotizador">
                            <option value="">Tipo de poliza</option>
                            <option value="auto">Suiza Auto</option>
                            <option value="hogar">Suiza Hogar</option>
                            <option value="vida">Suiza Vida</option>
                            <option value="vida">Suiza Empresarial</option>
                        </select>
                    </div>
                </div>
<!--                <input type="hidden" name="sendcotizador" id="sendcotizador"/>-->
                <div class="control-group">
                    <button type="submit" class="btn">Cotiza ></button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<div class="row">
    <div class="span11" id="divisor-up">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/divisor_up.gif"/> 
    </div>
</div>
<div class="row" id="noticias">
    <div class="span10">
        <h3>NOTICIAS</h3>
    </div>
    <?php
    $articulos = Articulos::model()->findAll();
//    echo '<pre>';
//    print_r($articulos);
//    echo '</pre>';
    $count = 1;
    foreach ($articulos as $art):
        if ($count <= 3):
            ?>
            <div class="span3">
                <h5><?php echo $art['title'] ?></h5>
                <p class="desc-noticia"><?php echo $art['desc_min'] ?></p>
                <p><a class="btn ver-mas" href="<?php echo Yii::app()->createUrl('/articulos/index', array('id' => $art['id_articulos'])) ?>">Ver más</a></p>    
            </div>

            <?php
        endif;
        $count++;
    endforeach;
    ?>
</div>
<div class="row">
    <div class="span11" id="divisor">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/divisor_down.gif"/> 
    </div>
</div>
<div class="row" id="banners">
    <div class="span6">
        <div id="swapp">
            <ul class="bjqs">
                <li><a href="<?php echo Yii::app()->createUrl('/site/suizamovil') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banners/banner_APP.jpg"/></a></li>
                <li><a href="http://secure.ecuasuiza.ec/ecuasuiza/SoloPortal_Logon.asp" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banners/banner_APP_2.jpg"/></a></li>
            </ul>
        </div>
    </div>
    <div class="span5">
        <a href="<?php echo Yii::app()->createUrl('site/proyectos', array('id' => 9)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banners/ambiente.png"/></a>
    </div>
</div>
