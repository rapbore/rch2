<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_emisor')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->userEmisor)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_receptor')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->userReceptor)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha')); ?>:
	<?php echo GxHtml::encode($data->fecha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mensaje')); ?>:
	<?php echo GxHtml::encode($data->mensaje); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('estado')); ?>:
	<?php echo GxHtml::encode($data->estado); ?>
	<br />

</div>