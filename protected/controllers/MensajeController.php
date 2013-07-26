<?php

class MensajeController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Mensaje'),
		));
	}

	public function actionCreate() {
		$model = new Mensaje;

		$this->performAjaxValidation($model, 'mensaje-form');

		if (isset($_POST['Mensaje'])) {
			$model->setAttributes($_POST['Mensaje']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}
        
        public function actionCrearNuevo() {
		$model = new Mensaje;
                
                $model->user_emisor=1;
                $model->fecha=date("Y-m-d H:i:s",time());
		$this->performAjaxValidation($model, 'mensaje-form');

		if (isset($_POST['Mensaje'])) {
			$model->setAttributes($_POST['Mensaje']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('Responder', 'id' => $model->user_receptor));
			}
		}

		$this->render('crearNuevo', array( 'model' => $model));
	}
        
        public function actionCrear() {
		$model = new Mensaje;
                $model->user_emisor=Yii::app()->user->id;
                
                //$model_mensajes = $this->loadModel($model->user_emisor, 'User');
                //$model_mensajes=$model_mensajes->mensajes(array('scopes'=>array('anteriores')));
		$dataProvider = $model->misMensajes(Yii::app()->user->id);	           
                
                $model->fecha=date("Y-m-d H:i:s",time());
		$this->performAjaxValidation($model, 'mensaje-form');

		if (isset($_POST['Mensaje'])) {
			$model->setAttributes($_POST['Mensaje']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('crear'));
			}
		}

		$this->render('crear', array( 'model' => $model, 'dataProvider' => $dataProvider));
	}
        
        public function actionResponder($id) {
		$model = new Mensaje;
                $model->user_emisor=Yii::app()->user->id;
                $model->user_receptor = $id;
                
                //$model_mensajes = $this->loadModel($model->user_emisor, 'User');
                //$model_mensajes=$model_mensajes->mensajes(array('scopes'=>array('anteriores')));
		$dataProvider = $model->misMensajes($id);	           
                
                $model->fecha=date("Y-m-d H:i:s",time());
		$this->performAjaxValidation($model, 'mensaje-form');

		if (isset($_POST['Mensaje'])) {
			$model->setAttributes($_POST['Mensaje']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('responder', 'id' => $id));
			}
		}

		$this->render('crear', array( 'model' => $model, 'dataProvider' => $dataProvider));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Mensaje');

		$this->performAjaxValidation($model, 'mensaje-form');

		if (isset($_POST['Mensaje'])) {
			$model->setAttributes($_POST['Mensaje']);

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
			$this->loadModel($id, 'Mensaje')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        public function actionEliminar($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Mensaje')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Mensaje');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
                $session = new CHttpSession;
                $session->open();
		$model = new Mensaje('search');
		$model->unsetAttributes();

		if (isset($_GET['Mensaje'])){
			$model->setAttributes($_GET['Mensaje']);
                }

                $session['Mensaje_model_search'] = $model;
                
		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionTodos() {
                $session = new CHttpSession;
                $session->open();
		$model = new Mensaje('search');
		$model->unsetAttributes();

		if (isset($_GET['Mensaje'])){
			$model->setAttributes($_GET['Mensaje']);
                }

                $session['Mensaje_model_search'] = $model;
                
		$this->render('todos', array(
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
             if(isset($session['Mensaje_model_search']))
               {
                $model = $session['Mensaje_model_search'];
                $model = Mensaje::model()->findAll($model->search()->criteria);
               }
               else
                 $model = Mensaje::model()->findAll();
             
             $this->toExcel($model, array('id', 'userEmisor', 'userReceptor', 'fecha', 'mensaje', 'estado'), date('Y-m-d-H-i-s'), array(), 'Excel5');
	}
        
        public function actionGeneratePdf() 
	{
             $session=new CHttpSession;
             $session->open();
             if(isset($session['Mensaje_model_search']))
               {
                $model = $session['Mensaje_model_search'];
                $model = Mensaje::model()->findAll($model->search()->criteria);
               }
               else
                 $model = Mensaje::model()->findAll();
             
             $this->toExcel($model, array('id', 'userEmisor', 'userReceptor', 'fecha', 'mensaje', 'estado'), date('Y-m-d-H-i-s'), array(), 'PDF');
	}
}
