

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
    'filter' => $dataProvider,
    'type'=>'striped bordered condensed',
    'dataProvider' => $dataProvider->ListasOperador(),
    'template' => "{extendedSummary}{items}{pager}",
    'columns'=>array(
                'id',
                array(
                    'name'=>'fecha_atencion',
                    'header'=>'Fecha',
                    'value'=>'$data->fecha_atencion',
                ),
                'celular',
		'monto',
                'tiempo_respuesta',
		array(
                    'name'=>'compania',
                    'value'=>'$data->compania',
                ),
		
		'comentario',
		//'estado',
		
	),
    'extendedSummary' => array(
        'title' => 'TOTAL',
        'columns' => array(
            'compania' => array(
                    'label'=>'Compañia',
                    'types' => array(
                            'Entel'=>array('label'=>'Entel'),
                            'Movistar'=>array('label'=>'Movistar'),
                    ),
                    'class'=>'TbCountOfTypeOperation'
	        ),
            'monto' => array('label'=>'TOTAL ', 'class'=>'TbSumOperation')
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        //'style' => 'width:150px'
    ),
));
?>