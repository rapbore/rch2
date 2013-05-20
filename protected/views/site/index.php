<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'BIENVENIDO',
)); ?>
 
    <p>P&Aacute;GINA OFICIAL DE RECARGASCHILE</p>
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'AYUDA',
    )); ?><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'FAQ',
    )); ?></p>
 
<?php $this->endWidget(); ?>