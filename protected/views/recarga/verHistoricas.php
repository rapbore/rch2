<?php

$this->breadcrumbs = array(
	'Ver Local' => array('local/verLocalCliente', 'id'=>$id_local),
	Yii::t('app', 'Manage'),
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

<h1><?php echo Yii::t('app', 'Historial de Recargas'); ?></h1>


<?php /*echo GxHtml::link(Yii::t('app', 'Busqueda Avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); */?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id' => 'recarga-grid',
	'dataProvider' => new CArrayDataProvider($model, array('pagination'=>array('pageSize'=>50))),
	'type'=>'striped bordered condensed',
	//'filter' => $model,
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
