<?php

$this->breadcrumbs = array(
	$model->label(2) => array('todos'),
	GxHtml::valueEx($model) => array('ver', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Update'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Back'), 'url'=>Yii::app()->request->urlReferrer),
);
?>

<h1><?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_actualizar', array(
		'model' => $model));
?>