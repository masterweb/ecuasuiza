<?php
/* @var $this SiteController */
$id = 0;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}
$servicios = Servicios::model()->findByAttributes(array('id' => $id));
$this->pageTitle = Yii::app()->name;
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
        'Reclamos',
        $servicios['title'],
    ),
));
?>

<div class="row">
    <div class="span11">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/servicios/<?php echo $servicios['banner']; ?>"/>	
    </div>
</div>
<div class="row">
    <div class="span8" id="cont-hogar">
        <!--            <div class="home-icon">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_empresarial.png"/> 
                    </div>-->
        <div class="hogar-title">
            <h2><?php echo $servicios['title']; ?></h2>
        </div>
        <div class="clear"></div>
        <p><?php echo $servicios['desc_min']; ?></p>
        <div>
            <!--                <h3>PRINCIPALES COBERTURAS:</h3>
                            <ul>
                                <li>Incendio</li>
                                <li>Terremoto, temblor y erupción volcánica</li>
                                <li>Explosión</li>
                                <li>Tsunami</li>
                                <li>Daños por agua</li>
                                <li>LLuvia e inundación</li>
                                <li>Motín y huelga</li>
                                <li>Terrorismo</li>
                                <li>Colapso</li>
                                <li>Daños Maliciosos</li>
                            </ul>-->
            <?php echo $servicios['contenido']; ?>
            <h3 class="desc-title">DESCARGAS:</h3>
            <div class="descargas">
                <ul>
                <?php
                $adjuntos = $servicios['num_adjuntos'];
                if ($adjuntos > 0) {
                    echo '<li><a href="/ecuasuiza/uploads/servicios/' . $servicios['adjunto'] . '"><img src="'.Yii::app()->request->baseUrl.'/img/hogar/icon_pdf.png"/>' . $servicios['adjunto'] . '</a></li>';
                    for ($i = 2; $i <= $adjuntos; $i++) {
                        echo '<li><a href="/ecuasuiza/uploads/servicios/' . $servicios["adjunto{$i}"] . '"><img src="'.Yii::app()->request->baseUrl.'/img/hogar/icon_pdf.png"/>' . $servicios["adjunto{$i}"] . '</a></li>';
                    }
                }
                ?>
                </ul>
            </div>
            <!--                <div class="descargas">
                                <ul>
                                    <li><a href="/ecuasuiza/uploads/<?php //echo $servicios['link_attachment'];   ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_pdf.png"/><p>Condiciones Generales de la póliza <?php echo $servicios['title']; ?></p></a></li>
            
                                </ul>
            
                            </div>-->

        </div>
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
    <div class="span3"><a href="<?php echo Yii::app()->createUrl('hogar/index') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_hogar.png"/></a></div>
    <div class="span3"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
    <div class="span3"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>
</div>
