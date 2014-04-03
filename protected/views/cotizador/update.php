<?php
/* @var $this CotizadorController */
/* @var $model Cotizador */

$this->breadcrumbs=array(
	'Cotizadors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cotizador', 'url'=>array('index')),
	array('label'=>'Create Cotizador', 'url'=>array('create')),
	array('label'=>'View Cotizador', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cotizador', 'url'=>array('admin')),
);
?>

<h1>Update Cotizador <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>