<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
$slider = Slider::model()->findAll();
?>
<div class="row">
    
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <?php
            $count = 1;
            foreach ($slider as $sl) {
                if($count == 1){
                    echo '<div class="item active">
                    <img src="'. Yii::app()->request->baseUrl.'/img/sliderSeguros/'.$sl['link'].'"/></div>';
                }else{
                   echo '<div class="item">
                    <img src="'. Yii::app()->request->baseUrl.'/img/sliderSeguros/'.$sl['link'].'"/></div>'; 
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
                <a href="<?php echo Yii::app()->createUrl('seguros/empresariales')?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/img_EMPRESARIALES.jpg"/></a></div>
            <div class="span4 img-left">
                <a href="<?php echo Yii::app()->createUrl('/seguros/individuales', array('id' => 53))?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/img_AUTO.jpg"/></a>
            </div>
        </div>
        <div class="row">
            <div class="span4">
                <a href="<?php echo Yii::app()->createUrl('hogar/index')?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/img_HOGAR.jpg"/></a></div>
            <div class="span4 img-left">
                <a href="<?php echo Yii::app()->createUrl('/seguros/individuales', array('id' => 54))?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/img_VIDA.jpg"/></a>
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
        <form class="" name="formCotizador" id="formCotizador">
            <fieldset>
                <div class="control-group">
                    <div class="controls">
                        <select name="cotizador" id="cotizador">
                            <option value="">Tipo de poliza</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <select name="plazo" id="plazo">
                            <option value="">Plazo</option>
                        </select>
                    </div>
                </div>
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
    <div class="span3">
        <h5>Lorem Ipsum</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, deserunt, ab, facere, vitae amet in laboriosam saepe error omnis dolor incidunt nostrum quod optio corporis porro ipsa tempora esse aliquam.</p>
        <p><a class="btn ver-mas" href="#">Ver más</a></p>    
    </div>
    <div class="span3">
        <h5>Lorem Ipsum</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, deserunt, ab, facere, vitae amet in laboriosam saepe error omnis dolor incidunt nostrum quod optio corporis porro ipsa tempora esse aliquam.</p>
        <p><a class="btn ver-mas" href="#">Ver más</a></p>
    </div>
    <div class="span3">
        <h5>Lorem Ipsum</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, deserunt, ab, facere, vitae amet in laboriosam saepe error omnis dolor incidunt nostrum quod optio corporis porro ipsa tempora esse aliquam.</p>
        <p><a class="btn ver-mas" href="#">Ver más</a></p>  
    </div>
</div>
<div class="row">
    <div class="span11" id="divisor">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/divisor_down.gif"/> 
    </div>
</div>
<div class="row" id="banners">
    <div class="span6">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banners/movil.jpg"/> 
    </div>
    <div class="span5">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banners/ambiente.jpg"/> 
    </div>
</div>
