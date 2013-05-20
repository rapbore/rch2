<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('producto_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->producto)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cantidad')); ?>:
	<?php echo GxHtml::encode($data->cantidad); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total')); ?>:
	<?php echo GxHtml::encode($data->total); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('estado')); ?>:
	<?php echo GxHtml::encode($data->estado); ?>
	<br />

</div>