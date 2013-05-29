<?php

Yii::import('application.models._base.BaseNoprepago');

class Noprepago extends BaseNoprepago
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('atencion_id', $this->atencion_id);
		$criteria->compare('numero', $this->numero, true);
		$criteria->compare('compania', $this->compania, true);
                $criteria->order="id desc";
                
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                        'pagination' => array('pageSize' => 10),
		));
	}
}