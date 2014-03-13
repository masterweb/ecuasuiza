<?php
if (!Yii::app()->user->isAdminUser()) {
    $this->redirect($this->createUrl('admin/login'));
}
?>
<?php
$this->breadcrumbs = array(
    'Administración Seguros Hogar',
);

//print_r($model);
?>
<div class="form">
<?php echo CHtml::beginForm('adminseguros/create','post',array('class'=>'form-signin')); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'title'); ?>
        <?php echo CHtml::activeTextField($model,'title') ?>
    </div>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'desc_min'); ?>
        <?php echo CHtml::activeTextField($model,'desc_min') ?>
    </div>
 
    <div class="row rememberMe">
        <?php echo CHtml::activeLabel($model,'contenido'); ?>
        <?php echo CHtml::activeTextField($model,'contenido'); ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Ingresar'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->