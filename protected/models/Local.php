<?php

Yii::import('application.models._base.BaseLocal');

class Local extends BaseLocal
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function search(){
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('ciudad', $this->ciudad, true);
		$criteria->compare('direccion', $this->direccion, true);
		$criteria->compare('telefono', $this->telefono, true);
		$criteria->compare('nombre', $this->nombre, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                        'pagination'=>array('pageSize'=>50),
		));
	}
	
	public function cargarUser(){
		$session=Yii::app()->getSession();
		$id_user=$session['_id'];
		return ($id_user);
		
	}
	
	public function cargarLocal(){
		$session=Yii::app()->getSession();
		$id_local=$session['_id'];
		return ($id_local);
		
	}
	
	public function cargarLocalesCliente(){
		
			$id_user=$this->cargarUser();			
			$criteria=new CDbCriteria(array(
				'condition'=>'user_id =:user_id',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(':user_id' => $id_user),
					));
			$model=Local::model()->findAll($criteria);
			$dataProvider=new CActiveDataProvider('Local',array('criteria'=>$criteria,));
			#$dataProvider->setPagination(false);		
			
			return ($dataProvider);

	}
	/*
	public function cargarRecargasLocal($id){
		
			$criteria=new CDbCriteria(array(
				'condition'=>'local_id =:local_id and estado =:estado',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(':local_id' => $id , ':estado'=>'LISTA'),
					));
			$model=Recarga::model()->findAll($criteria);
			$dataProvider=new CActiveDataProvider('Recarga',array('criteria'=>$criteria,));
			$dataProvider->setPagination(false);		
			
			return ($dataProvider);

	}
	*/
	
}