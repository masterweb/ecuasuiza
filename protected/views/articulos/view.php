<?php
/* @var $this ArticulosController */
/* @var $model Articulos */

$this->breadcrumbs=array(
	'Articuloses'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Articulos', 'url'=>array('index')),
	array('label'=>'Create Articulos', 'url'=>array('create')),
	array('label'=>'Update Articulos', 'url'=>array('update', 'id'=>$model->id_articulos)),
	array('label'=>'Delete Articulos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_articulos),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Articulos', 'url'=>array('admin')),
);
?>

<h1>View Articulos #<?php echo $model->id_articulos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_articulos',
		'has_image',
		'link_img',
		'title',
		'desc_min',
		'contenido',
		'categoria',
		'fecha',
		'activo',
	),
)); ?>
