<?php
/* @var $this CotizadorController */
/* @var $model Cotizador */

$this->breadcrumbs=array(
	'Cotizadors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cotizador', 'url'=>array('index')),
	array('label'=>'Create Cotizador', 'url'=>array('create')),
	array('label'=>'Update Cotizador', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cotizador', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cotizador', 'url'=>array('admin')),
);
?>

<h1>View Cotizador #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombres',
		'apellidos',
		'email',
		'cedula',
		'celular',
		'telefono',
		'provincia',
		'ciudad',
		'tipo',
		'marca',
		'modelo',
		'year',
		'uso',
		'fecha',
	),
)); ?>
