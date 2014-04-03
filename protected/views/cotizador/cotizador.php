<?php
if (isset($_POST['cotizador'])):
    $tipo = $_POST['cotizador'];
    switch ($tipo):
        case 'auto':
            $this->redirect(Yii::app()->createUrl('cotizador/cotizadorinfo', array('tipo' => 'auto')));
            break;
        case 'hogar':
            $this->redirect(Yii::app()->createUrl('cotizador/cotizadorinfo', array('tipo' => 'hogar')));
            break;
        case 'vida':
            $this->redirect(Yii::app()->createUrl('cotizador/cotizadorinfo', array('tipo' => 'vida')));
            break;
        default :
    endswitch;
endif;
?>
<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links' => array(
        'Cotizador',
        'Tipo de Póliza'
    ),
    'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));
?>
<div class="row">
    <div class="span11">

    </div>
</div>
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
    <div class="span2">
        <a href="<?php echo Yii::app()->createUrl('cotizador/cotizadorinfo', array('tipo' => 'auto')); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/cotizador_auto.jpg"/>  </a>
    </div>
    <div class="span2">
        <a href="<?php echo Yii::app()->createUrl('cotizador/cotizadorinfo', array('tipo' => 'hogar')); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/cotizador_hogar.jpg"/>  </a>
    </div>
    <div class="span2">
        <a href="<?php echo Yii::app()->createUrl('cotizador/cotizadorinfo', array('tipo' => 'vida')); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/cotizador_vida.jpg"/>  </a>
    </div>
    <div class="span2">
        <a href="<?php echo Yii::app()->createUrl('cotizador/cotizadorinfo', array('tipo' => 'empresarial')); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/cotizador_empresarial.png"/>  </a>
    </div>
</div>

