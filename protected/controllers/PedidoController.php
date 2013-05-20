<?php

class PedidoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Pedido'),
		));
	}
        
        public function actionVer($id) {
		$this->render('ver', array(
			'model' => $this->loadModel($id, 'Pedido'),
		));
	}

	public function actionCreate() {
		$model = new Pedido;

		$this->performAjaxValidation($model, 'pedido-form');

		if (isset($_POST['Pedido'])) {
			$model->setAttributes($_POST['Pedido']);

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
		$model = new Pedido;

		$this->performAjaxValidation($model, 'pedido-form');

		if (isset($_POST['Pedido'])) {
			$model->setAttributes($_POST['Pedido']);
                        $model_producto = $this->loadModel($model->producto_id, 'Producto');
                        $model->total=$model->cantidad*$model_producto->precio;
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('ver', 'id' => $model->id));
			}
		}

		$this->render('crear', array( 'model' => $model));
	}
        
	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Pedido');

		$this->performAjaxValidation($model, 'pedido-form');

		if (isset($_POST['Pedido'])) {
			$model->setAttributes($_POST['Pedido']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}
        
        public function actionActualizar($id) {
		$model = $this->loadModel($id, 'Pedido');

		$this->performAjaxValidation($model, 'pedido-form');

		if (isset($_POST['Pedido'])) {
			$model->setAttributes($_POST['Pedido']);
                        $model_producto = $this->loadModel($model->producto_id, 'Producto');
                        $model->total=$model->cantidad*$model_producto->precio;

			if ($model->save()) {
				$this->redirect(array('ver', 'id' => $model->id));
			}
		}

		$this->render('actualizar', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Pedido')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
        
        public function actionEliminar($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Pedido')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('verTodos'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Pedido');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
                $session = new CHttpSession;
                $session->open();
		$model = new Pedido('search');
		$model->unsetAttributes();

		if (isset($_GET['Pedido'])){
			$model->setAttributes($_GET['Pedido']);
                }

                $session['Pedido_model_search'] = $model;
                
		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionVerTodos() {
                $session = new CHttpSession;
                $session->open();
		$model = new Pedido('search');
		$model->unsetAttributes();

		if (isset($_GET['Pedido'])){
			$model->setAttributes($_GET['Pedido']);
                }

                $session['Pedido_model_search'] = $model;
                
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
             if(isset($session['Pedido_model_search']))
               {
                $model = $session['Pedido_model_search'];
                $model = Pedido::model()->findAll($model->search()->criteria);
               }
               else
                 $model = Pedido::model()->findAll();
             
             $this->toExcel($model, array('id', 'user', 'producto', 'cantidad', 'total', 'estado'), date('Y-m-d-H-i-s'), array(), 'Excel5');
	}
        
        public function actionGeneratePdf() 
	{
             $session=new CHttpSession;
             $session->open();
             if(isset($session['Pedido_model_search']))
               {
                $model = $session['Pedido_model_search'];
                $model = Pedido::model()->findAll($model->search()->criteria);
               }
               else
                 $model = Pedido::model()->findAll();
             
             $this->toExcel($model, array('id', 'user', 'producto', 'cantidad', 'total', 'estado'), date('Y-m-d-H-i-s'), array(), 'PDF');
	}
}