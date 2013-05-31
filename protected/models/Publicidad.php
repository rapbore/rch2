<?php

Yii::import('application.models._base.BasePublicidad');

class Publicidad extends BasePublicidad
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function scopes()
        {
            return array(
                'random'=>array(
                    'condition'=>'estado =:estado',
                    'order'=>"RAND()",
                    'limit'=>1,
                    'params'=> array(':estado' => "ACTIVO"),
                ),
            );
        }
}