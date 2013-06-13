<?php $this->widget('ext.EChosen.EChosen' ); ?><div class="wide form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'search-reporte-general-form',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'fecha_atencion'); ?>
		<?php echo $form->textField($model, 'fecha_atencion',array('value'=>date("Y-m-d", time()))); ?>
	</div>
                
    
	<div class="row">
		<?php echo $form->label($model, 'compania'); ?>
		<?php echo $form->textField($model, 'compania', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nombre_cliente'); ?>
		<?php echo $form->textField($model, 'nombre_cliente', array('maxlength' => 45)); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model, 'nombre_empleado'); ?>
		<?php echo $form->textField($model, 'nombre_empleado', array('maxlength' => 45)); ?>
	</div>
                
	
                
                
	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('app', 'Search'), 'icon'=>'search'));?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'button', 'label'=>Yii::t('app', 'Reset'), 'icon'=>'icon-remove-sign', 'htmlOptions'=>array('class'=>'btnreset btn-small')));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<script>
     $(".btnreset").click(function(){
             $(":input","#search-reporte-general-form").each(function() {
             var type = this.type;
             var tag = this.tagName.toLowerCase(); // normalize case
             if (type == "text" || type == "password" || tag == "textarea") this.value = "";
             else if (type == "checkbox" || type == "radio") this.checked = false;
             else if (tag == "select") this.selectedIndex = "";
       });
     });
</script>


