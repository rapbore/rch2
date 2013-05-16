<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		#array('label'=>Yii::t('app', 'Crear') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('recarga-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Administrar') . ' ' . GxHtml::encode($model->label(2)); ?></h1>


<?php echo GxHtml::link(Yii::t('app', 'Busqueda Avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id' => 'recarga-grid',
	'dataProvider' => $model->search(),
	'type'=>'striped bordered condensed',
	'filter' => $model,
	'template'=>"{extendedSummary}\n{items} {pager}",
	'columns' => array(
		array(
				'name'=>'user_id',
				'value'=>'GxHtml::valueEx($data->user)',
				'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'local_id',
				'value'=>'GxHtml::valueEx($data->local)',
				'filter'=>GxHtml::listDataEx(Local::model()->findAllAttributes(null, true)),
				),
		'celular',
		'compania',
		'monto',
		'comentario',
		'estado',
            ),
                'extendedSummary' => array(
                    'title' => 'TOTAL RECARGAS',
                    'columns' => array(
                        'monto' => array('label'=>'$', 'class'=>'TbSumOperation')
                    )
                ),
                'extendedSummaryOptions' => array(
                    'class' => 'well pull-right',
                    #'style' => 'width:300px'
                ),

	
)); ?>
