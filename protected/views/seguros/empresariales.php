<?php
$id = 0;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    switch ($id) {
        case 55:
            $icono = 'icons_accidentes.png';
            break;
        case 57:
            $icono = 'icons_aereo.png';
            break;
        case 59:
            $icono = 'icons_buque.png';
            break;
        case 60:
            $icono = 'icons_equipo_empr.png';
            break;
        case 61:
            $icono = 'icons_equipo_MC.png';
            break;
        case 62:
            $icono = 'icons_incendio.png';
            break;
        case 63:
            $icono = 'icons_cesante_incendio.png';
            break;
        case 64:
            $icono = 'icons_rotura_maq.png';
            break;
        case 65:
            $icono = 'icons_responsabilidad_civil.png';
            break;
        case 66:
            $icono = 'icons_robo.png';
            break;
        case 67:
            $icono = 'icons_rotura_maq.png';
            break;
        case 68:
            $icono = 'icons_riesgo_contr.png';
            break;
        case 69:
            $icono = 'icons_riesgo_montaje.png';
            break;
        case 70:
            $icono = 'icons_transporte.png';
            break;
        case 71:
            $icono = 'icons_vehiculo.png';
            break;
        case 72:
            $icono = 'icons_vida_colect.png';
            break;
        case 73:
            $icono = 'icons_fidelidad.png';
            break;
        case 74:
            $icono = 'icons_obra_civil.png';
            break;
        case 75:
            $icono = 'icons_riesgo_banca.png';
            break;
        case 76:
            $icono = 'icons_fidelidad.png';
            break;

        default:
            break;
    }
}
$seguros = Seguros::model()->findByAttributes(array('id' => $id));
$this->pageTitle = Yii::app()->name . '- Seguros Empresariales - ' . $seguros['title'];
?>
<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links' => array(
        'Seguros Empresariales' => array('seguros/empresariales'),
        $seguros['title'],
    ),
    'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));
?>
<?php
if ($id == 0):

    $condition = 'categoria ="empresarial"';
    $limit = 10;
    $offset = 0;

    $criteria = new CDbCriteria(array(
                'condition' => $condition,
                'limit' => $limit,
                'offset' => $offset,
                'order' => 'title'
            ));

    $seguros = Seguros::model()->findAll($criteria);
    ?> 
    <div class="row">
        <div class="span11">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/seguros/banner_EMPRESARIAL.jpg"/>	
        </div>
    </div>    
    <div class="row empresarial">
        <div class="span5">
            <ul>
                <?php foreach ($seguros as $s) { ?>
                    <li><a href="<?php echo Yii::app()->createUrl('/seguros/empresariales', array('id' => $s['id'])) ?>"><?php echo $s['title']; ?></a></li>
                <?php } ?>

            </ul>
        </div>
        <div class="span5">
            <?php
            $condition = 'categoria ="empresarial"';
            $limit = 10;
            $offset = 10;

            $criteria = new CDbCriteria(array(
                        'condition' => $condition,
                        'limit' => $limit,
                        'offset' => $offset,
                        'order' => 'title'
                    ));

            $seguros = Seguros::model()->findAll($criteria);
            ?>    
            <ul>
                <?php foreach ($seguros as $s) { ?>
                    <li><a href="<?php echo Yii::app()->createUrl('/seguros/empresariales', array('id' => $s['id'])) ?>"><?php echo $s['title']; ?></a></li>
                <?php } ?>

            </ul>
        </div>
    </div>  
<?php else: ?>
    <div class="row">
        <div class="span11">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/seguros/<?php echo $seguros['link_img']; ?>"/>	
        </div>
    </div>
    <div class="row">
        <div class="span8" id="cont-hogar">
            <div class="home-icon">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/<?php echo $icono; ?>"/> 
            </div>
            <div class="hogar-title">
                <h2><?php echo $seguros['title']; ?></h2>
            </div>
            <div class="clear"></div>
            <p><?php echo $seguros['desc_min']; ?></p>
            <div>

                <?php echo $seguros['contenido']; ?>
                <?php if ($seguros['link_attachment'] != ''): ?>
                    <div class="descargas">
                        <ul>
                            <?php
                            $params = explode('@', $seguros['link_attachment']);
                            for ($j = 0; $j < count($params); $j++) {
                                ?>
                                <li><a href="/ecuasuiza/uploads/<?php echo $params[$j]; ?>" target="_blank">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_pdf.png"/>
                                        <p><?php echo $params[$j]; ?></p></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($id == 76): ?>
                <div class="home-icon">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/<?php echo $icono; ?>"/> 
                </div>
                <div class="hogar-title">
                    <h2>Fidelidad Pública</h2>
                </div>
                <div class="clear"></div>
                <p>La póliza de Fidelidad Pública cubre a las empresas públicas de cualquier pérdida económica o de bienes a 
                    consecuencias de actos dolosos causados por empleados o contratistas del asegurado.</p>
                <h3>Principales Coberturas:</h3>
                <ul><li>Actos delictivos de: falsificación, desfalco, malversación, hurto, robo, estafa o 
                        apropiación indebida con el dinero&nbsp;o bienes del Asegurado.</li>
                </ul><br>
            <?php endif; ?> 
        </div>
        <div class="span2">
            <div class="btn-cotizar">
                <a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
                <a href="<?php echo Yii::app()->createUrl('cotizador/cotizador') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/cotizar.jpg"/></a>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="row">
    <div class="span11" id="divisor-down">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/line_down.png"/> 
    </div>
</div>
<div class="row cont-icos">
    <h4>OTROS PRODUCTOS ></h4>
    <div class="span3"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 53)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
    <div class="span3"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 49)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_hogar.png"/></a></div>
    <div class="span3"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 54)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>
</div>


