<?php
if (isset($_POST['cotizador'])):
    $tipo = $_POST['cotizador'];
    switch ($tipo):
        case 'auto':

            break;
        case 'hogar':

            break;
        case 'vida':

            break;
    endswitch;
else:
    ?>
    <div class="row">
        <div class="span11">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/banner_cotizador.jpg"/> 
        </div>
    </div>
    <h4 class="cotizador-title">Selecciona el tipo de póliza a cotizar</h4> 
    <div class="row">
        <div class="span11" id="divisor">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/divisor_down.gif"/> 
        </div>
    </div>
    <div class="row">
<!--        <div class="span3">
            <a href="<?php //echo Yii::app()->createUrl('site/cotizadorinfo', array('tipo' =>'auto')); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/cotizador_auto.jpg"/>  </a>
        </div>-->
        <div class="span3">
            <a href="<?php echo Yii::app()->createUrl('site/cotizadorinfo', array('tipo' =>'hogar')); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/cotizador_hogar.jpg"/>  </a>
        </div>
        <div class="span3">
            <a href="<?php echo Yii::app()->createUrl('site/cotizadorinfo', array('tipo' =>'vida')); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/cotizador_vida.jpg"/>  </a>
        </div>
    </div>
<?php endif; ?>
