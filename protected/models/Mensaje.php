<?php


Yii::import('application.models._base.BaseMensaje');

class Mensaje extends BaseMensaje
{
        public $fecha_inicio;
        public $fecha_termino;
        
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function rules() {
		return array_merge(parent::rules(), array(
                        array('fecha_inicio, fecha_termino', 'safe', 'on'=>'search'),
		));
	}
	public function attributeLabels() {
		return array_merge(parent::attributeLabels(), array(
                        'user_emisor' => Yii::t('app', 'Emisor'),
			'user_receptor' => Yii::t('app', 'Receptor'),
    			'fecha_inicio' => Yii::t('app', 'fecha_inicio'),
    			'fecha_termino' => Yii::t('app', 'fecha_termino'),
    		));
	}
        
        
	public function search() {
		$criteria = parent::search()->getCriteria();

                if((isset($this->fecha_inicio) && trim($this->fecha_inicio) != "") && (isset($this->fecha_termino) && trim($this->fecha_termino) != ""))                
                	$criteria->addBetweenCondition('fecha', $this->fecha_inicio, $this->fecha_termino);
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                        ));
	}
}