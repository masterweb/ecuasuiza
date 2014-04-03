<?php
$criteria = new CDbCriteria(array('condition' => 'categoria="news"', 'order' => 'fecha DESC'));

$noticias = Articulos::model()->findAll($criteria);

$this->pageTitle = Yii::app()->name;

$count = 0;

$this->widget('zii.widgets.CBreadcrumbs', array(
    'links' => array(
        'Información',
        'Noticias',
    ),
    'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));
?>
<div class="row">
    <div class="span8" id="cont-noticias">
        <?php $count = 1; ?>
        <?php foreach ($noticias as $not): ?>
            <div class="clear"></div>
            <p class="titular-noticias"><?php echo $not['title'] ?></p><br>
            <?php echo $this->getFecha($not['fecha']); ?>
            <br>
            <div class="row min-desc">
                <div class="span2">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/noticias/thumbs/<?php echo $not['thumb']; ?>"/>
                </div>
                <div class="span6">
                    <p><?php echo substr($not['desc_min'], 0, 200) . '...' ?></p>
                    <h4><a href="<?php echo Yii::app()->createUrl('/articulos/index', array('id' => $not['id_articulos'])) ?>">Ver más...</a></h4>
                </div>
            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
        <!--        <div>
                    <h3 class="desc-title">DESCARGAS:</h3>
                    <div class="descargas">
                    </div>
                </div>-->
    </div>
    <div class="span2">
        <div class="btn-cotizar">
            <a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
            <a href="<?php echo Yii::app()->createUrl('cotizador/cotizador') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/cotizar.jpg"/></a>
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
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 53)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('hogar/index') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_hogar.png"/></a></div>

    <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 54)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/empresariales') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_empresarial.png"/></a></div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            arrows    : true,
            prevEffect		: 'none',
            nextEffect		: 'none',
            closeBtn		: true          
        });
    });
	
</script>
