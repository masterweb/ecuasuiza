<?php
/* @var $this WordController */
/* @var $model Word */

$this->breadcrumbs=array(
	'Words'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Word', 'url'=>array('index')),
	array('label'=>'Create Word', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#word-grid').yiiGridView('update', {
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
<a href="<?php echo Yii::app()->createUrl('word/create'); ?>"><button class="btn btn-primary" type="button">Subir archivo de Word</button></a>
<h4>Administrador de archivos de Word</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'word-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_word',
		'name',
		'descripcion',
		'name_real',
		'categoria',
		'subcategoria',
		/*
		'word',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
