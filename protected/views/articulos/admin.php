<?php
if (!Yii::app()->user->isAdminUser()) {
    $this->redirect($this->createUrl('admin/login'));
}
?>
<?php
$this->breadcrumbs = array(
    'Administrador Artículos',
);
/* @var $this ArticulosController */
/* @var $model Articulos */
if (isset($_GET['categoria'])) {
    $id = $_GET['categoria'];
    $criteria = new CDbCriteria(array("condition" => "categoria='$id'", "order" => "orden DESC"));
    $art = Articulos::model()->findAll($criteria);
    //echo 'categoria: '.$id;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


$this->menu = array(
    //array('label' => 'Listar Articulos', 'url' => array('index')),
    array('label' => 'Crear Artículos', 'url' => array('create', 'categoria' => $id)),
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

<!--<a href="<?php echo Yii::app()->createUrl('articulos/create'); ?>"><button class="btn btn-primary" type="button">Crear Nuevo Artículo</button></a>-->
<h4>Administrador Artículos</h4>

<?php echo CHtml::link('Busqueda Avanzada', '#', array('class' => 'search-button')); ?>
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
        'categoria',
        /*
          'fecha',
         */
        'submenu',
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',

        ),
    ),
));
?>
