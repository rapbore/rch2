<div class="form">

    
<?php $this->widget('ext.EChosen.EChosen', array('target' => 'select')); ?>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'mensaje-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<div class="row">
		<?php echo $form->labelEx($model,'user_receptor'); ?>
		<?php echo $form->dropDownList($model, 'user_receptor', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user_receptor'); ?>
		</div><!-- row -->
		
		<div class="row">
		<?php echo $form->labelEx($model,'mensaje'); ?>
		<?php echo $form->textArea($model, 'mensaje'); ?>
		<?php echo $form->error($model,'mensaje'); ?>
		</div><!-- row -->
		


<?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'submit',
    'type'=>'primary',
    'label'=>Yii::t('app', 'Save'),
    'loadingText'=>Yii::t('app', 'Enviando'),
    'htmlOptions'=>array('id'=>'buttonSend','onclick'=>"this.disabled=true;this.value='".Yii::t('app', 'Enviando')."';this.form.submit();"),
));
$this->endWidget();
?>
                
</div><!-- form -->