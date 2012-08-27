<?php

class AtencionController extends GxController {

	public function filters() {
		return array(
				'rights', 
				);
	}



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

		$this->performAjaxValidation($model, 'atencion-form');

		if (isset($_POST['Atencion'])) {
			$model->setAttributes($_POST['Atencion']);

			if ($model->save()) {
				$model_recarga = $this->loadModel($model->recarga->id, 'Recarga');
				$model_recarga->estado=$model->estado;
				$model_recarga->save(false);
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('_atender', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Atencion')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Atencion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
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
		
		$model = new Atencion('search');
		$model->unsetAttributes();
		$dataProvider=$model->cargarListasOperador();
			
		$this->render('verAtencionesOperador',array('dataProvider'=>$dataProvider,'model'=>$model));
		
	}
	
	public function actionCreaAtencion($id){

			$model_recarga = $this->loadModel($id, 'Recarga');			
			$session=Yii::app()->getSession();
			$id_user=$session['_id'];
			
			/****
			VALIDACION SI ESTA ATENDIDA
			*****/
			if($model_recarga->estaAtendida()){
			
				$model_atencion = $this->loadModel($model_recarga->atencion->id, 'Atencion');			
				if ($model_recarga->esMia($id_user))
					$this->redirect(array('atencion/update', 'id' =>$model_atencion->id));
				else
					$this->redirect(array('create'));
					
			}else{
			
			/*****
			CREACION DE ATENCION
			******/
			try{
				$model_atencion = new Atencion;
				$model_atencion->user_id=$id_user;
				$model_atencion->recarga_id=$id;
				$model_atencion->estado="PROCESANDO";
				$model_recarga->estado=$model_atencion->estado;
				
				$model_atencion->save(false);
				$model_recarga->save(false);
				
				$this->redirect(array('atencion/update', 'id' =>$model_atencion->id));
				
			 }catch(Exception $e){
				$model_atencion = $this->loadModel($model_recarga->atencion->id, 'Atencion');
				$this->redirect(array('atencion/view', 'id' =>$model_atencion->id));
			 }
			
			}
				
			
        }
	
}//finfin