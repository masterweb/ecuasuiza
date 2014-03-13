<?php
/* @var $this TrabajaNosotrosController */
/* @var $model TrabajaNosotros */

$this->breadcrumbs = array(
    'Trabaja con Nosotros'
);

$this->menu = array(
    array('label' => 'List TrabajaNosotros', 'url' => array('index')),
    array('label' => 'Manage TrabajaNosotros', 'url' => array('admin')),
);
?>
<div class="row">
    <div class="span3">
        <ul class="page-sidebar-menu" id="yw0">
            <li>Nosotros
                <ul>
                    <li class="active"><a href="/ecuasuiza/index.php/site/index">¿Quiénes Somos? </a></li>
            <li><a href="/ecuasuiza/index.php/servicios">Gobierno Corporativo</a></li>
            <li><a href="/ecuasuiza/index.php/site/informacion">Reaseguradores</a></li>
            <li><a href="/ecuasuiza/index.php/site/informacion">Proyectos</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
    <div class="span5" id="cont-hogar">
        <?php if (Yii::app()->user->hasFlash('create')): ?>

            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('create'); ?>
            </div>

        <?php else: ?>
            <p>Aplica a cualquiera de nuestras áreas llenando tus datos en este formulario, y forma
                parte de nuestra base de datos para futuros procesos de selección.</p>	

            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        <?php endif; ?>
    </div>
    <div class="span2">
        <div class="btn-cotizar">
            <a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
            <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/cotizar.jpg"/></a>
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
    <div class="span3"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_empresarial.png"/></a></div>
    <div class="span3"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
    <div class="span3"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>
</div>