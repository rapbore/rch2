<?php

$this->breadcrumbs = array(
	$model->label(2) //=> array('index'),
	//Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('crear')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(e){
        e.preventDefault();
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mensaje-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
<?php echo Yii::t('app', 'Text Option Search'); ?></p>

<?php 
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		//array('label'=>Yii::t('app', 'Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                //array('label'=>Yii::t('app', 'List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('admin'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>Yii::t('app', 'Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		//array('label'=>Yii::t('app', 'Export to PDF'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		//array('label'=>Yii::t('app', 'Export to Excel'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
?>

<div class="search-form">
<?php $this->renderPartial('_buscar', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'mensaje-grid',
	'dataProvider' => $model->todos(),
	//'filter' => $model,
        'hideHeader'=>true,
        'type'=>'striped',
        'template'=>"{items}{pager}",      
	'columns' => array(
		//'id',
		array(
				'name'=>'user_emisor',
                    'header'=>'',
				'value'=>'GxHtml::valueEx($data->userEmisor)',
				'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
				),
//		array(
//				'name'=>'user_receptor',
//				'value'=>'GxHtml::valueEx($data->userReceptor)',
//				'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
//				),
		array('name'=>'fecha'),
		
		//array('name'=>'estado'),


				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
                                        //'htmlOptions'=>array('style'=>'width: 50px'),
					'template'=>'{view}',
					'buttons'=>array(
						'view' => array(
							'label'=>'Ver'. ' ' . $model->label(),
							'url'=>'Yii::app()->createUrl("mensaje/responder", array("id"=>$data->user_emisor))',
                                                        'icon'=>'envelope',
						),
						
				
					),
				
				),
	),
)); ?>