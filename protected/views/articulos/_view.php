<?php
/* @var $this ArticulosController */
/* @var $data Articulos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_articulos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_articulos), array('view', 'id'=>$data->id_articulos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_image')); ?>:</b>
	<?php echo CHtml::encode($data->has_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_img')); ?>:</b>
	<?php echo CHtml::encode($data->link_img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_min')); ?>:</b>
	<?php echo CHtml::encode($data->desc_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenido')); ?>:</b>
	<?php echo CHtml::encode($data->contenido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria')); ?>:</b>
	<?php echo CHtml::encode($data->categoria); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	*/ ?>

</div>