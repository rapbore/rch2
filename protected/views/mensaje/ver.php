<?php

$this->breadcrumbs = array(
	$model->label(2) => array('todos'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('crear')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('actualizar', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('borrar', 'id' => $model->id), 'confirm'=>Yii::t('app', 'Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('todos')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'userEmisor',
			'type' => 'raw',
			'value' => $model->userEmisor !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->userEmisor)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->userEmisor, true))) : null,
			),
array(
			'name' => 'userReceptor',
			'type' => 'raw',
			'value' => $model->userReceptor !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->userReceptor)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->userReceptor, true))) : null,
			),
'fecha',
'mensaje',
'estado',
	),
)); ?>


            
        

            
        
