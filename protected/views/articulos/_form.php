<?php
/* @var $this ArticulosController */
/* @var $model Articulos */
/* @var $form CActiveForm */
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

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'categoria'); ?>
        <?php
        echo $form->dropDownList($model, 'categoria', array('' => '---Seleccione una opción---',
            'noticias1' => 'Noticias 1',
            'noticias2' => 'Noticias 2',
            'noticias3' => 'Noticias 3',
            'quienesSomos' => 'Quienes Somos',
            'general' => 'General',
        ));
        ?>
        <?php echo $form->error($model, 'categoria'); ?>
    </div>
    <!--    <div class="row">
    <?php echo $form->labelEx($model, 'has_image'); ?>
    <?php echo $form->dropDownList($model, 'has_image', array('' => '---Seleccione una opción---', 'Si' => 'Si', 'No' => 'No'), array('id' => 'imageSelect')); ?>
    <?php echo $form->error($model, 'has_image'); ?>
        </div>
        <div class="control-group" id="upload-file">
            <label class="control-label" for="inputPassword">Seleccione imágen</label>
            <div class="controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-preview thumbnail" style="width: 378px; height: 215px;" id="results">
                    </div>
                    <div>
                        <span class="btn btn-file" id="btnEscoger">
                            <span class="fileupload-new">Seleccionar imágen</span>
                            <span class="fileupload-exists">Cambiar</span>
                                <input type="file" name="Seguros[file1]" class="validate[required] text-input"/>
    <?php echo $form->FileField($model, 'link_img'); ?>
                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                    </div>
                    <input type="hidden" id="' . $id . '" name="id" value="' . $id . '"/>
                    <input type="hidden" id="tipo" name="tipo" value="' . $tipo . '"/>
                </div>
            </div>
        </div>-->
    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 150)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'desc_min'); ?>
        <?php echo $form->textArea($model, 'desc_min', array('rows' => 3, 'cols' => 20)); ?>
        <?php echo $form->error($model, 'desc_min'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'contenido'); ?>
        <?php //echo $form->textArea($model, 'contenido', array('rows' => 6, 'cols' => 50, 'class' => 'textarea2', 'style' => 'height:400px;')); ?>
        <?php
        $this->widget('application.extensions.extckeditor.ExtCKEditor', array(
            'model' => $model,
            'attribute' => 'contenido', // model atribute
            'language' => 'es', /* default lang, If not declared the language of the project will be used in case of using multiple languages */
            'editorTemplate' => 'full', // Toolbar settings (full, basic, advanced)
            'height' => '250px'
        ));
        ?>
        <?php
//        $this->widget('application.extensions.fckeditor.FCKEditorWidget', array(
//            "model" => $model, # Data-Model
//            "attribute" => 'contenido', # Attribute in the Data-Model
//            "height" => '400px',
//            "width" => '100%',
//            "toolbarSet" => 'Basic', # EXISTING(!) Toolbar (see: fckeditor.js)
//            "fckeditor" => Yii::app()->baseUrl . "/fckeditor/ckeditor.js",
//            # Path to fckeditor.php
//            "fckBasePath" => Yii::app()->baseUrl . "/fckeditor/",
//            # Realtive Path to the Editor (from Web-Root)
//            "config" => array("EditorAreaCSS" => Yii::app()->baseUrl . '/css/index.css',),
//                # Additional Parameter (Can't configure a Toolbar dynamicly)
//        ));
        ?>
        <?php echo $form->error($model, 'contenido'); ?>
    </div>
    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->