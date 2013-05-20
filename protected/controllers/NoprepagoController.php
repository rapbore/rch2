<?php

class NoprepagoController extends GxController {

public function filters() {
		return array(
				'rights', 
				);
	}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Noprepago'),
		));
	}

	public function actionCreate() {
		$model = new Noprepago;

		$this->performAjaxValidation($model, 'noprepago-form');

		if (isset($_POST['Noprepago'])) {
			$model->setAttributes($_POST['Noprepago']);

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
		$model = $this->loadModel($id, 'Noprepago');

		$this->performAjaxValidation($model, 'noprepago-form');

		if (isset($_POST['Noprepago'])) {
			$model->setAttributes($_POST['Noprepago']);

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
			$this->loadModel($id, 'Noprepago')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Noprepago');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Noprepago('search');
		$model->unsetAttributes();

		if (isset($_GET['Noprepago']))
			$model->setAttributes($_GET['Noprepago']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}