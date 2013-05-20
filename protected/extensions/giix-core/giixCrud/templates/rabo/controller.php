<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass; ?> {

<?php 
	$authpath = 'ext.giix-core.giixCrud.templates.rabo.auth.';
	Yii::app()->controller->renderPartial($authpath . $this->authtype);
?>

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, '<?php echo $this->modelClass; ?>'),
		));
	}

	public function actionCreate() {
		$model = new <?php echo $this->modelClass; ?>;

<?php if ($this->enable_ajax_validation): ?>
		$this->performAjaxValidation($model, '<?php echo $this->class2id($this->modelClass)?>-form');
<?php endif; ?>

		if (isset($_POST['<?php echo $this->modelClass; ?>'])) {
			$model->setAttributes($_POST['<?php echo $this->modelClass; ?>']);
<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
			$relatedData = <?php echo $this->generateGetPostRelatedData($this->modelClass, 4); ?>;
<?php endif; ?>

<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
			if ($model->saveWithRelated($relatedData)) {
<?php else: ?>
			if ($model->save()) {
<?php endif; ?>
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, '<?php echo $this->modelClass; ?>');

<?php if ($this->enable_ajax_validation): ?>
		$this->performAjaxValidation($model, '<?php echo $this->class2id($this->modelClass)?>-form');
<?php endif; ?>

		if (isset($_POST['<?php echo $this->modelClass; ?>'])) {
			$model->setAttributes($_POST['<?php echo $this->modelClass; ?>']);
<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
			$relatedData = <?php echo $this->generateGetPostRelatedData($this->modelClass, 4); ?>;
<?php endif; ?>

<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
			if ($model->saveWithRelated($relatedData)) {
<?php else: ?>
			if ($model->save()) {
<?php endif; ?>
				$this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, '<?php echo $this->modelClass; ?>')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('<?php echo $this->modelClass; ?>');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
                $session = new CHttpSession;
                $session->open();
		$model = new <?php echo $this->modelClass; ?>('search');
		$model->unsetAttributes();

		if (isset($_GET['<?php echo $this->modelClass; ?>'])){
			$model->setAttributes($_GET['<?php echo $this->modelClass; ?>']);
                }

                $session['<?php echo $this->modelClass; ?>_model_search'] = $model;
                
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
             if(isset($session['<?php echo $this->modelClass; ?>_model_search']))
               {
                $model = $session['<?php echo $this->modelClass; ?>_model_search'];
                $model = <?php echo $this->modelClass; ?>::model()->findAll($model->search()->criteria);
               }
               else
                 $model = <?php echo $this->modelClass; ?>::model()->findAll();
<?php $variables = ''; ?>             
<?php foreach ($this->tableSchema->columns as $column): ?>
<?php if (!$column->isForeignKey): ?>
<?php $variables .= '\'' . $column->name . '\'' . ', '; ?>
<?php else: ?>
<?php $relations = $this->findRelation($this->modelClass, $column); ?>
<?php $relationName = $relations[0]; ?>
<?php $variables .= '\'' . $relationName . '\''. ', '; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php $variables = substr($variables, 0, -2); ?>
             $this->toExcel($model, array(<?php echo $variables; ?>), date('Y-m-d-H-i-s'), array(), 'Excel5');
	}
        
        public function actionGeneratePdf() 
	{
             $session=new CHttpSession;
             $session->open();
             if(isset($session['<?php echo $this->modelClass; ?>_model_search']))
               {
                $model = $session['<?php echo $this->modelClass; ?>_model_search'];
                $model = <?php echo $this->modelClass; ?>::model()->findAll($model->search()->criteria);
               }
               else
                 $model = <?php echo $this->modelClass; ?>::model()->findAll();
<?php $variables = ''; ?>             
<?php foreach ($this->tableSchema->columns as $column): ?>
<?php if (!$column->isForeignKey): ?>
<?php $variables .= '\'' . $column->name . '\'' . ', '; ?>
<?php else: ?>
<?php $relations = $this->findRelation($this->modelClass, $column); ?>
<?php $relationName = $relations[0]; ?>
<?php $variables .= '\'' . $relationName . '\''. ', '; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php $variables = substr($variables, 0, -2); ?>
             $this->toExcel($model, array(<?php echo $variables; ?>), date('Y-m-d-H-i-s'), array(), 'PDF');
	}
}