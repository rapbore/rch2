<?php
/**
 * This is the template for generating the model class of a specified table.
 * In addition to the default model Code, this adds the CSaveRelationsBehavior
 * to the model class definition.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 * - $representingColumn: the name of the representing column for the table (string) or
 *   the names of the representing columns (array)
 */
?>
<?php echo "<?php\n"; ?>

<?php
    $array_fechas = array();
    
    foreach($columns as $name=>$column):
        
    if(strtoupper($column->dbType) == 'DATE'){
        array_push($array_fechas, $name .'_inicio');
        
        array_push($array_fechas, $name .'_termino');    
    }            
    endforeach;
    
    $array_fechas = array_flip($array_fechas);
?>

Yii::import('<?php echo "{$this->baseModelPath}.{$this->baseModelClass}"; ?>');

class <?php echo $modelClass; ?> extends <?php echo $this->baseModelClass."\n"; ?>
{
    <?php foreach($array_fechas as $name=>$column): ?>
    <?php echo "public \${$name};\n"; ?>
    <?php endforeach; ?>    
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
<?php if(!empty($array_fechas)): ?>
	public function rules() {
		return array_merge(parent::rules(), array(
                        array('<?php echo implode(', ', array_keys($array_fechas)); ?>', 'safe', 'on'=>'search'),
		));
	}
	public function attributeLabels() {
		return array_merge(parent::attributeLabels(), array(
    <?php foreach($array_fechas as $name=>$column): ?>
			<?php echo "'{$name}' => Yii::t('app', '{$name}'),\n"; ?>
    <?php endforeach; ?>		));
	}
        
	public function search() {
		$criteria = parent::search()->getCriteria();

<?php foreach($columns as $name=>$column): ?>
<?php if(strtoupper($column->dbType) == 'DATE'):?>
                <?php echo 'if((isset($this->'.$name.'_inicio) && trim($this->'.$name.'_inicio) != "") && (isset($this->'.$name.'_termino) && trim($this->'.$name.'_termino) != ""))';?>
                
                	<?php echo '$criteria->addBetweenCondition(\''.$name.'\', $this->'.$name.'_inicio, $this->'.$name.'_termino);' ?>
<?php endif; ?>
<?php endforeach; ?>

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                        ));
	}
<?php endif; ?>
}