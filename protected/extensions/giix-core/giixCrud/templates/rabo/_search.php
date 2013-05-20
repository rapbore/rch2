<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo '<?php $this->widget(\'ext.EChosen.EChosen\' ); ?>' ?>
<div class="wide form">

<?php echo "<?php \$form = \$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'search-{$this->class2id($this->modelClass)}-form',
	'action' => Yii::app()->createUrl(\$this->route),
	'method' => 'get',
)); ?>\n"; ?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field = $this->generateInputField($this->modelClass, $column);
	if (strpos($field, 'password') !== false)
		continue;
?>
	<div class="row">
		<?php echo "<?php echo \$form->label(\$model, '{$column->name}'); ?>\n"; ?>
		<?php echo "<?php " . $this->generateSearchField($this->modelClass, $column)."; ?>\n"; ?>
	</div>
                <?php if(strtoupper($column->dbType) == 'DATE'){?>
	<div class="row">
                <?php echo "<?php echo \$form->label(\$model, '{$column->name}_inicio'); ?>\n"; ?>
                <?php echo "<?php " . $this->generateActiveFieldCalendar($column->name.'_inicio')."; ?>\n"; ?>
	</div>
	<div class="row">
                <?php echo "<?php echo \$form->label(\$model, '{$column->name}_termino'); ?>\n"; ?>    
                <?php echo "<?php " . $this->generateActiveFieldCalendar($column->name.'_termino')."; ?>\n"; ?>
	</div>
                <?php } ?>

<?php endforeach; ?>
	<div class="row buttons">
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('app', 'Search'), 'icon'=>'search'));?>\n"; ?>
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'button', 'label'=>Yii::t('app', 'Reset'), 'icon'=>'icon-remove-sign', 'htmlOptions'=>array('class'=>'btnreset btn-small')));?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- search-form -->
<script>
     $(".btnreset").click(function(){
             $(":input","#search-<?php echo $this->class2id($this->modelClass); ?>-form").each(function() {
             var type = this.type;
             var tag = this.tagName.toLowerCase(); // normalize case
             if (type == "text" || type == "password" || tag == "textarea") this.value = "";
             else if (type == "checkbox" || type == "radio") this.checked = false;
             else if (tag == "select") this.selectedIndex = "";
       });
     });
</script>

