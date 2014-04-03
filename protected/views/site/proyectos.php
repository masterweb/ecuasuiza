<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
<!-- Optionally add helpers - button, thumbnail and/or media -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<?php
/* @var $this TrabajaNosotrosController */
/* @var $model TrabajaNosotros */
$id = 0;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}
$articulo = Articulos::model()->findByAttributes(array('id_articulos' => $id));

$this->widget('zii.widgets.CBreadcrumbs', array(
    'links' => array(
        'Nosotros',
        'Proyectos'
    ),
    'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));
?>
<div class="row">
    <div class="span3">
        <ul class="page-sidebar-menu" id="yw0">
            <li>Nosotros
                <ul>
                    <li <?php if($id == 5):?>class="active" <?php endif; ?>><a href="<?php echo Yii::app()->createUrl('site/nosotros' ,array('id'=>5)) ?>">¿Quiénes Somos? </a></li>
                    <li <?php if($id == 12):?>class="active" <?php endif; ?>><a href="<?php echo Yii::app()->createUrl('site/nosotros' ,array('id'=>12)) ?>">Historia </a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('site/misionvision', array('id' => 10)) ?>">Misión Visión</a></li>
                    <!--<li <?php if($id == 13):?>class="active" <?php endif; ?>><a href="<?php echo Yii::app()->createUrl('site/nosotros', array('id' => 13)) ?>">Politica de Calidad</a></li>-->
                    <li><a href="<?php echo Yii::app()->createUrl('site/reaseguradores', array('id' => 6)) ?>">Reaseguradores</a></li>
                    <li class="active"><a href="<?php echo Yii::app()->createUrl('site/proyectos', array('id' => 9)) ?>">Proyectos</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="span7 nosotros" id="cont-hogar">
        <div class="hogar-title-qs">
            <h2><?php echo $articulo['title']; ?></h2>
        </div>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/noticias/<?php echo $articulo['link_img']; ?>"/>
        <br><br>
        <div class="art-qs">
            <?php //echo $articulo['contenido']; ?>
            <div style="text-align: justify;">
                En Ecuatoriano Suiza estamos conscientes de los grandes cambios clim&aacute;ticos por el que est&aacute; atravesando nuestro planeta. Para lo cual estamos trabajando en un cambio en la cultura de consumo, trabajo, pensamiento y principalmente en tener conciencia de la importancia que tienen nuestras acciones dentro del ecosistema de la Tierra.</div>
            <div style="text-align: justify;">
                El objetivo de entrar en este proceso de la Carbono Neutralidad es disminuir nuestro impacto en el medio ambiente al reducir y compensar las emisiones de gases de efecto invernadero que estamos generando con nuestra actividad productiva.</div>
            <div style="text-align: justify;">
                Una de las ventajas de la carbono neutralidad, es que las empresas remueven el CO2 de la atm&oacute;sfera a trav&eacute;s de la siembra o el apoyo a la conservaci&oacute;n de bosques, lo que disminuye la concentraci&oacute;n de estos gases en la atmosfera, esto es importante porque esto evita que se eleve m&aacute;s la temperatura del planeta.</div>

            <div style="text-align: center; margin:15px 0px;">
                <a class="fancybox" href="#fc1" data-fancybox-group="gallery"><img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/neutro_1.jpg" class="img-polaroid"/></a>
                <a class="fancybox" href="#fc2" data-fancybox-group="gallery"><img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/neutro_2.jpg" class="img-polaroid"/></a>
                <a class="fancybox" href="#fc3" data-fancybox-group="gallery"><img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/neutro_3.jpg" class="img-polaroid"/></a>
            </div>
            <div>

                <div>
                    <strong>Ecotips:</strong></div>
                <ul>
                    <li>
                        Cada tonelada de papel reciclado salva 17 &aacute;rboles de diez metros y ahorra 26,500 litros de agua y 1,440 litros de petr&oacute;leo.</li>
                    <li>
                        Muchos materiales (como el aluminio y el vidrio) se pueden reciclar varias veces, multiplicando los beneficios del reciclaje.</li>
                    <li>
                        Recuperar dos toneladas de pl&aacute;stico equivale a ahorrar una tonelada de petr&oacute;leo.</li>
                    <li>
                        La energ&iacute;a que se ahorra al reciclar una botella de pl&aacute;stico puede dar la energ&iacute;a suficiente para mantener encendida una bombilla de 100 vatios durante casi 60 minutos.</li>
                    <li>
                        El acero como el aluminio son 100 por ciento reciclables.</li>
                    <li>
                        Dependiendo de la calidad y limpieza del papel, de desecho, aproximadamente un 75 a 95% del mismo puede convertirse en nuevos productos de papel.</li>
                    <li>
                        Por cada kg de pl&aacute;stico reciclado el ahorro es de 1,5kg en emisiones de CO2.</li>
                    <li>
                        Enjuaga los platos todos juntos y con la llave abierta a la mitad.</li>
                    <li>
                        Una tonelada de papel elaborado a partir de &aacute;rboles necesita 200.000 litros de agua, mientras una tonelada de papel reciclado necesita 20.000.</li>
                    <li>
                        Guarda tu almuerzo en objetos reutilizables.</li>
                    <li>
                        Procura no comprar bebidas en botellas pl&aacute;sticas, usa un termo.&nbsp;</li>
                    <li>
                        Usar focos ahorradores, reduce un 80%el consumo de energ&iacute;a.&nbsp;</li>
                    <li>
                        Siembra 1 &aacute;rbol, cada 1 provee oxigeno para 10 personas.&nbsp;</li>
                    <li>
                        Utiliza bater&iacute;as recargables. Una bater&iacute;a recargable sustituye aproximadamente a 100 desechables.</li>
                    <li>
                        Ahorra recursos: apaga las &nbsp;luces, desconecta equipos que no uses, cierra bien la llave; una llave goteando desperdicia hasta 40 litros por hora.&nbsp;</li>
                    <li>
                        Disminuye la contaminaci&oacute;n: No quemes la basura, no tires desechos a la calle y recicla.&nbsp;</li>
                    <li>
                        Siembra &aacute;rboles, haz un huerto en tu casa o escuela y utiliza productos org&aacute;nicos.&nbsp;</li>
                    <li>
                        Clasifica, recicla y reutilizando los desechos.</li>
                    <li>
                        Recuerda que BASURA es todo desecho sin potencialidad de re&uacute;so o reciclaje mientras que DESECHO es todo desperdicio que puede ser reusado o reciclado.</li>
                </ul>
            </div>
            <div style="text-align: center;">
                <img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/carbono_1.png" style="margin: 0px 20px;"/>
                <img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/sambito.png" style="margin: 0px 20px;"/>
            </div>

            <div id="fc1" class="cont_galeria" style="padding: 5px;display:none">
                <img alt="" src="http://preproduccion.ariadna.us/ecuasuiza/uploads/images/neutro_big_1.jpg"/>
            </div>
            <div id="fc2" class="cont_galeria" style="padding: 5px;display:none">
                <img alt="" src="http://preproduccion.ariadna.us/ecuasuiza/uploads/images/neutro_big_2.jpg"/>
            </div>
            <div id="fc3" class="cont_galeria" style="padding: 5px;display:none">
                <img alt="" src="http://preproduccion.ariadna.us/ecuasuiza/uploads/images/neutro_big_3.jpg"/>
            </div>
            <p>
                &nbsp;</p>

        </div>

    </div>
    <!--    <div class="span2">
            <div class="btn-cotizar">
                <a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
                <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/cotizar.jpg"/></a>
            </div>
        </div>-->
    <div class="row">
        <div class="span11" id="divisor-down">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/line_down.png"/> 
        </div>
    </div>
    <div class="row cont-icos">
        <h4>OTROS PRODUCTOS ></h4>
        <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 53)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
        <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 49)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_hogar.png"/></a></div>

        <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 54)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>
        <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/empresariales') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_empresarial.png"/></a></div>
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