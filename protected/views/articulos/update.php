<?php
/* @var $this ArticulosController */
/* @var $model Articulos */

$this->breadcrumbs=array(
	'Articuloses'=>array('index'),
	$model->title=>array('view','id'=>$model->id_articulos),
	'Update',
);

$this->menu=array(
	array('label'=>'List Articulos', 'url'=>array('index')),
	array('label'=>'Create Articulos', 'url'=>array('create')),
	array('label'=>'View Articulos', 'url'=>array('view', 'id'=>$model->id_articulos)),
	array('label'=>'Manage Articulos', 'url'=>array('admin')),
);
?>

<h1>Update Articulos <?php echo $model->id_articulos; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>