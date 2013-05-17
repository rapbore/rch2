<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'atencion-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'cupo_id'); ?>
		<?php echo $form->dropDownList($model, 'cupo_id', GxHtml::listDataEx(Cupo::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cupo_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'recarga_id'); ?>
		<?php echo $form->dropDownList($model, 'recarga_id', GxHtml::listDataEx(Recarga::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'recarga_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model, 'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textField($model, 'comentario'); ?>
		<?php echo $form->error($model,'comentario'); ?>
		</div><!-- row -->
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'type' => 'primary',
    'toggle' => 'radio', // 'checkbox' or 'radio'
    'buttons' => array(
		array('label'=>'LISTA'),
        array('label'=>'RECHAZO'),
        array('label'=>'RECHAZO NO PREPAGO'),
        
    ),
)); ?>

		<label><?php echo GxHtml::encode($model->getRelationLabel('noprepagos')); ?></label>
		<?php echo $form->checkBoxList($model, 'noprepagos', GxHtml::encodeEx(GxHtml::listDataEx(Noprepago::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->