<?php

class ReporteGeneralController extends GxController {
    public $layout='column1';

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'ReporteGeneral'),
		));
	}


	public function actionAdmin() {
                $session = new CHttpSession;
                $session->open();
                
		$model = new ReporteGeneral('search');
		$model->unsetAttributes();

		if (isset($_GET['ReporteGeneral'])){
			$model->setAttributes($_GET['ReporteGeneral']);
                }

                $session['ReporteGeneral_model_search'] = $model;
                
		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function behaviors()
        {
            return array(
                'eexcelview'=>array(
                    'class'=>'ext.eexcelview.EExcelBehavior',
                ),
            );
        }
        
        public function actionGenerateExcel()
	{	   
             $session=new CHttpSession;
             $session->open();
             if(isset($session['ReporteGeneral_model_search']))
               {
                $model = $session['ReporteGeneral_model_search'];
                $model = ReporteGeneral::model()->findAll($model->search()->criteria);
               }
               else
                 $model = ReporteGeneral::model()->findAll();
             
             $this->toExcel($model, array('id', 'fecha_ingreso', 'celular', 'compania', 'monto', 'fecha_atencion', 'tiempo_respuesta', 'nombre_empleado','nombre_operador', 'nombre_cliente', 'nombre', 'estado'), 'Reporte '.date('Y-m-d-H-i-s'), array(), 'Excel5');
	}
        
        public function actionGeneratePdf() 
	{
             $session=new CHttpSession;
             $session->open();
             if(isset($session['ReporteGeneral_model_search']))
               {
                $model = $session['ReporteGeneral_model_search'];
                $model = ReporteGeneral::model()->findAll($model->search()->criteria);
               }
               else
                 $model = ReporteGeneral::model()->findAll();
             
             $this->toExcel($model, array('id', 'fecha_ingreso', 'celular', 'compania', 'monto', 'fecha_atencion', 'nombre_operador', 'nombre_cliente', 'nombre', 'ciudad_local', 'estado', 'tiempo_respuesta', 'nombre_operador', 'nombre_cliente', 'nombre_empleado', '', ''), date('Y-m-d-H-i-s'), array(), 'PDF');
	}
}