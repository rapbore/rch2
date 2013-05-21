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
	
	public static function ListasOperador(){
		
			$id_user= ReporteGeneral::cargarUser();
			
			$criteria=new CDbCriteria(array(
				'condition'=>'operador_id =:user_id and estado =:estado',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(':user_id' => $id_user, ':estado'=>'LISTA'),
					));
                        $hoy = new CDbExpression("CURDATE()");
			$criteria->addCondition('fecha >= '.$hoy);
			$dataProvider=new CActiveDataProvider('ReporteGeneral',array('criteria'=>$criteria,'pagination'=>false));	
			
			return ($dataProvider);

	}
        
}