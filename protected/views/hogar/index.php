<?php
$this->pageTitle = Yii::app()->name . ' - Hogar';
$this->breadcrumbs = array(
    'Hogar',
);
?>

<div class="row">
    <div class="span11">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/hogar_banner.jpg"/>	
    </div>
</div>
<div class="row">
    <div class="span8" id="cont-hogar">
        <div class="home-icon">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_home.png"/> 
        </div>
        <div class="hogar-title">
            <h2>Suiza Hogar</h2>
        </div>
        <div class="clear"></div>
        <p>Esta póliza integral sirve para cubrir el patrimonio familiar ya que ampara la estructura
            física y los contenidos de tu vivienda en caso de pérdida total o parcial.</p>
        <div>
            <h3>PRINCIPALES COBERTURAS:</h3>
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
            </ul>
            <h3 class="desc-title">DESCARGAS:</h3>
            <div class="descargas">
                <ul>
                    <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_pdf.png"/><p>Condiciones Generales de la póliza Suiza Hogar</p></li>
                    <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_pdf.png"/><p>Condiciones Generales de la póliza Suiza Hogar</p></li>
                    <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_pdf.png"/><p>Condiciones Generales de la póliza Suiza Hogar</p></li>
                </ul>

            </div>

        </div>
    </div>
    <div class="span2">
        <div class="btn-cotizar">
            <a href="<?php echo Yii::app()->createUrl('site/contactenos')?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
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


