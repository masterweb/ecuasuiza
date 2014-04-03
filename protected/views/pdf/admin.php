<?php
/* @var $this PdfController */
/* @var $model Pdf */

$this->breadcrumbs=array(
	'Pdfs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pdf', 'url'=>array('index')),
	array('label'=>'Create Pdf', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pdf-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<style>
    input[type="text"]{
        padding: 0 !important;
    }
</style>
<a href="<?php echo Yii::app()->createUrl('pdf/create'); ?>"><button class="btn btn-primary" type="button">Subir pdf</button></a>
<h4>Administrador de Pdfs</h4>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pdf-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'name',
		'descripcion',
		'categoria',
		//'subcategoria',
		'pdf',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
