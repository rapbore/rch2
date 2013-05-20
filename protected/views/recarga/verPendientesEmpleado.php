<?php 

Yii::app()->clientScript->registerScript('refrescar_siempre','
var refreshId = setInterval(function(){$.fn.yiiGridView.update("recargas_pendientes-grid");}, 3000);  

        ',CClientScript::POS_READY);
?>
<?php
$this->breadcrumbs=array(
	'Recargas',
);

?>
<h1>Recargas</h1>

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id' => 'recargas_pendientes-grid',
	'type'=>'striped bordered condensed',
	'enableSorting'=>false,
	'template' => "{items}",
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
                'name'=>'OT',
                'value'=>'$data->id',
            ),
            'fecha',
            'celular',
                    'compania',
                array(
                'name'=>'Local',
                'value'=>'$data->local',
            ),
                    'monto',
                    'estado',
                    
                array(
                'name'=>'Comentario Recarga',
                'value'=>'$data->comentario',
            ),

	),
)); 

?>