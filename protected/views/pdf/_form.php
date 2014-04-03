<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pdf-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria'); ?>
		<?php echo $form->dropDownList($model,'categoria',
                        array('' => '---Seleccione una opción---',
                            'noticias' => 'Noticias',
                            'programaEducacion' => 'Programa de Educación',
                            'leyTransparencia' => 'Ley de Transparencia',
                            'lavadoActivos' => 'Lavado de Activos',
                            'glosario' => 'Glosario de Términos',
                            'gobiernoCorporativo' => 'Gobierno Corporativo',
                            )); ?>
		<?php echo $form->error($model,'categoria'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'subcategoria'); ?>
		<?php echo $form->dropDownList($model,'subcategoria',
                        array('' => '---Seleccione una opción---' )); ?>
		<?php echo $form->error($model,'categoria'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'keyword'); ?>
		<?php echo $form->textField($model,'keyword',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keyword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
        <?php if($model->pdf == ''): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'pdf'); ?>
	    <?php echo $form->FileField($model, 'pdf'); ?>
		<?php echo $form->error($model,'pdf'); ?>
	</div>
        <?php else: ?>
        <div class="row">
            <p>Documento actual:</p>
            <p><?php echo $model->pdf; ?></p>
            <input type="hidden" name="Pdf[pdf]" id="Pdf_pdf" value="<?php echo $model->pdf; ?>"/>
	</div>
        <?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->