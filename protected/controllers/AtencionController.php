<?php

class AtencionController extends GxController {

	public function filters() {
		return array(
				'rights', 
				);
	}

        public $layout="column1";

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Atencion'),
		));
	}

	public function actionCreate() {
		$model = new Atencion;

		$this->performAjaxValidation($model, 'atencion-form');

		if (isset($_POST['Atencion'])) {
			$model->setAttributes($_POST['Atencion']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}
		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Atencion');
                $model->comentario="";
                $model->estado="LISTA";

		$this->performAjaxValidation($model, 'atencion-form');

		if (isset($_POST['Atencion'])) {
			$model->setAttributes($_POST['Atencion']);
                        $model->fecha=date("Y-m-d H:i:s", time()); 
			if ($model->save()) {
				
				$model_recarga = $this->loadModel($model->recarga->id, 'Recarga');
                                $model_recarga->estado=$model->estado;
				$model_recarga->save();
                                
                                if($model->estado=="RECHAZADA NO PREPAGO"){
					$this->actionCrearNoprepago($model->id, $model_recarga->celular, $model_recarga->compania);
                                }else{
                                  if($model_recarga->compania=='Entel' && $model->estado=='LISTA'){
					$this->AumentarCupo($model_recarga->celular);				
                                    }  
                                    
                                }
				
                                
                                
                                
				$this->redirect(array('recarga/verPendientesOperador', 'id' => $model->id));
			}
		}

		$this->render('_atender', array(
				'model' => $model,
				));
	}
	
	public function AumentarCupo($celular)
	{       
                $model_cupo = null;
                $model_cupo = new Cupo;
		$model_cupo=Cupo::model()->findByAttributes(array('numero'=>$celular));            
		if($model_cupo && !empty($model_cupo)){
			$model_cupo->cupo=($model_cupo->cupo)-1;
			$model_cupo->save(false);
		}
		else{	
                        $model_cupo = null;
                        $model_cupo = new Cupo;
			$model_cupo->numero=$celular;
			$model_cupo->cupo=1;
			$model_cupo->estado='DISPONIBLE';
			$model_cupo->save(false);
		}
		
	}
	
	public function actionCrearNoprepago($idAtencion, $celular, $compania){
		
		$model = new Noprepago;
		$model->atencion_id=$idAtencion;
		$model->numero=$celular;
		$model->compania=$compania;
		$model->save();
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Atencion')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}


	public function actionAdmin() {
		$model = new Atencion('search');
		$model->unsetAttributes();

		if (isset($_GET['Atencion']))
			$model->setAttributes($_GET['Atencion']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionVerListasOperador()
	{
		$model_reporte= new ReporteGeneral("search");
                $model_reporte->unsetAttributes();
                if (isset($_GET['ReporteGeneral']))
			$model_reporte->setAttributes($_GET['ReporteGeneral']);
                
		$this->render('verAtencionesOperador',array('dataProvider'=>$model_reporte));
		
	}
	
	public function actionCreaAtencion($id){
          
                        $model_recarga = null;
                        $model_atencion = null;
			$model_recarga = $this->loadModel($id, 'Recarga');
                        
			$session=Yii::app()->getSession();
			$id_user=$session['_id'];
                        if($id_user==NULL)
                                $id_user=Yii::app()->user->getId();
                        
			
			/****
			VALIDACION SI ESTA ATENDIDA
			*****/
			if($model_recarga->estaAtendida()){
			
				$model_atencion = $this->loadModel($model_recarga->atencion->id, 'Atencion');			
				if ($model_recarga->esMia($id_user)){
					$this->redirect(array('atencion/update', 'id' =>$model_recarga->atencion->id));
				}else{
					$this->redirect(array('recarga/verPendientesOperador'));
					
					}
					
			}else{
			
                        if($id_user==NULL)
                                $this->redirect(array('site/login'));
			/*****
			CREACION DE ATENCION
			******/
			try{
                                $model_atencion = null;
				$model_atencion = new Atencion;
				$model_atencion->user_id=$id_user;
				$model_atencion->recarga_id=$id;
				$model_atencion->estado="PROCESANDO";
                                $model_atencion->comentario="Operador: ".Yii::app()->user->getId();
                                
				if($model_atencion->save()){
                                    $model_recarga = null;
                                    $model_recarga = $this->loadModel($id, 'Recarga');
                                    $model_recarga->estado="PROCESANDO";
                                    $model_recarga->update(array('estado'));
                                    $this->redirect(array('atencion/update', 'id' =>$model_atencion->id));
                                }else{
                                    $this->redirect(array('recarga/verPendientesOperador'));
                                }
				
			 }catch(Exception $e){
				$this->redirect(array('recarga/verPendientesOperador'));
			 }
			
			}
				
			
        }
	
}//finfin