<?php

$this->breadcrumbs = array(
	$model->label(2) => array('´verTodos'),
	Yii::t('app', 'Create'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Back'), 'url'=>Yii::app()->request->urlReferrer),
);
?>

<h1><?php echo Yii::t('app', 'Create') . ' ' . GxHtml::encode($model->label()); ?></h1>

<?php
$this->renderPartial('_crear', array(
		'model' => $model,
		'buttons' => 'create'));
?>