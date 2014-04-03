<?php
$tipo = '';
if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
}
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
        margin: 0;
    }
    .btnSend{
        margin-top: 15px;
    }
</style>
<div class="row">
    <div class="span11">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cotizador/banner_cotizador.jpg"/> 
    </div>
</div>
<?php if ($tipo == 'hogar' || $tipo == 'vida'): ?>
    <h4 class="cotizador-title">Ingresa tus datos para brindarte una atención personalizada:</h4>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'cotizador-form-hogar',
        'action' => Yii::app()->createUrl('site/createcotizador'),
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

    <div class="row">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Save', array('class' => 'btnSend')); ?>
    </div>

    <?php $this->endWidget(); ?>
<?php endif; ?>
<?php if (Yii::app()->user->hasFlash('cotizadorinfo')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('cotizadorinfo'); ?>
    </div>
<?php endif; ?>


