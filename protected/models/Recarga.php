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
                        $hoy = new CDbExpression("CURDATE()");
			$criteria->addCondition('fecha >= '.$hoy);
			$model=Recarga::model()->findAll($criteria);
			$dataProvider=new CActiveDataProvider('Recarga',array('criteria'=>$criteria,'pagination'=>false));
				
			
			return ($dataProvider);

	}
	
	
	public function cargarPendientesEmpleado(){
		
			$id_user=$this->cargarUser();
			
			$criteria=new CDbCriteria(array(
				'condition'=>'user_id =:user_id',
				'order'=>'id DESC',
				'params'=> array(':user_id' => $id_user),
					));
                        $hoy = new CDbExpression("CURDATE()");
			$criteria->addCondition('fecha >= '.$hoy);
			
			return new CActiveDataProvider('Recarga',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>10),));			

	}
	 
	 
	public function cargarPendientesOperador(){
		
			$id_user=$this->cargarUser();
                        
			
			$criteria=new CDbCriteria(array(
				'condition'=>'t.estado =:estado or (t.estado =:estado2 AND atencion.user_id = :user)',
				'order'=>'t.id DESC',
				'limit'=>500,
                                'with'=>array('atencion'),
				'params'=> array(':estado'=>'PENDIENTE', ':estado2'=>'PROCESANDO', ':user'=>$id_user),
					));
                        
                        $hoy = new CDbExpression("CURDATE()");
			$criteria->addCondition('t.fecha >= '.$hoy);
			$model=Recarga::model()->findAll($criteria);
			$dataProvider=new CActiveDataProvider('Recarga',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100)));		
			return ($dataProvider);

	}
	
	public function estaAtendida(){		
            return Atencion::model()->exists('recarga_id =:recarga_id',array(':recarga_id'=>$this->id));        
	}
	
	public function esMia($user_id){	
            return Atencion::model()->exists('recarga_id =:recarga_id AND user_id = :user_id',array(':recarga_id'=>$this->id,':user_id'=>$user_id));		
	}

	public function comprobarNoPrepago($celular){	
	$flag = Noprepago::model()->exists('numero =:numero',array(':numero'=>$celular));
	return $flag;		
	}
	
	public function cargarCupo($celular){	
	//$flag = Noprepago::model()->exists('numero =:numero and compania =:compania',array(':numero'=>$celular, ':compania'=>$compania));
	$model_cupo = Cupo::model()->findByAttributes(array('numero'=>$celular));
        if(!$model_cupo && empty($model_cupo))
            return new Cupo;
	//$model_cupo = Cupo::model()->findByAttributes( array('numero'=>$numero), 'numero=:numero', array(':numero'=>$celular));
	return $model_cupo;
	
	}
        
        public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('local_id', $this->local_id);
		$criteria->compare('celular', $this->celular, true);
		$criteria->compare('compania', $this->compania, true);
		$criteria->compare('monto', $this->monto, true);
		$criteria->compare('comentario', $this->comentario, true);
		$criteria->compare('estado', $this->estado, true);
		$criteria->compare('fecha', $this->fecha, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                        'pagination'=>array('pageSize'=>100)
		));
	}
        
        	public function cargarRecargasLocal($id){
		
			$criteria=new CDbCriteria(array(
				'condition'=>'local_id =:local_id and estado =:estado',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(':local_id' => $id , ':estado'=>'LISTA'),
					));
			$hoy = new CDbExpression("CURDATE()");
			$criteria->addCondition('fecha >= '.$hoy);
                        $criteria->compare('compania', $this->compania, true);
                        $criteria->compare('celular', $this->celular, true);
                        $criteria->compare('monto', $this->monto, true);
		
			return new CActiveDataProvider('Recarga',array('criteria'=>$criteria,'pagination'=>false));

	}

}