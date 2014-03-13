<?php
/* @var $this TrabajaNosotrosController */
/* @var $model TrabajaNosotros */

$this->breadcrumbs=array(
	'Trabaja Nosotroses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrabajaNosotros', 'url'=>array('index')),
	array('label'=>'Create TrabajaNosotros', 'url'=>array('create')),
	array('label'=>'View TrabajaNosotros', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TrabajaNosotros', 'url'=>array('admin')),
);
?>

<h1>Update TrabajaNosotros <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>