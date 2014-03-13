<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<h1>Login Administrator</h1>

<p>Ingrege los datos con sus credenciales de logueo:</p>

<div class="form">
<?php echo CHtml::beginForm('','post',array('class'=>'form-signin')); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Usuario'); ?>
        <?php echo CHtml::activeTextField($model,'username') ?>
    </div>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Password'); ?>
        <?php echo CHtml::activePasswordField($model,'password') ?>
    </div>
 
    <div class="row rememberMe">
        <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
        <?php echo CHtml::activeLabel($model,'rememberMe'); ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Ingresar'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
