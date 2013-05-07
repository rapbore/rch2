<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => Yii::t('app', 'Cliente'),
			'username' => Yii::t('app', 'Empleado'),
			'password' => Yii::t('app', 'Password'),
			'estado' => Yii::t('app', 'Estado'),
			'salt' => Yii::t('app', 'Salt'),
			'tipo' => Yii::t('app', 'Tipo'),
			'entel' => Yii::t('app', 'Entel'),
			'movistar' => Yii::t('app', 'Movistar'),
			'atencions' => null,
			'estados' => null,
			'locals' => null,
			'recargas' => null,
			'user' => null,
			'users' => null,
		);
	}
}