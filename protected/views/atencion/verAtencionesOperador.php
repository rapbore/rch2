

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
                'id',
                array(
                    'name'=>'Fecha',
                    'value'=>'$data->fecha_ingreso',
                ),
                'celular',
		'monto',
        'tiempo_respuesta',
		array(
                    'name'=>'Compania',
                    'value'=>'$data->compania',
                ),
		
		'comentario',
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
        'style' => 'width:150px'
    ),
));
?>