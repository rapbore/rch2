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
<pre>
  <?php
  $publicidad = Publicidad::model()->random()->find();
  echo $publicidad->mensaje;
  ?>
</pre>
<h1>Recargas</h1>

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id' => 'recargas_pendientes-grid',
	'type'=>'striped bordered condensed',
	'enableSorting'=>false,
	'template' => "{items}\n{extendedSummary}",
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
                'name'=>'OTE',
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

	),
        'extendedSummary' => array(
            'title' => 'TOTAL RECARGAS',
            'columns' => array(
                'monto' => array('label'=>'TOTAL ', 'class'=>'TbSumOperation')
            )
        ),
        'extendedSummaryOptions' => array(
            'class' => 'well pull-right',
        ),
)); 

?>