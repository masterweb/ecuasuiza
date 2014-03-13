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
    'Seguros Empresariales' => array('seguros/empresariales'),
    $seguros['title'],
);
?>
<?php
if ($id == 0):

    $condition = 'categoria ="empresarial"';
    $limit = 10;
    $offset = 0;

    $criteria = new CDbCriteria(array(
                'condition' => $condition,
                'limit' => $limit,
                'offset' => $offset
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
                    <li><a href="<?php echo Yii::app()->createUrl('/seguros/empresariales', array('id' => $s['id'])) ?>"><?php echo $s['title']; ?> ></a></li>
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
                        'offset' => $offset
                    ));

            $seguros = Seguros::model()->findAll($criteria);
            ?>    
            <ul>
                <?php foreach ($seguros as $s) { ?>
                    <li><a href="<?php echo Yii::app()->createUrl('/seguros/empresariales', array('id' => $s['id'])) ?>"><?php echo $s['title']; ?> ></a></li>
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
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_empresarial.png"/> 
            </div>
            <div class="hogar-title">
                <h2><?php echo $seguros['title']; ?></h2>
            </div>
            <div class="clear"></div>
            <p><?php echo $seguros['desc_min']; ?></p>
            <div>

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
    <div class="span3"><a href="<?php echo Yii::app()->createUrl('hogar/index') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_hogar.png"/></a></div>
    <div class="span3"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 53)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
    <div class="span3"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 54)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>
</div>
<ul>
    <li><a href=""></a>LINK</li>
    <li><a href=""></a>LINK</li>
    <li><a href=""></a>LINK</li>
    <li><a href=""></a>LINK</li>
</ul>
