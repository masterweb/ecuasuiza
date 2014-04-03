<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'articulos-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
            ));
    ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <input type="file" name="Articulos[thumb]" class="validate[required] text-input"/>
        <div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
    </div>