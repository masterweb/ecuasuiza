<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
<!-- Optionally add helpers - button, thumbnail and/or media -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<?php
/* @var $this TrabajaNosotrosController */
/* @var $model TrabajaNosotros */
$id = 0;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}
$articulo = Articulos::model()->findByAttributes(array('id_articulos' => $id));

$this->widget('zii.widgets.CBreadcrumbs', array(
    'links' => array(
        'Nosotros',
        'Misión Visión'
    ),
    'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));
?>
<div class="row">
    <div class="span3">
        <ul class="page-sidebar-menu" id="yw0">
            <li>Nosotros
                <ul>
                    <li <?php if ($id == 5): ?>class="active" <?php endif; ?>><a href="<?php echo Yii::app()->createUrl('site/nosotros', array('id' => 5)) ?>">¿Quiénes Somos? </a></li>
                    <li <?php if ($id == 12): ?>class="active" <?php endif; ?>><a href="<?php echo Yii::app()->createUrl('site/nosotros', array('id' => 12)) ?>">Historia </a></li>
                    <li class="active"><a href="<?php echo Yii::app()->createUrl('site/misionvision', array('id' => 10)) ?>">Misión Visión</a></li>
                    <!--<li <?php if ($id == 13): ?>class="active" <?php endif; ?>><a href="<?php echo Yii::app()->createUrl('site/nosotros', array('id' => 13)) ?>">Politica de Calidad</a></li>-->
                    <li><a href="<?php echo Yii::app()->createUrl('site/reaseguradores', array('id' => 6)) ?>">Reaseguradores</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('site/proyectos', array('id' => 9)) ?>">Proyectos</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="span7 nosotros" id="cont-hogar">
        <div class="hogar-title-qs">
            <h2><?php echo $articulo['title']; ?></h2>
        </div>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/noticias/<?php echo $articulo['link_img']; ?>"/>
        <br><br>
        <div class="art-qs"><?php echo $articulo['contenido']; ?></div>

    </div>
    <!--    <div class="span2">
            <div class="btn-cotizar">
                <a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
                <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/cotizar.jpg"/></a>
            </div>
        </div>-->
    <div class="row">
        <div class="span11" id="divisor-down">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/line_down.png"/> 
        </div>
    </div>
    <div class="row cont-icos">
        <h4>OTROS PRODUCTOS ></h4>
        <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 53)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
        <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 49)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_hogar.png"/></a></div>

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