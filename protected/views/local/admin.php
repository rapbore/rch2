<?php

$this->breadcrumbs = array(
	$model->label(1) => array('admin'),
	Yii::t('app', 'Administrar'),
);

$this->menu = array(
    array('label'=>Yii::t('app', 'Crear') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('local-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Administrar') . ' ' . GxHtml::encode($model->label(1)); ?></h1>


<?php echo GxHtml::link(Yii::t('app', 'Busqueda avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'local-grid',
	'dataProvider' => $model->search(),
	'type'=>'striped bordered condensed',
	'filter' => $model,
	'template'=>"{items}",
	'columns' => array(
		array(
				'name'=>'user_id',
				'value'=>'GxHtml::valueEx($data->user)',
				'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
				),
                'nombre',
		'ciudad',
		'direccion',
		'telefono',
		
		array(
			'class' => 'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>