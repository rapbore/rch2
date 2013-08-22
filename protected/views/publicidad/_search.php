<?php $this->widget('ext.EChosen.EChosen' ); ?><div class="wide form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'search-publicidad-form',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'mensaje'); ?>
		<?php echo $form->textField($model, 'mensaje'); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'estado'); ?>
		<?php echo $form->textField($model, 'estado', array('maxlength' => 45)); ?>
	</div>
                
	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('app', 'Search'), 'icon'=>'search'));?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'button', 'label'=>Yii::t('app', 'Reset'), 'icon'=>'icon-remove-sign', 'htmlOptions'=>array('class'=>'btnreset btn-small')));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<script>
     $(".btnreset").click(function(){
             $(":input","#search-publicidad-form").each(function() {
             var type = this.type;
             var tag = this.tagName.toLowerCase(); // normalize case
             if (type == "text" || type == "password" || tag == "textarea") this.value = "";
             else if (type == "checkbox" || type == "radio") this.checked = false;
             else if (tag == "select") this.selectedIndex = "";
       });
     });
</script>

