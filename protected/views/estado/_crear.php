<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'estado-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
        <?php echo $form->labelEx($model, 'mensaje'); ?>
        <?php echo $form->dropDownList($model, 'mensaje', array('Horario de Lunes a Domingo de 09.00 hrs a 22.00 hrs' => 'FUERA DE HORARIO','ACTIVO' => 'ACTIVO', 'Mantencion' => 'MANTENCION')); ?>
        <?php echo $form->error($model, 'mensaje'); ?>
        </div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->