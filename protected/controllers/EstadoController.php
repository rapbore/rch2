<?php

class EstadoController extends GxController {

	public function filters() {
			return array(
					'rights', 
					);
		}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Estado'),
		));
	}

	public function actionCreate() {
		$model = new Estado;

		$this->performAjaxValidation($model, 'estado-form');

		if (isset($_POST['Estado'])) {
			$model->setAttributes($_POST['Estado']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}
        
        public function actionCrear() {
		$model = new Estado;
                $status_model=Estado::model()->ultimo()->find();
		if($status_model->estado=='CERRADO')
			$model->estado='ACTIVO';
		if($status_model->estado=='ACTIVO')
			$model->estado='CERRADO';
		
                $session=Yii::app()->getSession();
		$id_user=$session['_id'];
		$model->user_id=$id_user;
                
		$model->fechaInicio=date("Y-m-d H:i:s",time());
                $status_model->fechaTermino= $model->fechaInicio;
                $status_model->save(false);
		$this->performAjaxValidation($model, 'estado-form');
                if (isset($_POST['Estado'])) {
			$model->setAttributes($_POST['Estado']);
                if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('admin', 'id' => $model->id));
                }
                }

		$this->render('crear', array( 'model' => $model));

		
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Estado');

		$this->performAjaxValidation($model, 'estado-form');

		if (isset($_POST['Estado'])) {
			$model->setAttributes($_POST['Estado']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Estado')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Estado');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Estado('search');
		$model->unsetAttributes();

		if (isset($_GET['Estado']))
			$model->setAttributes($_GET['Estado']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}