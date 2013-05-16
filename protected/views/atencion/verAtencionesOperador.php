

<?php
$this->breadcrumbs=array(
	'Atenciones',
);

?>
<h1>Atenciones</h1>

<?php 
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'atenciones_listas-grid',
    'enableSorting'=>false,
    'type'=>'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}\n{extendedSummary}",
    'columns'=>array(
		array(
                    'name'=>'OT',
                    'value'=>'$data->id',
                ),
		'monto',
		array(
                    'name'=>'Compania',
                    'value'=>'$data->compania',
                ),
		'fecha_ingreso',
		'tiempo_respuesta',
		'estado',
		
	),
    'extendedSummary' => array(
        'title' => 'TOTAL',
        'columns' => array(
            'monto' => array('label'=>'TOTAL ', 'class'=>'TbSumOperation')
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        #'style' => 'width:300px'
    ),
));
?>