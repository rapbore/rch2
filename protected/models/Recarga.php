<?php

Yii::import('application.models._base.BaseRecarga');

class Recarga extends BaseRecarga
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
	
	public function cargarListasEmpleado(){
		
			$id_user=$this->cargarUser();
			
			$criteria=new CDbCriteria(array(
				'condition'=>'user_id =:user_id and estado =:estado',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(':user_id' => $id_user, ':estado'=>'LISTA'),
					));
			$model=Recarga::model()->findAll($criteria);
			$dataProvider=new CActiveDataProvider('Recarga',array('criteria'=>$criteria,));
			$dataProvider->setPagination(false);		
			
			return ($dataProvider);

	}
	
	
	public function cargarPendientesEmpleado(){
		
			$id_user=$this->cargarUser();
			
			$criteria=new CDbCriteria(array(
				'condition'=>'user_id =:user_id',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(':user_id' => $id_user),
					));
			$model=Recarga::model()->findAll($criteria);
			$dataProvider=new CActiveDataProvider('Recarga',array('criteria'=>$criteria,));
			$dataProvider->setPagination(false);		
			
			return ($dataProvider);

	}
	 
	 
	public function cargarPendientesOperador(){
		
			$id_user=$this->cargarUser();
			
			$criteria=new CDbCriteria(array(
				'condition'=>'estado =:estado or estado =:estado2',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(':estado'=>'PENDIENTE', ':estado2'=>'PROCESANDO'),
					));
			$model=Recarga::model()->findAll($criteria);
			$dataProvider=new CActiveDataProvider('Recarga',array('criteria'=>$criteria,));
			$dataProvider->setPagination(false);		
			
			return ($dataProvider);

	}
	
	public function estaAtendida(){	
	$flag = Atencion::model()->exists('recarga_id =:recarga_id',array(':recarga_id'=>$this->id));
	return $flag;		
	}
	
	public function esMia($user_id){	
	$flag = Atencion::model()->exists('recarga_id =:recarga_id AND user_id = :user_id',array(':recarga_id'=>$this->id,':user_id'=>$user_id));
	return $flag;		
	}

	public function comprobarNoPrepago($celular){	
	$flag = Noprepago::model()->exists('numero =:numero',array(':numero'=>$celular));
	return $flag;		
	}
	
	public function cargarCupo($celular){	
	
	//$flag = Noprepago::model()->exists('numero =:numero and compania =:compania',array(':numero'=>$celular, ':compania'=>$compania));
	$model_cupo = Cupo::model()->findByAttributes(array('numero'=>$celular));
        if(!$model_cupo)
            return new Cupo;
	//$model_cupo = Cupo::model()->findByAttributes( array('numero'=>$numero), 'numero=:numero', array(':numero'=>$celular));
	return $model_cupo;
	
	}

}