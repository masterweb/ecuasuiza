<?php
/* @var $this CotizadorController */
/* @var $model Cotizador */

$this->breadcrumbs=array(
	'Cotizadors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cotizador', 'url'=>array('index')),
	array('label'=>'Manage Cotizador', 'url'=>array('admin')),
);
?>

<h1>Create Cotizador</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>