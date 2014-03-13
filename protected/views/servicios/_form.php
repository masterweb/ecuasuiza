<?php
/* @var $this ServiciosController */
/* @var $model Servicios */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'servicios-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')
            ));
    ?>

    <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'categoria', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'categoria', array('' => '---Seleccione una opción---', 'reclamos' => 'Reclamos')); ?>
        </div>
    </div>
    <?php if ($model->banner != ''): ?>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Imágen actual</label>
            <div class="controls">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/servicios/<?php echo $model->banner ?>" class="img-polaroid"/>
                <br><br>
                <button class="btn btn-primary" type="button" id="change-image">Cambiar imágen</button>
            </div>
        </div>
    <?php else: ?>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Subir foto</label>
            <div class="controls">
                <select name="Servicios[img_banner]" id="imageSelectServicios" class="validate[required]">
                    <option value="">--Seleccione una opción--</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>

            </div>
        </div>
    <?php endif; ?>
    <!--    <div class="control-group">
            <label class="control-label" for="inputPassword">Subir foto</label>
            <div class="controls">
                <select name="Servicios[img_banner]" id="imageSelectServicios" class="validate[required]">
                    <option value="">--Seleccione una opción--</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
    
            </div>
        </div>-->
    <div class="control-group" id="upload-file">
        <label class="control-label" for="inputPassword">Seleccione imágen</label>
        <div class="controls">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="width: 378px; height: 215px;" id="results">
                </div>
                <div>
                    <span class="btn btn-file" id="btnEscoger"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
<!--                            <input type="file" name="Seguros[file1]" class="validate[required] text-input"/>-->
                        <?php echo $form->FileField($model, 'banner'); ?>
                    </span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
                <input type="hidden" id="' . $id . '" name="id" value="' . $id . '"/>
                <input type="hidden" id="tipo" name="tipo" value="' . $tipo . '"/>
                <?php echo $form->error($model, 'banner'); ?>
            </div>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'title', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 150)); ?>
        </div>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'desc_min', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textArea($model, 'desc_min', array('rows' => 3, 'class' => 'validate[required] text-input', 'id' => 'descMini')); ?>
        </div>
        <?php echo $form->error($model, 'desc_min'); ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'contenido', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textArea($model, 'contenido', array('rows' => 3, 'class' => 'textarea validate[required] text-input', 'style' => 'width: 810px; height: 200px', 'id' => 'contenido')); ?>
        </div>
        <?php echo $form->error($model, 'contenido'); ?>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Documento(s) Actual(es)</label>
        <div class="controls">
            <?php  
            if($model->num_adjuntos == 1){
                echo '<li>'.$model->adjunto.'</li>';
            }
            if($model->num_adjuntos == 2){
               echo '<li>'.$model->adjunto.'</li>';
               echo '<li>'.$model->adjunto2.'</li>';
            }
            if($model->num_adjuntos == 3){
               echo '<li>'.$model->adjunto.'</li>';
               echo '<li>'.$model->adjunto2.'</li>';
               echo '<li>'.$model->adjunto3.'</li>';
            }
            ?>
            <br><br>
            <button class="btn btn-primary" type="button" id="change-attachment">Cambiar adjunto</button>
<!--            <input type="hidden" name="Seguros[link_attachment_ready]" id="link_attachment_ready" value="<?php //echo $model->link_attachment; ?>"/>
            <input type="hidden" name="Seguros[link_img_ready]" id="link_img_ready" value="<?php //echo $model->link_img; ?>"/>-->
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="">Adjuntar archivo</label>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="adjuntoRadio" id="optionsRadios1" value="si">
                Si
            </label>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <label class="radio">
                <input type="radio" name="adjuntoRadio" id="optionsRadios2" value="no" checked>
                No
            </label>
        </div>
    </div>
    
    <div class="control-group" id="select-num-adjuntos">
        <label class="control-label" for="numAdjuntos">Número de adjuntos</label>
        <div class="controls">
            <select name="Servicios[num_adjuntos]" id="num-adjuntos" class="validate[required]">
                <option value="">--Número de adjuntos--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>

        </div>
    </div>

    <div id="file-uploads">
        <!--        <div class="control-group">
        <?php echo $form->labelEx($model, 'adjunto', array('class' => 'control-label')); ?>
                    <div class="controls">
        <?php echo $form->FileField($model, 'adjunto'); ?>
                    </div>
        <?php echo $form->error($model, 'adjunto'); ?>
                </div>-->
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->