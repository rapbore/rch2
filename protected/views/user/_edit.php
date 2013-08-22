<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model, 'username', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'username'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->radioButtonList($model,'estado',array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO', ),array('labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'estado'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->radioButtonList($model,'tipo',array('EMPLEADO' => 'EMPLEADO', 'CLIENTE' => 'CLIENTE', 'OPERADOR' => 'OPERADOR'),array('labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'tipo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'entel'); ?>
		<?php echo $form->radioButtonList($model,'entel',array('SI' => 'SI', 'NO' => 'NO', ),array('labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'entel'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'movistar'); ?>
		<?php echo $form->radioButtonList($model,'movistar',array('SI' => 'SI', 'NO' => 'NO', ),array('labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'movistar'); ?>
		</div><!-- row -->
                <div class="row">
		<?php echo $form->labelEx($model,'claro'); ?>
		<?php echo $form->radioButtonList($model,'claro',array('SI' => 'SI', 'NO' => 'NO', ),array('labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'claro'); ?>
		</div><!-- row -->

<?php
echo GxHtml::submitButton(Yii::t('app', 'EDITAR'));
$this->endWidget();
?>
</div><!-- form -->