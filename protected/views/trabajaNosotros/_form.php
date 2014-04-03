<?php
/* @var $this TrabajaNosotrosController */
/* @var $model TrabajaNosotros */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trabaja-nosotros-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombres'); ?>
		<?php echo $form->textField($model,'nombres',array('size'=>60,'maxlength'=>100,'class'=>'validate[required] text-input')); ?>
		<?php echo $form->error($model,'nombres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellidos'); ?>
		<?php echo $form->textField($model,'apellidos',array('size'=>60,'maxlength'=>100,'class'=>'validate[required] text-input')); ?>
		<?php echo $form->error($model,'apellidos'); ?>
	</div>

	<div class="row telex">
            <div class="span3">
                <?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>100,'class'=>'validate[required] text-input')); ?>
		<?php echo $form->error($model,'telefono'); ?>
            </div>
            <div class="span3">
                <?php echo $form->labelEx($model,'celular'); ?>
		<?php echo $form->textField($model,'celular',array('size'=>60,'maxlength'=>100,'class'=>'validate[required] text-input')); ?>
		<?php echo $form->error($model,'celular'); ?>
            </div>
	</div>

	<div class="row telex">
            <div class="span3">
                <?php echo $form->labelEx($model,'ciudad'); ?>
		<?php echo $form->textField($model,'ciudad',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ciudad'); ?>
            </div>
            <div class="span3">
                <?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
            </div>
		
	</div>
	<div class="row">
            <div class="span3">
                <?php echo $form->labelEx($model,'disponibilidad'); ?>
		<?php echo $form->dropDownList($model,'disponibilidad',array(''=>'---Seleccione una opción---','tiempoCompleto'=>'Tiempo Completo', 'medioTiempo'=>'Medio Tiempo')); ?>
		<?php echo $form->error($model,'disponibilidad'); ?>
            </div>
            <div class="span3">
                <?php echo $form->labelEx($model,'area_interes'); ?>
		<?php echo $form->dropDownList($model,'area_interes',
                        array(''=>'---Seleccione una opción---',
                            'comercial'=>'Comercial',
                            'financiero'=>'Financiero (Contabilidad, Cobranzas)',
                            'administrativo'=>'Administrativo',
                            'recursosHumanos'=>'Recursos Humanos',
                            'tecnologiaInformacion'=>'Tecnología de Información',
                            'operaciones'=>'Operaciones (Siniestro, Reaseguros, Emisiones)',
                            'marketingRP'=>'Marketing y RRPP',
                            )); ?>
		<?php echo $form->error($model,'area_interes'); ?>
            </div>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->fileField($model,'link',array('id'=>'fileUpload')); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Save', array('id' => 'sendContactenos', 'class' => 'sendNosotros')); ?>
	</div>
        <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

<?php $this->endWidget(); ?>

</div><!-- form -->