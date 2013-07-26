<div class="form">

    
<?php $this->widget('ext.EChosen.EChosen', array('target' => 'select')); ?>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'mensaje-form',
	'enableAjaxValidation' => true,
));
?>

	
	<?php echo $form->errorSummary($model); ?>

		
				
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