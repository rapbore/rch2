<div class="form">

    
<?php $this->widget('ext.EChosen.EChosen', array('target' => 'select')); ?>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'publicidad-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'mensaje'); ?>
		<?php echo $form->textArea($model, 'mensaje'); ?>
		<?php echo $form->error($model,'mensaje'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->dropDownList($model, 'estado', array('ACTIVO' => 'ACTIVO', 'DESACTIVADO' => 'DESACTIVADO')); ?>
		<?php echo $form->error($model,'estado'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'), array('onClick' => "this.disabled=true;this.value='".Yii::t('app', 'Enviando')."';this.form.submit();"));
$this->endWidget();
?>
</div><!-- form -->