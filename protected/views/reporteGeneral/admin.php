<?php

$this->breadcrumbs = array(
	$model->label(1) => array('index'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('busqueda_avanzada', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reporte-general-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo GxHtml::encode($model->label(1)); ?></h1>

<p>
<?php echo Yii::t('app', 'Busqueda Avanzada'); ?></p>

<?php 
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>Yii::t('app', 'List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('admin'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>Yii::t('app', 'Busqueda'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>Yii::t('app', 'Exportar a Excel'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
?>

<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id' => 'reporte-general-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
        'type'=>'striped bordered condensed',
        'template'=>"{extendedSummary}{items}{pager}",   
	'columns' => array(
		'id',
		#'fecha_ingreso',
		'celular',
		'compania',
		'monto',
                'estado',
		'fecha_atencion',
                'tiempo_respuesta',
                'nombre_empleado',
		'nombre_operador',
		'nombre_cliente',
                'nombre',		             
	),
    'extendedSummary' => array(
            'title' => 'TOTAL RECARGAS',
            'columns' => array(
                'compania' => array(
                    'label'=>'Compañia',
                    'types' => array(
                            'Entel'=>array('label'=>'Entel'),
                            'Movistar'=>array('label'=>'Movistar'),
                    ),
                    'class'=>'TbCountOfTypeOperation'
	        ),
                'monto' => array(
                    'label'=>'Total ',
                    'class'=>'TbSumOperation',
                    ),                
            ),
        ),
        'extendedSummaryOptions' => array(
            'class' => 'well pull-right',
        ),
)); ?>