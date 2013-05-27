<?php

$this->breadcrumbs = array(
	$model->label(2) => array('verLocalesCliente'),
	GxHtml::valueEx($model),
);


$this->menu = array(
		array('label'=>Yii::t('app', 'Ver Historicos Local'), 'url'=>array('recarga/verHistorico', 'id'=>$model->id)),
	);
?>
<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'user',
			'type' => 'raw',
			'value' => $model->user !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->user)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->user, true))) : null,
			),
'ciudad',
'direccion',
'telefono',
'nombre',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('recargas')); ?></h2>

<?php 
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'recarga_cliente-grid',
    'enableSorting'=>false,
    'type'=>'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}\n{extendedSummary}",
    'columns' => array(
		'id',
		'celular',
		'compania',
		'monto',
		'fecha',    
	),
    'extendedSummary' => array(
        'title' => 'TOTAL RECARGAS',
        'columns' => array(
            'monto' => array('label'=>'TOTAL ', 'class'=>'TbSumOperation')
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        #'style' => 'width:300px'
    ),
));
?>