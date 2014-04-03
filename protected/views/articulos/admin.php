<?php
/* @var $this ArticulosController */
/* @var $model Articulos */

$this->breadcrumbs = array(
    'Articuloses' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Articulos', 'url' => array('index')),
    array('label' => 'Create Articulos', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#articulos-grid').yiiGridView('update', {
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

<a href="<?php echo Yii::app()->createUrl('articulos/create'); ?>"><button class="btn btn-primary" type="button">Crear Nuevo Artículo</button></a>
<h4>Manage Articulos</h4>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'articulos-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_articulos',
        //'has_image',
        //'link_img',
        'title',
        'desc_min',
        //'contenido',
        /*
          'categoria',
          'fecha',
         */
        'activo',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {update} {delete} {adjuntar}',
            'buttons' => array(
                'adjuntar' => array(
                    'url' => 'Util::getURLAdjuntarArticulo($data)',
                    'options' => array(
                        'class' => 'icon-plus-sign',
                    ),
                ),
            )
        ),
    ),
));
?>
