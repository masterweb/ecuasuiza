<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
<!-- Optionally add helpers - button, thumbnail and/or media -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<?php
/* @var $this ArticulosController */
/* @var $dataProvider CActiveDataProvider */
$id = 0;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}
$articulo = Articulos::model()->findByAttributes(array('id_articulos' => $id));
$this->breadcrumbs = array(
    'Noticias' => array('noticias/index'),
    $articulo['title'],
);

$this->menu = array(
    array('label' => 'Create Articulos', 'url' => array('create')),
    array('label' => 'Manage Articulos', 'url' => array('admin')),
);
?>
<div class="row">
    <div class="span8 noticias" id="cont-hogar">
        <div class="hogar-title">
            <h2><?php echo $articulo['title']; ?></h2>
        </div>
        <div class="clear"></div>
<!--        <p><?php echo $articulo['desc_min']; ?></p>-->
        <div>
            <?php echo $articulo['contenido']; ?>
        </div>
        <div>
            <?php if ($articulo['pdf'] != ''): ?>
                <h3 class="desc-title">DESCARGAS:</h3>
                <div class="descargas">
                    <ul>
                        <li><a href="/ecuasuiza/uploads/<?php echo $articulo['pdf']; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_pdf.png"/><p><?php echo $articulo['pdf']; ?></p></a></li>

                    </ul>

                </div>
            <?php endif; ?>
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
    <div class="span3">
        <h3 class="title-otras">Otras Noticias Destacadas</h3>
    </div>

</div>
<div class="row">
    <div class="span8">
        <?php
        $criteria = new CDbCriteria;
        $criteria->condition = 'categoria="news"';
        $noti = Articulos::model()->findAll($criteria);
        $data = '<ul class="list-noticias">';
        foreach ($noti as $value) {
            if ($value['id_articulos'] != $id) {
                $data .= '<li><a href="' . Yii::app()->createUrl('/articulos/index', array('id' => $value['id_articulos'])) . '">' . $value['title'] . '</a></li>';
            }
        }
        $data .= '</ul>';
        echo $data;
        ?>
    </div>
</div>
<div class="row">
    <div class="span11" id="divisor-down">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/line_down.png"/> 
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            arrows    : true,
            prevEffect		: 'none',
            nextEffect		: 'none',
            closeBtn		: true          
        });
    });
	
</script>
