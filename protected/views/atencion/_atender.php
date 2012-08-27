<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'atencion-form',
	'enableAjaxValidation' => true,
));
?>

	<?php echo $form->errorSummary($model); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'Crear Atencion'); ?>
		<?php echo $form->radioButtonList($model,'estado',array('LISTA' => 'LISTA', 'RECHAZADA' => 'RECHAZADA', 'RECHAZADA NO PREPAGO' => 'RECHAZADA NO PREPAGO'),array('labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'estado'); ?>
		</div><!-- row -->

<?php
echo GxHtml::submitButton(Yii::t('app', 'Guardar'));
$this->endWidget();
?>
</div><!-- form -->