<?php
/* @var $this TrabajaNosotrosController */
/* @var $model TrabajaNosotros */
$id = 0;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}
$articulo = Articulos::model()->findByAttributes(array('id_articulos' => $id));

$this->breadcrumbs = array(
    'Quienes Somos'
);
?>
<div class="row">
    <div class="span3">
        <ul class="page-sidebar-menu" id="yw0">
            <li>Nosotros
                <ul>
                    <li class="active"><a href="#">¿Quiénes Somos? </a></li>
<!--                    <li><a href="/ecuasuiza/index.php/servicios">Gobierno Corporativo</a></li>-->
                    <li><a href="<?php echo Yii::app()->createUrl('site/reaseguradores' ,array('id'=>6)) ?>">Reaseguradores</a></li>
                    <li><a href="/ecuasuiza/index.php/site/informacion">Proyectos</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="span5" id="cont-hogar">
        <div class="hogar-title-qs">
            <h2><?php echo $articulo['title']; ?></h2>
            <div class="art-qs"><?php echo $articulo['contenido']; ?></div>
        </div>
        
    </div>
    <div class="span2">
        <div class="btn-cotizar">
            <a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
            <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/cotizar.jpg"/></a>
        </div>
    </div>
    <div class="row">
        <div class="span11" id="divisor-down">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/line_down.png"/> 
        </div>
    </div>
    <div class="row cont-icos">
        <h4>OTROS PRODUCTOS ></h4>
        <div class="span3"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_empresarial.png"/></a></div>
        <div class="span3"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
        <div class="span3"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>
    </div>