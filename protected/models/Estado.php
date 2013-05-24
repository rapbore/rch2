<?php

Yii::import('application.models._base.BaseEstado');

class Estado extends BaseEstado
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function scopes() {
            return array(
                'ultimo'=>array(
                    'order'=>'id DESC',
                    'limit'=>1,
                ),
                'primero'=>array(
                    'order'=>'id ASC',
                    'limit'=>1,
                ),
            );
            
        }
        
        public function search() {
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('fechaInicio', $this->fechaInicio, true);
		$criteria->compare('fechaTermino', $this->fechaTermino, true);
		$criteria->compare('estado', $this->estado, true);
		$criteria->compare('mensaje', $this->mensaje, true);
                $criteria->order="id desc";
                
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                        'pagination' => array('pageSize' => 10),
		));
	}
}