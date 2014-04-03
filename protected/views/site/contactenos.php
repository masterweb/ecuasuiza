<?php
$this->pageTitle = Yii::app()->name . ' - Formulario de Contacto';
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
        'Contáctenos'
    ),
    'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));
?>

<div class="row">
    <div class="span3">
        <ul class="page-sidebar-menu" id="yw0">
            <li>Contáctenos
                <ul>
                    <li class="active"><a href="#">Contáctenos </a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('site/oficinas', array('id' => 7)) ?>">Oficinas </a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('trabajaNosotros/create') ?>">Trabaja con Nosotros</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="span7 nosotros" id="cont-hogar">
        <?php if (Yii::app()->user->hasFlash('contactenos')): ?>
            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('contactenos'); ?>
            </div>
        <?php else: ?>
            <p>Si deseas que uno de nuestros representantes se comunique contigo por favor llena
                tus datos en el formulario a continuación.</p>
            <div>
                <?php $this->renderPartial('_form', array('model' => $model)); ?>
            <?php endif; ?>

        </div>

    </div>
<!--    <div class="span2">
        <div class="btn-cotizar">
            <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/cotizar.jpg"/></a>
        </div>
    </div>-->

</div>
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