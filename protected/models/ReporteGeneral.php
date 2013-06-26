<?php

Yii::import('application.models._base.BaseReporteGeneral');

class ReporteGeneral extends BaseReporteGeneral
{
    public $total;
    public $cantidad;
	public static function model($className=__CLASS__) {
		return parent::model($className);

                }
        public function primaryKey(){
            return 'id';
        }
                
        public static function cargarUser()
	{
		$session=Yii::app()->getSession();
		$id_user=$session['_id'];
		return ($id_user);
		
	}
	
	public  function ListasOperador(){
		
			$id_user= ReporteGeneral::cargarUser();			
			$criteria=new CDbCriteria(array(
				'condition'=>'operador_id =:user_id and estado =:estado',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(
                                        ':user_id' => $id_user,
                                        ':estado'=>'LISTA'),
					));
//                        $hoy = new CDbExpression("CURDATE()");
//                        $criteria->addCondition('fecha_ingreso >= '.$hoy);
                        $criteria->compare('fecha_atencion',$this->fecha_atencion, true);
                        $criteria->compare('id',$this->id, true);
                        $criteria->compare('compania',$this->compania, true);
                        $criteria->compare('celular',$this->celular, true);
                        $criteria->compare('monto',$this->monto, true);
                        $criteria->compare('tiempo_respuesta',$this->tiempo_respuesta, true);
			
			$dataProvider=new CActiveDataProvider('ReporteGeneral',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100)));	
			
			return ($dataProvider);

        }
        
        public function reporteResumen(){
            
            $criteria=new CDbCriteria(array(
                                'select'=>'t.compania, sum(t.monto) AS total, Count(t.compania) AS cantidad, t.nombre_operador,t.operador_id',
                                'condition'=>'t.estado=:estado',
                                'group'=>'t.compania,t.operador_id',
                                'order'=>'t.operador_id, t.compania',
				'params'=> array(
                                        //':fecha' => $fecha,
                                        ':estado'=>'LISTA'),
					));
            $criteria->compare('compania',$this->compania, true);
            $criteria->compare('nombre_operador',$this->nombre_operador, true);
            $criteria->compare('fecha_atencion',$this->fecha_atencion, true);
            $dataProvider=new CActiveDataProvider('ReporteGeneral',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>500)));	
			
			return ($dataProvider);
        }
        public function search() {
		$criteria = new CDbCriteria;
                $criteria->order="id DESC";

		$criteria->compare('id', $this->id);
		$criteria->compare('fecha_ingreso', $this->fecha_ingreso, true);
		$criteria->compare('celular', $this->celular, true);
		$criteria->compare('compania', $this->compania, true);
		$criteria->compare('monto', $this->monto, true);
		$criteria->compare('fecha_atencion', $this->fecha_atencion, true);
		$criteria->compare('nombre_operador', $this->nombre_operador, true);
                $criteria->compare('nombre_empleado', $this->nombre_empleado, true);
		$criteria->compare('nombre_cliente', $this->nombre_cliente, true);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('ciudad_local', $this->ciudad_local, true);
		$criteria->compare('estado', $this->estado, true);
		$criteria->compare('tiempo_respuesta', $this->tiempo_respuesta, true);
		$criteria->compare('operador_id', $this->operador_id);
		$criteria->compare('atencion_id', $this->atencion_id);
		$criteria->compare('cliente_id', $this->cliente_id);
		$criteria->compare('local_id', $this->local_id);
		$criteria->compare('comentario', $this->comentario, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                    'pagination'=>array('pageSize'=>300),
		));
	}
        
        public function reporteCliente(){
            
            $criteria=new CDbCriteria(array(
                                'select'=>'t.compania, sum(t.monto) AS total, Count(t.compania) AS cantidad, t.nombre_cliente, t.nombre_empleado',
                                'condition'=>'t.estado=:estado',
                                'group'=>'t.compania, t.empleado_id,t.cliente_id',
                                'order'=>'t.nombre_cliente, t.nombre_empleado, t.compania',
				'params'=> array(
                                        //':order' => $order,
                                        ':estado'=>'LISTA'),
					));
            $criteria->compare('compania',$this->compania, true);
            $criteria->compare('nombre_cliente',$this->nombre_cliente, true);
            $criteria->compare('nombre_empleado',$this->nombre_empleado, true);
            $criteria->compare('fecha_atencion',$this->fecha_atencion, true);
            $dataProvider=new CActiveDataProvider('ReporteGeneral',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>500)));	
			
			return ($dataProvider);
        }
        
        public function reporteClienteSimple(){
            
            $criteria=new CDbCriteria(array(
                                'select'=>'t.compania, sum(t.monto) AS total, t.nombre_cliente, t.nombre_empleado',
                                'condition'=>'t.estado=:estado',
                                'group'=>'t.empleado_id,t.cliente_id',
                                'order'=>'t.nombre_cliente, t.nombre_empleado, t.compania',
				'params'=> array(
                                        //':order' => $order,
                                        ':estado'=>'LISTA'),
					));
            $criteria->compare('compania',$this->compania, true);
            $criteria->compare('nombre_cliente',$this->nombre_cliente, true);
            $criteria->compare('nombre_empleado',$this->nombre_empleado, true);
            $criteria->compare('fecha_atencion',$this->fecha_atencion, true);
            $dataProvider=new CActiveDataProvider('ReporteGeneral',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>500)));	
			
			return ($dataProvider);
        }
        
}
