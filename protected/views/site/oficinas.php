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
        'Contáctenos',
        'Oficinas'
    ),
    'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));
?>
<div class="row">
    <div class="span3">
        <ul class="page-sidebar-menu" id="yw0">
            <li>Oficinas
                <ul>
                    <li><a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>">Contáctenos </a></li>
                    <li class="active"><a href="#">Oficinas </a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('trabajaNosotros/create') ?>">Trabaja con Nosotros</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="span7 nosotros" id="cont-hogar">
        <div class="hogar-title-qs">
            <h2><?php echo $articulo['title']; ?></h2>
            <div class="art-qs">
                <?php //echo $articulo['contenido']; ?>
                <div class="img-content">
                    <img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/banner_GYE.jpg" />
                    <div class="direccion">
                        <h5>
                            Guayaquil</h5>
                        <br />
                        <strong>Direcci&oacute;n:</strong> Av. 9 de Octubre 2101 y Tulc&aacute;n<br />
                        <strong>Telf:</strong> (593 4) 373 15 15<br />
                        <strong>Fax:</strong>&nbsp;(593 4) 245 22 00
                        <strong>Casilla:</strong>&nbsp;09.01.397


                    </div>
<!--                    <div id="more-content">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/btn_CONTACTOS.png"/>
                    </div>-->
                    <div class="text-more-content">
                        <strong>Gerente </strong>
                        <p>Alejandro Arosemena Ext. 403</p>
                        <strong>Área Comercial </strong>
                        <p>Jaime Guzmán</p>
                        <p>Gerente Comercial Ext. 110</p>
                        <p>jaime.guzman@ecuasuiza.ec</p>
                        <strong>Cuentas Nuevas</strong>
                        <p>Andrea Chávez</p>
                        <p>Ejecutiva Comercial Ext. 117</p>
                        <p>andrea.chavez@ecuauiza.ec</p>
                        <strong>Banca Seguros</strong>
                        <p>Jessica Terán</p>
                        <p>Coordinadora Banca Seguros Ext. 124</p>
                        <p>jessica.teran@ecuasuiza.ec</p>


                        <strong>AREA TECNICA Y SINIESTROS</strong>
                        <p>Carlos Espinosa Covelli</p>
                        <p>Gerente Técnico y Siniestros Ext.  140</p>
                        <p>carlos.espinoza@ecuasuiza.ec</p>
                        <br>
                        <p>Melissa Cedeño</p>
                        <p>Coordinador de Siniestros Ramos Generales Ext. 131</p>
                        <p>melissa.cedeno@ecuasuiza.ec</p>
                        <br>
                        <p>Rubén Cárdenas</p>
                        <p>Coordinador de Siniestros Ramo Vehículo Ext. 135</p>
                        <p>ruben.cardenas@ecuasuiza.ec</p>


                        <strong>AREA MERCADEO</strong>
                        <p>Angie Aguirre</p>
                        <p>Gerente de Marketing Ext. 408</p>
                        <p>angie.aguirre@ecuasuiza.ec</p>
                        <br>
                        <p>Verónica Sotomayor</p>
                        <p>Coordinadora Servicio al Cliente Ext.186</p>
                        <p>veronica.sotomayor@ecuasuiza.ec</p>


                        <strong>AREA RRHH</strong>
                        <p>Vanessa Díaz</p>
                        <p>Jefe Administrativa - RRHH   Ext 180</p>
                        <p>vanessa.diaz@ecuasuiza.ec</p>
                        <br>
                        <p>Mercedes Gonzalez</p>
                        <p>Asistente Administrativa - RRHH  Ext 181</p>
                        <p>mercedes.gonzalez@ecuasuiza.ec</p>
                    </div>
                </div>
                <div class="img-content">
                    <img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/banner_UIO.jpg"/>
                    <div class="direccion2">
                        <h5>
                            Quito</h5>
                        <br />
                        <strong>Direcci&oacute;n:</strong> Av. de los Shyris No. 1167 (N37-27) y Av. Naciones Unidas.<br />
                        Edificio Silvia Nuñez, Piso 8.<br />
                        <strong>Telf:</strong> (593 2) 373 15 15<br />
                        <strong>Casilla:</strong>&nbsp;17.01.2318
                    </div>
<!--                    <div id="more-content2">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/btn_CONTACTOS.png"/>
                    </div>-->
                    <div class="text-more-content2">
                        <strong>GERENCIA SUCURSAL</strong>
                        <p>Dayan Arguello Ext.250</p>
                        <br>
                        <p>Miguel Ochoa Ext.</p>
                        <p>Jefe de Negocios Masivos Ext. 220</p>
                        <p>miguel.ochoa@ecuasuiza.ec</p>
                        <br>

                        <strong>Cuentas</strong>
                        <p>Lourdes Hernández</p>
                        <p>Ejecutiva Comercial Ext. 229</p>
                        <p>lourdes.hernandez@ecuasuiza.ec</p>
                        <br>

                        <strong>SINIESTROS</strong>
                        <p>Luis Muñoz</p>
                        <p>Jefe de Siniestros Ext.230</p>
                        <p>luis.munoz@ecuasuiza.ec</p>
                        <br>

                        <strong>OPERACIONES</strong>
                        <p>Carlos Balda</p>
                        <p>Jefe de Emisiones Ext. 210</p>
                        <p>carlos.balda@ecuasuiza.ec</p>

                    </div>
                </div>
                <div class="img-content">
                    <img alt="" src="http://preproduccion.ariadna.us//ecuasuiza/uploads/images/banner_STO.jpg" />
                    <div class="direccion3">
                        <h5>
                            Sto.Domingo</h5>
                        <br />
                        <strong>Direcci&oacute;n:</strong> Urb. Banco de Fomento, R&iacute;o Leila entre Z&aacute;paros y Zarzas<br />
                        Edificio Eugenia Rivas de Checa PB<br />
                        <strong>Telf:</strong> (593 2) 373 15 15
                    </div>
<!--                    <div id="more-content3">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/btn_CONTACTOS.png"/>
                    </div>-->
                    <div class="text-more-content3">
                        <strong>AREA COMERCIAL</strong>
                        <p>Vanessa Orellana</p>
                        <p>Ejecutiva Comercial Ext. 228</p>
                        <p>vanessa.orellana@ecuasuiza.ec</p>

                        <strong>JEFE AGENCIA</strong>
                        <p>Sylvia Cerezo Ext. 227</p>
                        <br>
                        <strong>AREA COMERCIAL</strong><p>Vanessa Orellana</p>
                        <p>Ejecutiva Comercial Ext. 228</p>
                        <p>vanessa.orellana@ecuasuiza.ec</p>
                    </div>
                </div>
                
            </div>


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