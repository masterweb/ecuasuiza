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
        'Reaseguradores'
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
                    <li class="active"><a href="<?php echo Yii::app()->createUrl('site/reaseguradores', array('id' => 6)) ?>">Reaseguradores</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('site/proyectos', array('id' => 9)) ?>">Proyectos</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="span7 nosotros" id="cont-hogar">
        <div class="hogar-title-qs">
            <h2><?php echo $articulo['title']; ?></h2>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/noticias/<?php echo $articulo['link_img']; ?>" usemap="#xlgroup" style="display:block; margin: 0 auto;"/>
            <map name="xlgroup" id="xlgroup">
                <area shape="rect" coords="123,79,328,130" href="http://www.hannover-rueck.de" target="_blank" />
                <area shape="rect" coords="415,80,580,121" href="http://www.swissre.com" target="_blank" />
                <area shape="rect" coords="125,146,317,228" href="http://www.everestre.com/" target="_blank" />
                <area shape="rect" coords="426,153,581,217" href="http://www.xlgroup.com" target="_blank" />
            </map>
            <div class="art-qs reaseguradores">


                <!--                    <div class="span3">
                                        <p>
                                            <a href="http://www.hannover-rueck.de" target="_blank"><img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/hannover.jpg" /></a></p>
                                        <p> HANNOVER RE</p>
                                    </div>
                                    <div class="span3">
                                        <p>
                                            <a href="http://www.swissre.com" target="_blank"><img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/swiss.jpg" /></a></p>
                                        <p> SWISS REINSURANCE</p>
                                    </div>
                
                                    <div class="span2">
                                        <p>
                                            <a href="http://www.scor.com" target="_blank"><img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/scor.jpg" /></a></p>
                                        <p>SCOR RE</p>
                                    </div>-->

                <!--                <div class="row">
                                    <div class="span3">
                                        <p>
                                            <a href="http://www.xlgroup.com" target="_blank"><img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/xlre.jpg"/></a></p>
                                        <p>XL RE</p>
                                    </div>
                                    <div class="span3">
                                        <p>
                                            <a href="http://www.everestre.com/" target="_blank"><img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/everest.jpg"/></a></p>
                                        <p>EVEREST&nbsp;RE</p>
                                    </div>
                                </div>-->
                <p>Al responsable y serio manejo financiero que caracteriza a la Compa&ntilde;&iacute;a 
                    de Seguros Ecuatoriano-Suiza S.A. como pol&iacute;tica empresarial, se le suma el 
                    elemento adicional de confianza que respalda cada uno de sus productos, 
                    gracias al apoyo de empresas l&iacute;deres en el mercado mundial de reaseguros. &nbsp;</p>
                <div>
                    <p>
                        Para una mejor comprensi&oacute;n de este factor, es necesario conocer la importancia del reaseguro en nuestra actividad, el mismo que es considerado como el &ldquo;Seguro del Seguro&rdquo;. Mediante este sistema se dispersan geogr&aacute;ficamente los riesgos asumidos por las empresas aseguradoras, a fin de evitar concentraciones de p&eacute;rdidas que puedan entra&ntilde;ar serios inconvenientes para el desarrollo de sus actividades.&nbsp;</p>
                    <p>
                        <br />
                        En cierto tipo de seguros, este respaldo reviste mayor importancia, ya que el asegurador asume elevados montos, expuesto a eventos catastr&oacute;ficos, tales como terremotos, inundaciones, erupciones volc&aacute;nicas entre otros riegos. Y si bien es cierto que la compa&ntilde;&iacute;a de seguros es la que responde directamente a los asegurados por los compromisos adquiridos, no es menos cierto que una estructura de reaseguro t&eacute;cnicamente dise&ntilde;ada, junto con el respaldo de un grupo de reaseguradores de primer nivel, son elementos b&aacute;sicos que deben considerarse en la contrataci&oacute;n de todo programa de seguros.&nbsp;</p>
                    <p>
                        <br />
                        Por todo lo expuesto, orgullosamente venimos ofreciendo a nuestros asegurados, por varias d&eacute;cadas, uno de los mejores paneles de reaseguradoras a nivel mundial, para todos los contratos autom&aacute;ticos tanto proporcionales como no proporcionales, y de igual forma para todos los contratos facultativos.</p>
                </div>
                <p>
                    &nbsp;</p>

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
        <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 49)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_hogar.png"/></a></div>
        <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 54)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>
        <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/empresariales') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_empresarial.png"/></a></div>
    </div>
</div>