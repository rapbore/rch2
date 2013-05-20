<?php $this->widget('ext.EChosen.EChosen' ); ?><div class="wide form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'search-reporte-general-form',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'fecha_ingreso'); ?>
		<?php echo $form->textField($model, 'fecha_ingreso'); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'celular'); ?>
		<?php echo $form->textField($model, 'celular', array('maxlength' => 45)); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'compania'); ?>
		<?php echo $form->textField($model, 'compania', array('maxlength' => 45)); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'monto'); ?>
		<?php echo $form->textField($model, 'monto', array('maxlength' => 45)); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'fecha_atencion'); ?>
		<?php echo $form->textField($model, 'fecha_atencion'); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'nombre_operador'); ?>
		<?php echo $form->textField($model, 'nombre_operador', array('maxlength' => 45)); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'nombre_cliente'); ?>
		<?php echo $form->textField($model, 'nombre_cliente', array('maxlength' => 45)); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 45)); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'ciudad_local'); ?>
		<?php echo $form->textField($model, 'ciudad_local', array('maxlength' => 45)); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'estado'); ?>
		<?php echo $form->textField($model, 'estado', array('maxlength' => 45)); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'tiempo_respuesta'); ?>
		<?php echo $form->textField($model, 'tiempo_respuesta'); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'operador_id'); ?>
		<?php echo $form->textField($model, 'operador_id'); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'atencion_id'); ?>
		<?php echo $form->textField($model, 'atencion_id'); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'cliente_id'); ?>
		<?php echo $form->textField($model, 'cliente_id'); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'local_id'); ?>
		<?php echo $form->textField($model, 'local_id'); ?>
	</div>
                
	<div class="row">
		<?php echo $form->label($model, 'comentario'); ?>
		<?php echo $form->textField($model, 'comentario', array('maxlength' => 200)); ?>
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

