<?php

/**
 * This is the model base class for the table "recarga".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Recarga".
 *
 * Columns in table "recarga" available as properties of the model,
 * followed by relations of table "recarga" available as properties of the model.
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $local_id
 * @property string $celular
 * @property string $compania
 * @property string $monto
 * @property string $comentario
 * @property string $estado
 * @property string $fecha
 *
 * @property Atencion[] $atencions
 * @property Local $local
 * @property User $user
 */
abstract class BaseRecarga extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'recarga';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Recarga|Recargas', $n);
	}

	public static function representingColumn() {
		return 'celular';
	}

	public function rules() {
		return array(
			array('user_id, local_id', 'numerical', 'integerOnly'=>true),
			array('celular, compania, monto, estado', 'length', 'max'=>45),
			array('comentario', 'length', 'max'=>200),
			array('fecha', 'safe'),
			array('user_id, local_id, celular, compania, monto, comentario, estado, fecha', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, local_id, celular, compania, monto, comentario, estado, fecha', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'atencion' => array(self::HAS_ONE, 'Atencion', 'recarga_id'),
			'local' => array(self::BELONGS_TO, 'Local', 'local_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'OT'),
			'user_id' => null,
			'local_id' => null,
			'celular' => Yii::t('app', 'Celular'),
			'compania' => Yii::t('app', 'Compania'),
			'monto' => Yii::t('app', 'Monto'),
			'comentario' => Yii::t('app', 'Comentario'),
			'estado' => Yii::t('app', 'Estado'),
			'fecha' => Yii::t('app', 'Fecha'),
			'atencions' => null,
			'local' => null,
			'user' => null,
		);
	}

	
	
	
	
	
}//finfin