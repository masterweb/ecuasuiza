<?php
//if (!Yii::app()->user->isAdminUser()) {
//    $this->redirect($this->createUrl('admin/login'));
//}
?>
<?php
/* @var $this SliderController */
/* @var $model Slider */

$this->breadcrumbs = array(
    'Sliders' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Slider', 'url' => array('index')),
    array('label' => 'Create Slider', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#slider-grid').yiiGridView('update', {
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
<a href="<?php echo Yii::app()->createUrl('slider/create'); ?>"><button class="btn btn-primary" type="button">Crear Nuevo Slider</button></a>
<h4>Administrar Sliders</h4>


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
    'id' => 'slider-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'link',
            'type' => 'raw', //because of using html-code <br/>
            //call the controller method gridProduct for each row
            'value' => 'Util::getImageSlider($data)',
        ),
        'descripcion',
        //'activo',
        //'fecha',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
