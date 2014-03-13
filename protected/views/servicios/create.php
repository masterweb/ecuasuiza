<?php
/* @var $this ServiciosController */
/* @var $model Servicios */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Servicios', 'url'=>array('index')),
	array('label'=>'Manage Servicios', 'url'=>array('admin')),
);
?>

<h4>Create Servicios</h4>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>