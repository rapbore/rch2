<?php

/**
 * This is the model base class for the table "user".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "User".
 *
 * Columns in table "user" available as properties of the model,
 * followed by relations of table "user" available as properties of the model.
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $estado
 * @property string $salt
 * @property string $tipo
 * @property string $entel
 * @property string $movistar
 *
 * @property Atencion[] $atencions
 * @property Estado[] $estados
 * @property Local[] $locals
 * @property Pedido[] $pedidos
 * @property Publicidad[] $publicidads
 * @property Recarga[] $recargas
 * @property User $user
 * @property User[] $users
 */
abstract class BaseUser extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'User|Users', $n);
	}

	public static function representingColumn() {
		return 'username';
	}

	public function rules() {
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('username, password, estado, tipo, entel, movistar', 'length', 'max'=>45),
			array('salt', 'length', 'max'=>64),
			array('user_id, username, password, estado, salt, tipo, entel, movistar', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, username, password, estado, salt, tipo, entel, movistar', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'atencions' => array(self::HAS_MANY, 'Atencion', 'user_id'),
			'estados' => array(self::HAS_MANY, 'Estado', 'user_id'),
			'locals' => array(self::HAS_MANY, 'Local', 'user_id'),
			'pedidos' => array(self::HAS_MANY, 'Pedido', 'user_id'),
			'publicidads' => array(self::HAS_MANY, 'Publicidad', 'user_id'),
			'recargas' => array(self::HAS_MANY, 'Recarga', 'user_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'users' => array(self::HAS_MANY, 'User', 'user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => null,
			'username' => Yii::t('app', 'Username'),
			'password' => Yii::t('app', 'Password'),
			'estado' => Yii::t('app', 'Estado'),
			'salt' => Yii::t('app', 'Salt'),
			'tipo' => Yii::t('app', 'Tipo'),
			'entel' => Yii::t('app', 'Entel'),
			'movistar' => Yii::t('app', 'Movistar'),
			'atencions' => null,
			'estados' => null,
			'locals' => null,
			'pedidos' => null,
			'publicidads' => null,
			'recargas' => null,
			'user' => null,
			'users' => null,
		);
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

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}