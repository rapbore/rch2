<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cupo_id'); ?>
		<?php echo $form->dropDownList($model, 'cupo_id', GxHtml::listDataEx(Cupo::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'recarga_id'); ?>
		<?php echo $form->dropDownList($model, 'recarga_id', GxHtml::listDataEx(Recarga::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fecha'); ?>
		<?php echo $form->textField($model, 'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'comentario'); ?>
		<?php echo $form->textField($model, 'comentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'estado'); ?>
		<?php echo $form->textField($model, 'estado', array('maxlength' => 45)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
