

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
            'value'=>'$data->recarga_id',
        ),
		array(
            'name'=>'Monto',
            'value'=>'$data->recarga->monto',
        ),
		array(
            'name'=>'Compania',
            'value'=>'$data->recarga->compania',
        ),
		'fecha',
		'tiempoRespuesta',
		'estado',
		
	),	
)); ?>