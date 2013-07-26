<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40741810-2', 'recargaschile.cl');
  ga('send', 'pageview');

</script>
<div class="container" id="page">

	<div id="header">
		<div id="logo"></div>
	</div><!-- header -->
<br>
	<div id="mainmenu">
		
		<?php 
		$session=Yii::app()->getSession();
		$_tipo=($session['_tipo']);
		$_local=($session['_local']);
		?>
		
			
		<?php	
		if($_tipo== NULL):			
	
		$this->widget('bootstrap.widgets.TbNavbar', array(
		    //'type'=>'inverse', // null or 'inverse'
		    'brand'=>'RCH 2.0',
		    'brandUrl'=>array('/site/index'),
		    //'collapse'=>true, // requires bootstrap-responsive.css
		    'items'=>array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Home', 'url'=>array('/site/index'),),
		                array('label'=>'Login', 'url'=>array('/site/login'),),
						
		                
		            ),
		        ),
		  	)
		)); 
		
		endif; ?>
		
		<?php	
		if($_tipo== "ADMIN"):
			
		$this->widget('bootstrap.widgets.TbNavbar', array(
		    'type'=>'inverse', // null or 'inverse'
		    'brand'=>'RCH 2.0',
		    'brandUrl'=>array('/site/index'),
		    'collapse'=>true, // requires bootstrap-responsive.css
		    'items'=>array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Roles', 'url'=>array('/rights')),
						array('label'=>'Usuarios', 'url'=>array('/user/admin')),
						array('label'=>'Locales', 'url'=>array('/local/admin')),
						//array('label'=>'Recargas', 'url'=>array('/reporteGeneral/admin')),
                                                array('label' => 'Reportes', 'url' => '#', 'items' => array(
                                                    array('label' => 'Recarga', 'url' => array('/reporteGeneral/admin')),
                                                    array('label' => 'Cliente', 'url' => array('/reporteGeneral/reporteCliente')),
                                                    array('label' => 'Cliente Simple', 'url' => array('/reporteGeneral/reporteClienteSimple')),
                                                    array('label' => 'Operador', 'url' => array('/reporteGeneral/reporteOperador')),
                                                )),
						array('label'=>'Cupo', 'url'=>array('/cupo/admin')),
						array('label'=>'No Prepagos', 'url'=>array('/noprepago/admin')),
						array('label'=>'Atenciones', 'url'=>array('/atencion/admin')),
                                                array('label'=>'Productos', 'url'=>array('/producto/verTodos')),
                                                array('label'=>'Pedidos', 'url'=>array('/pedido/verTodos')),
                                                array('label'=>'Publicidades', 'url'=>array('/publicidad/verTodos')),
                                                array('label' => 'Mensaje', 'url' => '#', 'items' => array(
                                                    array('label' => 'Crear Nuevo Mensaje', 'url' => array('/mensaje/crearNuevo')),
                                                    array('label' => 'Mis Mensajes', 'url' => array('/mensaje/todos')),
                                                    
                                                )),
						array('label'=>'Estado', 'url'=>array('/estado/admin')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ['.$session['_username'].']', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
		                
		            ),
		        ),
		  	)
		)); 
		
		endif; ?>
		
		<?php	
		if($_tipo== "EMPLEADO" and $_local):
				
		$this->widget('bootstrap.widgets.TbNavbar', array(
		    'type'=>'inverse', // null or 'inverse'
		    'brand'=>'RCH 2.0',
		    'brandUrl'=>array('/site/index'),
		    'collapse'=>true, // requires bootstrap-responsive.css
		    'items'=>array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'Recargar', 'url'=>array('/recarga/create')),
						array('label'=>'En Proceso', 'url'=>array('/recarga/verPendientesEmpleado')),
						array('label'=>'Recargas Listas', 'url'=>array('/recarga/verListasEmpleado')),
                                                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.$session['_username'].')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
		                
		            ),
		        ),
		  	)
		)); 
		
		endif; ?>
		
		<?php	
		if($_tipo== "EMPLEADO" and !$_local):
				
		$this->widget('bootstrap.widgets.TbNavbar', array(
		    'type'=>'inverse', // null or 'inverse'
		    'brand'=>'RCH 2.0',
		    'brandUrl'=>array('/site/index'),
		    'collapse'=>true, // requires bootstrap-responsive.css
		    'items'=>array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Home', 'url'=>array('/site/index')),
		                array('label'=>'Eligir Local', 'url'=>array('/user/elegir')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.$session['_username'].')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
		                
		            ),
		        ),
		  	)
		)); 
		
		endif; ?>
		
		
		<?php	
		if($_tipo== "OPERADOR"):
			
		$this->widget('bootstrap.widgets.TbNavbar', array(
		    'type'=>'inverse', // null or 'inverse'
		    'brand'=>'RCH 2.0',
		    'brandUrl'=>array('/site/index'),
		    'collapse'=>true, // requires bootstrap-responsive.css
		    'items'=>array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Home', 'url'=>array('/site/index')),
						//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						//array('label'=>'Contact', 'url'=>array('/site/contact')),
						array('label'=>'Atender Recargas', 'url'=>array('/recarga/verPendientesOperador')),
						array('label'=>'Recargas Listas', 'url'=>array('/atencion/verListasOperador')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.$session['_username'].')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
		                
		        ),
		    ),
		)
		); 
		
		endif; ?>
		
		<?php	
		if($_tipo== "CLIENTE"):
			
		$this->widget('bootstrap.widgets.TbNavbar', array(
		    'type'=>'inverse', // null or 'inverse'
		    'brand'=>'RCH 2.0',
		    'brandUrl'=>array('/site/index'),
		    'collapse'=>true, // requires bootstrap-responsive.css
		    'items'=>array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Home', 'url'=>array('/site/index')),
						//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						//array('label'=>'Contact', 'url'=>array('/site/contact')),
						array('label'=>'Locales', 'url'=>array('/local/verLocalesCliente')),
						//array('label'=>'Atenciones', 'url'=>array('/atencion/admin')),
                                                //array('label'=>'Historico Recargas', 'url'=>array('/recarga/verHistorico', 'id'=>$_local)),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.$session['_username'].')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
		                
		        ),
		    ),
		)
		); 
		
		endif; ?>
		
			
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
)); ?>
		<?php /*$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); */?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	
	<?php /* <div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer --> */ ?>

</div><!-- page -->

</body>
</html>
