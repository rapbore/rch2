<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n
\$this->breadcrumbs = array(
	\$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);\n";
?>

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo '<?php'; ?> echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
<?php echo "<?php echo Yii::t('app', 'Text Option Search'); ?>" ?>
</p>

<?php echo "<?php"; ?> 
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		//array('label'=>Yii::t('app', 'Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                //array('label'=>Yii::t('app', 'List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('admin'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>Yii::t('app', 'Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		//array('label'=>Yii::t('app', 'Export to PDF'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		array('label'=>Yii::t('app', 'Export to Excel'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
?>

<div class="search-form">
<?php echo "<?php \$this->renderPartial('_search', array(
	'model' => \$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo '<?php'; ?> $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
        'type'=>'striped bordered condensed',
        'template'=>"{summary}{items}{pager}",
        //'htmlOptions' => array(
        //                        'style' => 'overflow-y:auto;'
        //                                   .'table-layout:fixed;'
        //                                   .'white-space:nowrap;'
        //                                   ),       
	'columns' => array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
	if (++$count == 7)
		echo "\t\t/*\n";
	echo "\t\t" . $this->generateGridViewColumn($this->modelClass, $column).",\n";
}
if ($count >= 7)
	echo "\t\t*/\n";
?>
                array(
                      'class'=>'bootstrap.widgets.TbButtonColumn',
                      'htmlOptions'=>array('style'=>'min-width: 50px'),
                  ),                
	),
)); ?>