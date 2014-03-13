<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pdf')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pdf), array('view', 'id'=>$data->id_pdf)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_real')); ?>:</b>
	<?php echo CHtml::encode($data->name_real); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf')); ?>:</b>
	<?php echo CHtml::encode($data->pdf); ?>
	<br />


</div>