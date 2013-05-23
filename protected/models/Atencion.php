<?php

Yii::import('application.models._base.BaseAtencion');

class Atencion extends BaseAtencion
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('cupo_id', $this->cupo_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('recarga_id', $this->recarga_id);
		$criteria->compare('fecha', $this->fecha, true);
		$criteria->compare('comentario', $this->comentario, true);
		$criteria->compare('estado', $this->estado, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                        'pagination'=>array('pageSize'=>100),
		));
	}
}