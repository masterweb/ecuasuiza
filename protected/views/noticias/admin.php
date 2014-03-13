<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
if (!Yii::app()->user->isAdminUser()) {
    $this->redirect($this->createUrl('admin/login'));
}

$this->breadcrumbs=array(
	'Noticias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Noticias', 'url'=>array('index')),
	array('label'=>'Create Noticias', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#noticias-grid').yiiGridView('update', {
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
<a href="<?php echo Yii::app()->createUrl('noticias/create'); ?>"><button class="btn btn-primary" type="button">Crear Nueva Noticia</button></a>
<h4>Administrar Noticias</h4>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'noticias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titulo',
		'contenido',
		'fecha',
		'link',
		'categoria',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
