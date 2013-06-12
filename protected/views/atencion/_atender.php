	<?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model->recarga,
		'attributes'=>array(
                        array('name'=>'id', 'label'=>'OT'),
			array('name'=>'celular', 'label'=>'celular','template'=>"<tr class=\"{class}\"><td></td><td><h1>{value}</h1></td></tr>\n",),
			array('name'=>'compania', 'label'=>'compania'),
			array('name'=>'monto', 'label'=>'monto'),
                        array('name'=>'comentario', 'label'=>'comentario'),   
		),
	)); 
        ?>
<div class="form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'atencion-form',
	'enableAjaxValidation' => true,
));
?>
<?php echo GxHtml::submitButton(Yii::t('app', 'Guardar'));?>
<?php echo $form->errorSummary($model); ?>
    <div class="row">
    <?php echo $form->labelEx($model,'Atender'); ?>
    <?php echo $form->radioButtonList($model,'estado',array('LISTA' => 'LISTA', 'RECHAZADA' => 'RECHAZADA', 'RECHAZADA NO PREPAGO' => 'RECHAZADA NO PREPAGO'),array('labelOptions'=>array('style'=>'display:inline'))); ?>
    <?php echo $form->error($model,'estado'); ?>
    </div><!-- row -->
    
     <div class="row">
    <?php echo $form->labelEx($model,'comentario'); ?>
    <?php echo $form->textArea($model,'comentario'); ?>
    <?php echo $form->error($model,'comentario'); ?>
    </div><!-- row -->
    

<?php
$this->endWidget();
?>
</div><!-- form -->