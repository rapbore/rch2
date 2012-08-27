<?php

class LocalController extends GxController {

	public function filters() {
			return array(
					'rights', 
					);
		}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Local'),
		));
	}

	public function actionCreate() {
		$model = new Local;

		$this->performAjaxValidation($model, 'local-form');

		if (isset($_POST['Local'])) {
			$model->setAttributes($_POST['Local']);

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
		$model = $this->loadModel($id, 'Local');

		$this->performAjaxValidation($model, 'local-form');

		if (isset($_POST['Local'])) {
			$model->setAttributes($_POST['Local']);

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
			$this->loadModel($id, 'Local')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Local');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Local('search');
		$model->unsetAttributes();

		if (isset($_GET['Local']))
			$model->setAttributes($_GET['Local']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionVerLocalesCliente() {
		$model = new Local('search');
		$model->unsetAttributes();
		$dataProvider=$model->cargarLocalesCliente();
		
		$this->render('verLocalesCliente',array('dataProvider'=>$dataProvider,'model'=>$model));
	}
	
	public function actionVerLocalCliente($id) {
		
		$model = $this->loadModel($id, 'Local');
		$dataProvider=$model->cargarRecargasLocal($id);
		$this->render('verLocalCliente',array('dataProvider'=>$dataProvider,'model'=>$model));
	}
	
}//finfin