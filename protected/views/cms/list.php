<?php

if (!Yii::app()->user->isAdminUser()) {
    $this->redirect($this->createUrl('admin/login'));
}
?>
<?php

$this->breadcrumbs = array(
    'Lista de Seguros',
);

?>
<style>
    input[type="text"]{
        padding: 0 !important;
    }
</style>

<a href="<?php echo Yii::app()->createUrl('adminseguros/hogar'); ?>"><button class="btn btn-primary" type="button">Crear Nuevo Seguro</button></a>
<h3>Lista de Seguros</h3>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'lista-seguros',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'title',
            'type' => 'raw', //because of using html-code <br/>
            //call the controller method gridProduct for each row
            'value' => 'Util::getTitulo($data)',
        ),
        array(
            'name' => 'desc_min',
            'type' => 'raw', //because of using html-code <br/>
            //call the controller method gridProduct for each row
            'value' => 'Util::getDesc($data)',
        ),
        'categoria',
        array(
            'name' => 'link_img',
            'type' => 'raw', //because of using html-code <br/>
            //call the controller method gridProduct for each row
            'value' => 'Util::getImage($data)',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{actualizar} {delete} {archivar}',
            'buttons' => array(
                'actualizar' => array(
                    'url' => 'Util::getURLUpdateSeguro($data)',
                    'options' => array(
                        'class' => 'icon-pencil',
                    ),
                ),
                'borrar' => array(
                    'url' => 'Util::getURLDeleteSeguro($data)',
                    'options' => array(
                        'class' => 'icon-trash',
                    ),
                ),
                'archivar' => array(
                    'url' => 'Util::getURLArchivarSeguro($data)',
                    'options' => array(
                        'class' => 'icon-thumbs-down',
                    ),
                )
            ),
        ),
    ),
));
?>
