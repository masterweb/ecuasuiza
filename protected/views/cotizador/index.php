<?php
/* @var $this CotizadorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cotizadors',
);

$this->menu=array(
	array('label'=>'Create Cotizador', 'url'=>array('create')),
	array('label'=>'Manage Cotizador', 'url'=>array('admin')),
);
?>

<h1>Cotizadors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
