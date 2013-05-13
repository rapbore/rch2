

<?php
$this->breadcrumbs=array(
	'Atenciones',
);

?>
<h1>Atenciones</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'atenciones_listas-grid',
	'type'=>'striped bordered condensed',
	'template'=>"{items}",
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
                    'name'=>'OT',
                    'value'=>'$data->id',
                ),
		array(
            'name'=>'Monto',
            'value'=>'$data->monto',
        ),
		array(
            'name'=>'Compania',
            'value'=>'$data->compania',
        ),
		'fecha_ingreso',
		'tiempo_respuesta',
		'estado',
		
	),	
)); ?>