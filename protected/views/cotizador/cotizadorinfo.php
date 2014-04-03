<?php
$tipo = '';
if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
}
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links' => array(
        'Cotizador',
        ucfirst($tipo),
    ),
    'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));
?>
<style>
    .form{
        margin: 50px 0 20px;
    }
    .form input[type="text"] {
        height: 13px !important;
        width: 214px !important;
    }
    .form select {
        width: 227px;
        margin-top: 0px !important;
    }
    .btnSend{
        margin-top: 15px;
    }
    label {
        margin-bottom: 2px;
    }
</style>
<div class="row">
    <div class="span8">
        <?php if (!Yii::app()->user->hasFlash('cotizadorinfo')): ?>
        <div class="home-icon">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/icono_cotizador.png"/> 
        </div>
        <div id="coti-title">
            <h2>Cotizador <?php echo ' ' . ucfirst($tipo); ?></h2>
        </div>
        <?php endif; ?>
        <?php if (Yii::app()->user->hasFlash('cotizadorinfo')): ?>
            <div id="confirmate">
                <div class="flash-success">
                    <?php echo Yii::app()->user->getFlash('cotizadorinfo'); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="span2">
        <div class="btn-cotizar">
            <a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="span8">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/cotizador_6.jpg"/>
    </div>
</div>

<div class="row">
    <div class="span8">


        <?php if ($tipo == 'hogar' || $tipo == 'vida' || $tipo == 'empresarial'): ?>
            <h4 class="cotizador-title">Ingresa tus datos para brindarte una atención personalizada:</h4>
            <div class="form">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'cotizador-form-hogar',
                    'action' => Yii::app()->createUrl('cotizador/create'),
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'form'),
                        ));
                ?>

                <?php echo $form->errorSummary($model); ?>

                <div class="row">
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'nombres'); ?>
                        <?php echo $form->textField($model, 'nombres', array('size' => 100, 'maxlength' => 200)); ?>
                        <?php echo $form->error($model, 'nombres'); ?>
                    </div>
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'email'); ?>
                        <?php echo $form->textField($model, 'email', array('size' => 100, 'maxlength' => 200)); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>

                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'apellidos'); ?>
                    <?php echo $form->textField($model, 'apellidos', array('size' => 100, 'maxlength' => 200)); ?>
                    <?php echo $form->error($model, 'apellidos'); ?>
                </div>

                <div class="row">
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'cedula'); ?>
                        <?php echo $form->textField($model, 'cedula', array('size' => 100, 'maxlength' => 250)); ?>
                        <?php echo $form->error($model, 'cedula'); ?>
                    </div>
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'telefono'); ?>
                        <?php echo $form->textField($model, 'telefono', array('size' => 100, 'maxlength' => 200)); ?>
                        <?php echo $form->error($model, 'telefono'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'provincia'); ?>
                        <?php
                        echo $form->dropDownList($model, 'provincia', array('' => '---Seleccione una provincia---',
                            'azuay' => 'Azuay',
                            'bolivar' => 'Bolivar',
                            'canar' => 'Cañar',
                            'carchi' => 'Carchi',
                            'chimborazo' => 'Chimborazo',
                            'eloro' => 'El Oro',
                            'esmeraldas' => 'Esmeraldas',
                            'galapagos' => 'Galapagos',
                            'guayas' => 'Guayas',
                            'imbabura' => 'Imbabura',
                            'loja' => 'Loja',
                            'losrios' => 'Los Rios',
                            'manabi' => 'Manabi',
                            'moronasantiago' => 'Morona Santiago',
                            'napo' => 'Napo',
                            'orellana' => 'Orellana',
                            'pastaza' => 'Pastaza',
                            'pichincha' => 'Pichincha',
                            'santaelena' => 'Santa Elena',
                            'santodomingo' => 'Santo Domingo',
                            'sucumbios' => 'Sucumbios',
                            'tungurahua' => 'Tungurahua',
                            'zamorachinchipe' => 'Zamora Chinchipe',
                        ));
                        ?>
                        <?php echo $form->error($model, 'provincia'); ?>
                    </div>
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'celular'); ?>
                        <?php echo $form->textField($model, 'celular', array('size' => 100, 'maxlength' => 150)); ?>
                        <?php echo $form->error($model, 'celular'); ?>
                    </div>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'ciudad'); ?>
                    <?php echo $form->dropDownList($model, 'ciudad', array('' => '---Seleccione una ciudad---')); ?>
                    <?php echo $form->error($model, 'ciudad'); ?>
                </div>
                <input type="hidden" name="Cotizador[tipo]" value="<?php echo $tipo; ?>">
                <div class="row">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Save', array('class' => 'btnSend')); ?>
                </div>

                <?php $this->endWidget(); ?>
            </div>
        <?php endif; ?>
        <?php if ($tipo == 'auto'): ?>
            <h4 class="cotizador-title">Ingresa tus datos para realizar la cotización:</h4>
            <div class="form">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'cotizador-form-auto',
                    'action' => Yii::app()->createUrl('cotizador/create'),
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'form'),
                        ));
                ?>

                <?php echo $form->errorSummary($model); ?>

                <div class="row">
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'nombres'); ?>
                        <?php echo $form->textField($model, 'nombres', array('size' => 100, 'maxlength' => 200)); ?>
                        <?php echo $form->error($model, 'nombres'); ?>
                    </div>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'apellidos'); ?>
                    <?php echo $form->textField($model, 'apellidos', array('size' => 100, 'maxlength' => 200)); ?>
                    <?php echo $form->error($model, 'apellidos'); ?>
                </div>

                <div class="row">
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'cedula'); ?>
                        <?php echo $form->textField($model, 'cedula', array('size' => 100, 'maxlength' => 250)); ?>
                        <?php echo $form->error($model, 'cedula'); ?>
                    </div>
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'email'); ?>
                        <?php echo $form->textField($model, 'email', array('size' => 100, 'maxlength' => 200)); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'provincia'); ?>
                        <?php
                        echo $form->dropDownList($model, 'provincia', array('' => '---Seleccione una provincia---',
                            'azuay' => 'Azuay',
                            'bolivar' => 'Bolivar',
                            'canar' => 'Cañar',
                            'carchi' => 'Carchi',
                            'chimborazo' => 'Chimborazo',
                            'eloro' => 'El Oro',
                            'esmeraldas' => 'Esmeraldas',
                            'galapagos' => 'Galapagos',
                            'guayas' => 'Guayas',
                            'imbabura' => 'Imbabura',
                            'loja' => 'Loja',
                            'losrios' => 'Los Rios',
                            'manabi' => 'Manabi',
                            'moronasantiago' => 'Morona Santiago',
                            'napo' => 'Napo',
                            'orellana' => 'Orellana',
                            'pastaza' => 'Pastaza',
                            'pichincha' => 'Pichincha',
                            'santaelena' => 'Santa Elena',
                            'santodomingo' => 'Santo Domingo',
                            'sucumbios' => 'Sucumbios',
                            'tungurahua' => 'Tungurahua',
                            'zamorachinchipe' => 'Zamora Chinchipe',
                        ));
                        ?>
                        <?php echo $form->error($model, 'provincia'); ?>
                    </div>
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'ciudad'); ?>
                        <?php echo $form->dropDownList($model, 'ciudad', array('' => '---Seleccione una ciudad---')); ?>
                        <?php echo $form->error($model, 'ciudad'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'telefono'); ?>
                        <?php echo $form->textField($model, 'telefono', array('size' => 100, 'maxlength' => 200)); ?>
                        <?php echo $form->error($model, 'telefono'); ?>
                    </div>
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'celular'); ?>
                        <?php echo $form->textField($model, 'celular', array('size' => 100, 'maxlength' => 150)); ?>
                        <?php echo $form->error($model, 'celular'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'marca'); ?>
                        <?php
                        $criteria = new CDbCriteria(array(
                                    'group' => 'modelo',
                                    'order' => 'id asc'
                                ));
                        $ciudades = CHtml::listData(Marcas::model()->findAll($criteria), "marca", "marca");
                        echo $form->dropDownList($model, "marca", $ciudades);
                        ?>
                        <?php //echo $form->dropDownList($model, 'marca', array('' => '---Seleccione una marca---')); ?>
                        <?php echo $form->error($model, 'marca'); ?>
                    </div>
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'modelo'); ?>
                        <?php echo $form->dropDownList($model, 'modelo', array('' => '---Seleccione un modelo---')); ?>
                        <?php echo $form->error($model, 'modelo'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'year'); ?>
                        <?php
                        echo $form->dropDownList($model, 'year', array('' => '---Seleccione el año---',
                            '2014' => '2014', '2013' => '2013', '2012' => '2012', '2011' => '2011', '2010' => '2010', '2009' => '2009', '2008' => '2008'));
                        ?>
                        <?php echo $form->error($model, 'year'); ?>
                    </div>
                    <div class="span3">
                        <?php echo $form->labelEx($model, 'uso'); ?>
                        <?php
                        echo $form->dropDownList($model, 'uso', array('' => '---Seleccione el uso---',
                            'personal' => 'Personal',
                            'trabajo' => 'Trabajo'));
                        ?>
                        <?php echo $form->error($model, 'uso'); ?>
                    </div>
                </div>
                <input type="hidden" name="Cotizador[tipo]" value="<?php echo $tipo; ?>">
                <div class="row">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Calcular' : 'Save', array('class' => 'btnSend', 'id' => 'sendCalcular')); ?>
                </div>

                <?php $this->endWidget(); ?>
            </div>
        <?php endif; ?>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        // TRAER MODELOS DE AUTOS DE ACUERDO A LA MARCA
        $('#Cotizador_marca').change(function() {
            var marca = $(this).attr('value');
            //alert(value);
            $.ajax({
                type: 'post',
                url:'<?php echo Yii::app()->createUrl("cotizador/getmodelos"); ?>',
                dataType: "json",
                data:{marca:marca},
                success: function(data){
                    //alert(data.options)
                    $('#Cotizador_modelo').html(data.options);
                }
            });
        });
        // TRAER AÑOS DISPONIBLES PARA LOS MODELOS DE AUTOS
        //        $('#Cotizador_modelo').change(function() {
        //            var modelo = $(this).attr('value');
        //            //alert(value);
        //            $.ajax({
        //                type: 'post',
        //                url:'<?php echo Yii::app()->createUrl("cotizador/getyears"); ?>',
        //                dataType: "json",
        //                data:{modelo:modelo},
        //                success: function(data){
        //                    //alert(data.options)
        //                    $('#Cotizador_year').html(data.options);
        //                }
        //            });
        //        });
    });
</script>



