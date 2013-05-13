<?php

/**
 * This is the model base class for the table "atencion".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Atencion".
 *
 * Columns in table "atencion" available as properties of the model,
 * followed by relations of table "atencion" available as properties of the model.
 *
 * @property integer $id
 * @property integer $cupo_id
 * @property integer $user_id
 * @property integer $recarga_id
 * @property string $fecha
 * @property string $tiempoRespuesta
 * @property string $estado
 *
 * @property Cupo $cupo
 * @property Recarga $recarga
 * @property User $user
 * @property Noprepago[] $noprepagos
 */
abstract class BaseAtencion extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'atencion';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Atencion|Atencions', $n);
	}

	public static function representingColumn() {
		return 'fecha';
	}

	public function rules() {
		return array(
			array('cupo_id, user_id, recarga_id', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>45),
			array('recarga_id', 'unique'),
			array('fecha, tiempoRespuesta', 'safe'),
			array('cupo_id, user_id, recarga_id, fecha, tiempoRespuesta, estado', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, cupo_id, user_id, recarga_id, fecha, tiempoRespuesta, estado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'cupo' => array(self::BELONGS_TO, 'Cupo', 'cupo_id'),
			'recarga' => array(self::BELONGS_TO, 'Recarga', 'recarga_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'noprepagos' => array(self::HAS_MANY, 'Noprepago', 'atencion_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'cupo_id' => null,
			'user_id' => null,
			'recarga_id' => null,
			'fecha' => Yii::t('app', 'Fecha'),
			'tiempoRespuesta' => Yii::t('app', 'Tiempo Respuesta'),
			'estado' => Yii::t('app', 'Estado'),
			'cupo' => null,
			'recarga' => null,
			'user' => null,
			'noprepagos' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('cupo_id', $this->cupo_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('recarga_id', $this->recarga_id);
		$criteria->compare('fecha', $this->fecha, true);
		$criteria->compare('tiempoRespuesta', $this->tiempoRespuesta, true);
		$criteria->compare('estado', $this->estado, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
	
	
	
	
	
}//finfin