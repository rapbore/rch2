<?php

Yii::import('application.models._base.BaseReporteGeneral');

class ReporteGeneral extends BaseReporteGeneral
{
	public static function model($className=__CLASS__) {
		return parent::model($className);

                }
                
        public function cargarUser()
	{
		$session=Yii::app()->getSession();
		$id_user=$session['_id'];
		return ($id_user);
		
	}
	
	public function cargarListasOperador(){
		
			$id_user=$this->cargarUser();
			
			$criteria=new CDbCriteria(array(
				'condition'=>'operador_id =:user_id and estado =:estado',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(':user_id' => $id_user, ':estado'=>'LISTA'),
					));
			$model=Atencion::model()->findAll($criteria);
			$dataProvider=new CActiveDataProvider('Atencion',array('criteria'=>$criteria,));
			$dataProvider->setPagination(false);		
			
			return ($dataProvider);

	}
}