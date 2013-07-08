<?php

class CupoController extends GxController {

	public function filters() {
			return array(
					'rights', 
					);
		}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Cupo'),
		));
	}

	public function actionCreate() {
		$model = new Cupo;

		$this->performAjaxValidation($model, 'cupo-form');

		if (isset($_POST['Cupo'])) {
			$model->setAttributes($_POST['Cupo']);

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
		$model = $this->loadModel($id, 'Cupo');

		$this->performAjaxValidation($model, 'cupo-form');

		if (isset($_POST['Cupo'])) {
			$model->setAttributes($_POST['Cupo']);

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
			$this->loadModel($id, 'Cupo')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Cupo');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Cupo('search');
		$model->unsetAttributes();

		if (isset($_GET['Cupo']))
			$model->setAttributes($_GET['Cupo']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionEliminarTodos(){
            $model = new Cupo;
            Cupo::model()->deleteAll();
            $this->redirect(array('admin'));
        }

}