<?php

class ProductoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Producto'),
		));
	}

	public function actionCreate() {
		$model = new Producto;

		$this->performAjaxValidation($model, 'producto-form');

		if (isset($_POST['Producto'])) {
			$model->setAttributes($_POST['Producto']);

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
		$model = $this->loadModel($id, 'Producto');

		$this->performAjaxValidation($model, 'producto-form');

		if (isset($_POST['Producto'])) {
			$model->setAttributes($_POST['Producto']);

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
			$this->loadModel($id, 'Producto')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Producto');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
                $session = new CHttpSession;
                $session->open();
		$model = new Producto('search');
		$model->unsetAttributes();

		if (isset($_GET['Producto'])){
			$model->setAttributes($_GET['Producto']);
                }

                $session['Producto_model_search'] = $model;
                
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
             if(isset($session['Producto_model_search']))
               {
                $model = $session['Producto_model_search'];
                $model = Producto::model()->findAll($model->search()->criteria);
               }
               else
                 $model = Producto::model()->findAll();
             
             $this->toExcel($model, array('id', 'nombre', 'precio', 'descripcion'), date('Y-m-d-H-i-s'), array(), 'Excel5');
	}
        
        public function actionGeneratePdf() 
	{
             $session=new CHttpSession;
             $session->open();
             if(isset($session['Producto_model_search']))
               {
                $model = $session['Producto_model_search'];
                $model = Producto::model()->findAll($model->search()->criteria);
               }
               else
                 $model = Producto::model()->findAll();
             
             $this->toExcel($model, array('id', 'nombre', 'precio', 'descripcion'), date('Y-m-d-H-i-s'), array(), 'PDF');
	}
}