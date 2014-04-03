<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links' => array(
        'Servicios',
        'Suiza Móvil Plus'
    ),
    'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));
?>
<div class="row">
    <div class="span8" id="cont-hogar">
        <div class="row">
            <div class="span8">
                <p>Con la aplicación Suiza Móvil Plus tienes al alcance de un click los servicios de 
                    asistencia que te ayudarán en tus emergencias las 24 horas del día tales como: 
                    asistencia vial, asistencia legal telefónica y traslado seguro en caso de estar 
                    imposibilitado; además podrás revisar el status de tu solicitud mediante el 
                    botón checklist o descargar las condiciones generales del programa de asistencia. 
                    Suiza Móvil Plus es una forma adicional de solicitar los servicios en tus emergencias 
                    ya que también lo puedes realizar llamando directamente al número de programa.</p>
            </div>
            <br>
            <div class="row">
                <div class="span8 suizaMobil">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/suizaMobil.jpg"/>
                </div>
            </div>
        </div>
        <div class="row disp">
            <div class="span2">
                <h2>Disponible en:</h2>
            </div>
        </div>
        <div class="row app-store">
            <div class="span2"><a href="https://itunes.apple.com/ec/app/isuizamovil/id734913369?mt=8" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/appstore.jpg"/></a></div>
            <div class="span2"><a href="https://play.google.com/store/apps/details?id=com.suiza&hl=es-419" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/googleplay.jpg"/></a></div>
        </div>
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
