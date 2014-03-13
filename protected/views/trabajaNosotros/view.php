<?php
/* @var $this TrabajaNosotrosController */
/* @var $model TrabajaNosotros */

$this->breadcrumbs=array(
	'Trabaja Nosotroses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TrabajaNosotros', 'url'=>array('index')),
	array('label'=>'Create TrabajaNosotros', 'url'=>array('create')),
	array('label'=>'Update TrabajaNosotros', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TrabajaNosotros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrabajaNosotros', 'url'=>array('admin')),
);
?>

<h1>View TrabajaNosotros #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombres',
		'apellidos',
		'telefono',
		'celular',
		'ciudad',
		'email',
		'disponibilidad',
		'area_interes',
		'link',
		'fecha',
	),
)); ?>
