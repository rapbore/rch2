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
                        'claro' => Yii::t('app', 'Claro'),
			'atencions' => null,
			'estados' => null,
			'locals' => null,
			'recargas' => null,
			'user' => null,
			'users' => null,
		);
	}
        
        
        	
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}
	
	public function generateSalt()
	{
		return uniqid('',true);
	}
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}
        
        public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('estado', $this->estado, true);
		$criteria->compare('salt', $this->salt, true);
		$criteria->compare('tipo', $this->tipo, true);
		$criteria->compare('entel', $this->entel, true);
		$criteria->compare('movistar', $this->movistar, true);
                $criteria->compare('claro', $this->movistar, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                        'pagination'=>array(
                            'pageSize'=>20,
                        ),
		));
	}
}