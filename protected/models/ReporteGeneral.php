<?php

Yii::import('application.models._base.BaseReporteGeneral');

class ReporteGeneral extends BaseReporteGeneral
{
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
        
}
