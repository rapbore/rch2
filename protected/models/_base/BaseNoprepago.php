<?php

/**
 * This is the model base class for the table "noprepago".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Noprepago".
 *
 * Columns in table "noprepago" available as properties of the model,
 * followed by relations of table "noprepago" available as properties of the model.
 *
 * @property integer $id
 * @property integer $atencion_id
 * @property string $numero
 * @property string $compania
 *
 * @property Atencion $atencion
 */
abstract class BaseNoprepago extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'noprepago';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Noprepago|Noprepagos', $n);
	}

	public static function representingColumn() {
		return 'numero';
	}

	public function rules() {
		return array(
			array('atencion_id', 'numerical', 'integerOnly'=>true),
			array('numero, compania', 'length', 'max'=>45),
			array('atencion_id, numero, compania', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, atencion_id, numero, compania', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'atencion' => array(self::BELONGS_TO, 'Atencion', 'atencion_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'atencion_id' => null,
			'numero' => Yii::t('app', 'Numero'),
			'compania' => Yii::t('app', 'Compania'),
			'atencion' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('atencion_id', $this->atencion_id);
		$criteria->compare('numero', $this->numero, true);
		$criteria->compare('compania', $this->compania, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}