<?php
$this->breadcrumbs=array(
	'Pdfs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Pdf', 'url'=>array('index')),
	array('label'=>'Create Pdf', 'url'=>array('create')),
	array('label'=>'Update Pdf', 'url'=>array('update', 'id'=>$model->id_pdf)),
	array('label'=>'Delete Pdf', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pdf),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pdf', 'url'=>array('admin')),
);
?>

<h1>View Pdf #<?php echo $model->id_pdf; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pdf',
		'name',
		'descripcion',
		'name_real',
		'pdf',
	),
)); ?>
