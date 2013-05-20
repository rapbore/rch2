<div class="form">

    
<?php $this->widget('ext.EChosen.EChosen', array('target' => 'select')); ?>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'producto-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model, 'precio'); ?>
		<?php echo $form->error($model,'precio'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model, 'descripcion'); ?>
		<?php echo $form->error($model,'descripcion'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('pedidos')); ?></label>
		<?php echo $form->checkBoxList($model, 'pedidos', GxHtml::encodeEx(GxHtml::listDataEx(Pedido::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'), array('onClick' => "this.disabled=true;this.value='".Yii::t('app', 'Enviando')."';this.form.submit();"));
$this->endWidget();
?>
</div><!-- form -->