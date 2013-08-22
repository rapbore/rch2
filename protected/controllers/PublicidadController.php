<?php

class PublicidadController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Publicidad'),
		));
	}
        
        public function actionVer($id) {
		$this->render('ver', array(
			'model' => $this->loadModel($id, 'Publicidad'),
		));
	}
        
        public function actionCambiarEstado($id) {
            $model = new Publicidad;  
            $model = $this->loadModel($id, 'Publicidad');
            if($model->estado == 'ACTIVO')
                $model->estado='DESACTIVADO';
            else
                $model->estado='ACTIVO';
            $model->save();
            $this->redirect(array('verTodos'));
	}

	public function actionCreate() {
		$model = new Publicidad;

		$this->performAjaxValidation($model, 'publicidad-form');

		if (isset($_POST['Publicidad'])) {
			$model->setAttributes($_POST['Publicidad']);

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
		$model = new Publicidad;
                $session=Yii::app()->getSession();
                $id_user=$session['_id'];
                $model->user_id=$id_user;
		$this->performAjaxValidation($model, 'publicidad-form');

		if (isset($_POST['Publicidad'])) {
			$model->setAttributes($_POST['Publicidad']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('verTodos'));
			}
		}

		$this->render('crear', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Publicidad');

		$this->performAjaxValidation($model, 'publicidad-form');

		if (isset($_POST['Publicidad'])) {
			$model->setAttributes($_POST['Publicidad']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}
        
        public function actionActualizar($id) {
		$model = $this->loadModel($id, 'Publicidad');

		$this->performAjaxValidation($model, 'publicidad-form');

		if (isset($_POST['Publicidad'])) {
			$model->setAttributes($_POST['Publicidad']);

			if ($model->save()) {
				$this->redirect(array('verTodos'));
			}
		}

		$this->render('actualizar', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Publicidad')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        
        public function actionEliminar($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Publicidad')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('verTodos'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Publicidad');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
                $session = new CHttpSession;
                $session->open();
		$model = new Publicidad('search');
		$model->unsetAttributes();

		if (isset($_GET['Publicidad'])){
			$model->setAttributes($_GET['Publicidad']);
                }

                $session['Publicidad_model_search'] = $model;
                
		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionVerTodos() {
                $session = new CHttpSession;
                $session->open();
		$model = new Publicidad('search');
		$model->unsetAttributes();

		if (isset($_GET['Publicidad'])){
			$model->setAttributes($_GET['Publicidad']);
                }

                $session['Publicidad_model_search'] = $model;
                
		$this->render('verTodos', array(
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
             if(isset($session['Publicidad_model_search']))
               {
                $model = $session['Publicidad_model_search'];
                $model = Publicidad::model()->findAll($model->search()->criteria);
               }
               else
                 $model = Publicidad::model()->findAll();
             
             $this->toExcel($model, array('id', 'user', 'mensaje', 'estado'), date('Y-m-d-H-i-s'), array(), 'Excel5');
	}
        
        public function actionGeneratePdf() 
	{
             $session=new CHttpSession;
             $session->open();
             if(isset($session['Publicidad_model_search']))
               {
                $model = $session['Publicidad_model_search'];
                $model = Publicidad::model()->findAll($model->search()->criteria);
               }
               else
                 $model = Publicidad::model()->findAll();
             
             $this->toExcel($model, array('id', 'user', 'mensaje', 'estado'), date('Y-m-d-H-i-s'), array(), 'PDF');
	}
}