<?php
$this->pageTitle = Yii::app()->name;
$id = 0;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}
$seguros = Seguros::model()->findByAttributes(array('id' => $id));
?>
<?php
$this->breadcrumbs = array(
    'Seguros Individuales',
    $seguros['title']
);
?>
<?php if ($id == 0): ?> 
    <div class="row empresarial">
        <div class="span5">
            <ul>
                <li><a href="">ACCIDENTES PERSONALES ></a></li>
                <li><a href="">CASCO DE BUQUE ></li>
                <li><a href="">CESANTE POR ROTURA DE MAQUINARIA ></a></li>
                <li><a href="">EQUIPO Y MAQUINARIA CONTRATISTAS  ></a></li>
                <li><a href="">INCENDIOS ></a></li>
                <li><a href="">OBRAS CIVILES TERMINADAS ></a></li>
                <li><a href="">RIESGO BANCARIO ></a></li>
                <li><a href="">ROTURA DE MAQUINARIA ></a></li>
                <li><a href="">TODO RIESGO MONTAJE ></a></li>
                <li><a href="">VEHÍCULOS ></a></li>
            </ul>
        </div>
        <div class="span5">
            <ul>
                <li><a href="">CASCO AÉREO ></a></li>
                <li><a href="">CESANTE POR INCENDIO ></a></li>
                <li><a href="">EQUIPO ELECTRÓNICO ></a></li>
                <li><a href="">FIDELIDAD ></a></li>
                <li><a href="">MONTAJE DE MAQUINARIA ></a></li>
                <li><a href="">RESPONSABILIDAD CIVIL ></a></li>
                <li><a href="">ROBO ></a></li>
                <li><a href="">TODO RIESGO CONTRATISTA ></a></li>
                <li><a href="">TRANSPORTE ></a></li>
                <li><a href="">VIDA COLECTIVO ></a></li>
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
                <?php
                switch ($seguros['categoria']) {
                    case 'hogar':
                        echo '<img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_home.png"/>';
                        break;
                    case 'auto':
                        echo '<img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_auto.png"/>';
                        break;
                    case 'vida':
                        echo '<img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_vida.png"/>';
                        break;
                    case 'empresarial':
                        echo '<img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_empresarial.png"/>';
                        break;

                    default:
                        break;
                }
                ?>
    <!--                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_empresarial.png"/> -->
            </div>
            <div class="hogar-title">
                <h2><?php echo $seguros['title']; ?></h2>
            </div>
            <div class="clear"></div>
            <p><?php echo $seguros['desc_min']; ?></p>
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
                <?php echo $seguros['contenido']; ?>
                <h3 class="desc-title">DESCARGAS:</h3>
                <div class="descargas">
                    <ul>
                        <li><a href="/ecuasuiza/uploads/<?php echo $seguros['link_attachment']; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_pdf.png"/><p>Condiciones Generales de la póliza <?php echo $seguros['title']; ?></p></a></li>

                    </ul>

                </div>

            </div>
        </div>
        <div class="span2">
            <div class="btn-cotizar">
                <a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
                <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/cotizar.jpg"/></a>
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
    <?php
    switch ($seguros['categoria']) {
        case 'hogar':
            $data = '<div class="span3"><a href="'. Yii::app()->createUrl('seguros/empresariales').'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_empresarial.png"/></a></div>
            <div class="span3"><a href="'. Yii::app()->createUrl('seguros/individuales', array('id' => 53)).'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_auto.png"/></a></div>
            <div class="span3"><a href="'. Yii::app()->createUrl('seguros/individuales', array('id' => 54)).'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_vida.png"/></a></div>';
            echo $data;
            break;
        case 'auto':
            $data = '<div class="span3"><a href="'. Yii::app()->createUrl('seguros/individuales', array('id' => 49)).'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_hogar.png"/></a></div>
            <div class="span3"><a href="'. Yii::app()->createUrl('seguros/empresariales').'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_empresarial.png"/></a></div>
            <div class="span3"><a href="'. Yii::app()->createUrl('seguros/individuales', array('id' => 54)).'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_vida.png"/></a></div>';
            echo $data;
            break;
        case 'vida':
            $data = '<div class="span3"><a href="'. Yii::app()->createUrl('seguros/individuales', array('id' => 49)).'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_hogar.png"/></a></div>
            <div class="span3"><a href="'. Yii::app()->createUrl('seguros/individuales', array('id' => 53)).'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_auto.png"/></a></div>
            <div class="span3"><a href="'. Yii::app()->createUrl('seguros/empresariales').'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_empresarial.png"/></a></div>';
            echo $data;
            break;
        case 'empresarial':
            $data = '<div class="span3"><a href="'. Yii::app()->createUrl('seguros/individuales', array('id' => 49)).'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_hogar.png"/></a></div>
            <div class="span3"><a href="'. Yii::app()->createUrl('seguros/individuales', array('id' => 53)).'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_auto.png"/></a></div>
            <div class="span3"><a href="'. Yii::app()->createUrl('seguros/individuales', array('id' => 54)).'"><img src="'. Yii::app()->request->baseUrl.'/img/hogar/seg_vida.png"/></a></div>';
            echo $data;
            break;

        default:
            break;
    }
    ?>
<!--    <div class="span3"><a href="<?php echo Yii::app()->createUrl('hogar/index') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_hogar.png"/></a></div>
    <div class="span3"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
    <div class="span3"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>-->
</div>
