<?php
$this->pageTitle = Yii::app()->name . ' - Formulario de Contacto';
$this->breadcrumbs = array(
    'Formulario de Contacto',
);
?>

<div class="row">
    <div class="span3">
        <ul class="page-sidebar-menu" id="yw0">
            <li>Contáctenos
                <ul>
                    <li><a href="/ecuasuiza/index.php/site/index">Oficinas </a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="span5" id="cont-hogar">
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
        <div class="span2">
            <div class="btn-cotizar">
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
</div>