<?php
if (!Yii::app()->user->isAdminUser()) {
    $this->redirect($this->createUrl('admin/login'));
}
?>
<?php
$this->breadcrumbs = array(
    'Administración Seguros Hogar',
);
$id = 0;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}
?>
<div class="container">
    <hr>
<!--    <form class="form-horizontal" action="<?php echo Yii::app()->createUrl('adminseguros/create'); ?>" method="post" id="ingresoOferta" name="ingresoOferta">-->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'updateSeguros',
        'action' => Yii::app()->createUrl('adminseguros/update', array('id' => $id)),
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal'),
            ));
    ?>
    <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
    <?php echo $form->errorSummary($model); ?>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Categoría</label>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'categoria', array("" => "Seleccione una categoría", "hogar" => "Seguros Hogar", "empresarial" => "Seguros Empresariales", "vida" => "Seguros de Vida", "auto" => "Seguros Autos"), array()); ?>
        </div>
    </div>
    <?php
    if ($model->link_img != ''):
        ?>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Imágen actual</label>
            <div class="controls">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/seguros/<?php echo $model->link_img ?>" class="img-polaroid"/>
                <br><br>
                <button class="btn btn-primary" type="button" id="change-image">Cambiar imágen</button>
            </div>
        </div>

    <?php else: ?>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Subir foto</label>
            <div class="controls">
                <select name="Seguros[link_img]" id="imageSelect" class="validate[required]">
                    <option value="">--Seleccione una opción--</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>

            </div>
        </div>
    <?php endif; ?>

    <div class="control-group" id="upload-file">
        <label class="control-label" for="inputPassword">Seleccione imágen</label>
        <div class="controls">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="width: 378px; height: 215px;" id="results">
                </div>
                <div>
                    <span class="btn btn-file" id="btnEscoger"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
<!--                            <input type="file" name="Seguros[file1]" class="validate[required] text-input"/>-->
                        <?php echo $form->FileField($model, 'link_img'); ?>
                    </span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
                <input type="hidden" id="' . $id . '" name="id" value="' . $id . '"/>
                <input type="hidden" id="tipo" name="tipo" value="' . $tipo . '"/>
            </div>
        </div>
    </div>
    <div class="control-group">
        <!--            <label class="control-label" for="inputPassword">Título</label>-->
        <?php echo $form->labelEx($model, 'title', array('class' => 'control-label')); ?>
        <div class="controls">
<!--                <input type="text" id="tituloOferta" name="Seguros[tituloOferta]" class="input-xlarge validate[required] text-input">-->
            <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100, 'class' => 'input-xlarge validate[required] text-input')); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
    </div>
    <div class="control-group">
        <!--            <label class="control-label" for="inputPassword">Descripción breve</label>-->
        <?php echo $form->labelEx($model, 'desc_min', array('class' => 'control-label')); ?>
        <div class="controls">
<!--                <textarea rows="3" placeholder="" name="Seguros[descMini]" id="descMini" class="validate[required] text-input"></textarea>-->
            <?php echo $form->textArea($model, 'desc_min', array('rows' => 3, 'class' => 'validate[required] text-input', 'id' => 'descMini')); ?>
        </div>
    </div>
    <div class="control-group">
        <!--            <label class="control-label" for="inputPassword">Contenido</label>-->
        <?php echo $form->labelEx($model, 'contenido', array('class' => 'control-label')); ?>
        <div class="controls">
<!--                <textarea class="textarea" placeholder="Enter text ..." style="width: 810px; height: 200px" class="validate[required] text-input" name="Seguros[contenido]" id="contenido"></textarea>-->
            <?php echo $form->textArea($model, 'contenido', array('rows' => 3, 'class' => 'textarea validate[required] text-input', 'style' => 'width: 810px; height: 200px', 'id' => 'contenido')); ?>
            <p><em>Para ingresar el título escoger <strong>Heading 3</strong></em></p>
        </div>
    </div>
    
    <?php if ($model->link_attachment != ''): ?>
        <div class="row">
            <label class="control-label" for="inputPassword">Documento(s) Actual(es)</label>
            <div class="span2 name-document">
                <p style="margin-left: 18px;"><?php echo $model->link_attachment; ?></p>
            </div>
            <div class="span2">
                <button class="btn btn-primary" type="button" id="change-attachment">Cambiar Documento</button>
            </div>
            <div class="span2">

                <button class="btn btn-primary btn-warning" type="button" id="delete-attachment">Eliminar Documento</button>
            </div>
        </div>
        <!--    <div class="control-group" style="display: none;" id="upload-attachment">
                <label class="control-label" for="inputPassword">Tipo de documento anexo</label>
                <div class="controls">
                    <select name="Seguros[tipo_attachment]" id="tipodoc" class="validate[required]">
                        <option value="">--Seleccione una opción--</option>
                        <option value="pdf">Pdf</option>
                        <option value="word">Word</option>
                        <option value="excel">Excel</option>
                        <option value="powerpoint">Powerpoint</option>
                    </select>
                </div>
            </div>-->

        <div class="control-group" style="display: none;" id="upload-attachment-link">
            <label class="control-label" for="inputPassword">Documento</label>
            <div class="controls">
                <?php echo $form->FileField($model, 'link_attachment'); ?>
            </div>
        </div>
    <?php else: ?>
        <!--        <div class="control-group" id="upload-attachment">
                    <label class="control-label" for="inputPassword">Tipo de documento anexo</label>
                    <div class="controls">
                        <select name="Seguros[tipo_attachment]" id="tipodoc" class="validate[required]">
                            <option value="">--Seleccione una opción--</option>
                            <option value="pdf">Pdf</option>
                            <option value="word">Word</option>
                            <option value="excel">Excel</option>
                            <option value="powerpoint">Powerpoint</option>
                        </select>
                    </div>
                </div>-->
        <div class="control-group">
            <div class="controls">
                <a href="#" id="AddMoreFileBox" class="btn btn-info">Añadir Adjuntos</a>
                <div id="InputsWrapper"></div>
            </div>
        </div>

<!--        <div class="control-group" id="upload-attachment-link">
            <label class="control-label" for="inputPassword">Documento</label>
            <div class="controls">
                <?php echo $form->FileField($model, 'link_attachment'); ?>
            </div>
        </div>-->
    <?php endif; ?>
    <div class="control-group">
        <div class="controls">
            <input type="hidden" name="Seguros[link_attachment_ready]" id="link_attachment_ready" value="<?php echo $model->link_attachment; ?>"/>
            <input type="hidden" name="Seguros[link_img_ready]" id="link_img_ready" value="<?php echo $model->link_img; ?>"/>
            <input type="hidden" name="Seguros[tipo_attachment_ready]" id="tipo_attachment_ready" value="<?php echo $model->tipo_attachment; ?>"/>
            <input type="hidden" name="Seguros[num_attachment]" id="num_attachment" value=""/>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
<!--                <input type="submit" class="btn" value="Enviar" id="sendOferta" name="sendOferta">-->
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
        </div>
    </div>
    <!--    </form>-->
    <?php $this->endWidget(); ?>
</div>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>    
    <div class="modal-body">               
    </div>   
</div>
<?php
if (!empty($error)) {
    ?>
    <div class="alert alert-error"><?php echo $error ?></div>
    <?php
}

if (!empty($success)) {
    ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" type="button">×</button>
        <? echo $success; ?></div>
        <?php
    }
    ?>
</div>