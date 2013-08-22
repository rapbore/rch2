<?php

$this->breadcrumbs = array(
	$model->label(2) => array('todos'),
	Yii::t('app', 'Create'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Back'), 'url'=>Yii::app()->request->urlReferrer),
);
?>

<h1><?php echo Yii::t('app', 'Mis Mensajes'); ?></h1>


<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id' => 'recarga-grid',
	'dataProvider' => $dataProvider,
	'type'=>'striped condensed',
	//'filter' => $model,
        'hideHeader'=>true,
	'template'=>"{extendedSummary}\n{items}{pager}",
	'columns' => array(
		'user_emisor',
                'user_receptor',
		'mensaje',
                'fecha',
		
            ),
                
	
)); ?>


<?php

    $this->renderPartial('_crear', array(
		'model' => $model,
		'buttons' => 'create'));

?>