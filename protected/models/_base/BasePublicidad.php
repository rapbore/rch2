<?php

/**
 * This is the model base class for the table "publicidad".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Publicidad".
 *
 * Columns in table "publicidad" available as properties of the model,
 * followed by relations of table "publicidad" available as properties of the model.
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $mensaje
 * @property string $estado
 *
 * @property User $user
 */
abstract class BasePublicidad extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'publicidad';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Publicidad|Publicidads', $n);
	}

	public static function representingColumn() {
		return 'mensaje';
	}

	public function rules() {
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>45),
			array('mensaje', 'safe'),
			array('user_id, mensaje, estado', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, mensaje, estado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
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
			'mensaje' => Yii::t('app', 'Mensaje'),
			'estado' => Yii::t('app', 'Estado'),
			'user' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('mensaje', $this->mensaje, true);
		$criteria->compare('estado', $this->estado, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}