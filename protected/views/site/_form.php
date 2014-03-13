<?php
/* @var $this SiteController */
/* @var $model Contactenos */
/* @var $form CActiveForm */
?>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contactenos-contactenos-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation' => false,
            ));
    ?>
    
        <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="control-group">
            <?php echo $form->labelEx($model, 'nombres'); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'nombres'); ?>
            </div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'apellidos'); ?>
            <?php echo $form->textField($model, 'apellidos'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'provincia'); ?>
            <?php echo $form->textField($model, 'provincia'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'ciudad'); ?>
            <?php echo $form->textField($model, 'ciudad'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'telefono'); ?>
            <?php echo $form->textField($model, 'telefono'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'celular'); ?>
            <?php echo $form->textField($model, 'celular'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'comentarios'); ?>
            <?php echo $form->textArea($model, 'comentarios', array('rows' => 6, 'cols' => 50)); ?>
        </div>


        <div class="row buttons">
            <div class="span3 offset4">
                <?php echo CHtml::submitButton('Enviar', array('id' => 'sendContactenos')); ?>
            </div>

        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>