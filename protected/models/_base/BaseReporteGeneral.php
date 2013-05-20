<?php

/**
 * This is the model base class for the table "reporte_general".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ReporteGeneral".
 *
 * Columns in table "reporte_general" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $fecha_ingreso
 * @property string $celular
 * @property string $compania
 * @property string $monto
 * @property string $fecha_atencion
 * @property string $nombre_operador
 * @property string $nombre_cliente
 * @property string $nombre
 * @property string $ciudad_local
 * @property string $estado
 * @property string $tiempo_respuesta
 * @property integer $operador_id
 * @property integer $atencion_id
 * @property integer $cliente_id
 * @property integer $local_id
 * @property string $comentario
 *
 */
abstract class BaseReporteGeneral extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'reporte_general';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Reporte General|Reportes Generales', $n);
	}

	public static function representingColumn() {
		return 'fecha_ingreso';
	}

	public function rules() {
		return array(
			array('id, operador_id, atencion_id, cliente_id, local_id', 'numerical', 'integerOnly'=>true),
			array('celular, compania, monto, nombre_operador, nombre_cliente, nombre, ciudad_local, estado', 'length', 'max'=>45),
			array('comentario', 'length', 'max'=>200),
			array('fecha_ingreso, fecha_atencion, tiempo_respuesta', 'safe'),
			array('id, fecha_ingreso, celular, compania, monto, fecha_atencion, nombre_operador, nombre_cliente, nombre, ciudad_local, estado, tiempo_respuesta, operador_id, atencion_id, cliente_id, local_id, comentario', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, fecha_ingreso, celular, compania, monto, fecha_atencion, nombre_operador, nombre_cliente, nombre, ciudad_local, estado, tiempo_respuesta, operador_id, atencion_id, cliente_id, local_id, comentario', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'fecha_ingreso' => Yii::t('app', 'Fecha Ingreso'),
			'celular' => Yii::t('app', 'Celular'),
			'compania' => Yii::t('app', 'Compania'),
			'monto' => Yii::t('app', 'Monto'),
			'fecha_atencion' => Yii::t('app', 'Fecha Atencion'),
			'nombre_operador' => Yii::t('app', 'Operador'),
			'nombre_cliente' => Yii::t('app', 'Cliente'),
			'nombre' => Yii::t('app', 'Local'),
			'ciudad_local' => Yii::t('app', 'Ciudad Local'),
			'estado' => Yii::t('app', 'Estado'),
			'tiempo_respuesta' => Yii::t('app', 'Tiempo Respuesta'),
			'operador_id' => Yii::t('app', 'Operador'),
			'atencion_id' => Yii::t('app', 'Atencion'),
			'cliente_id' => Yii::t('app', 'Cliente'),
			'local_id' => Yii::t('app', 'Local'),
			'comentario' => Yii::t('app', 'Comentario'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('fecha_ingreso', $this->fecha_ingreso, true);
		$criteria->compare('celular', $this->celular, true);
		$criteria->compare('compania', $this->compania, true);
		$criteria->compare('monto', $this->monto, true);
		$criteria->compare('fecha_atencion', $this->fecha_atencion, true);
		$criteria->compare('nombre_operador', $this->nombre_operador, true);
		$criteria->compare('nombre_cliente', $this->nombre_cliente, true);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('ciudad_local', $this->ciudad_local, true);
		$criteria->compare('estado', $this->estado, true);
		$criteria->compare('tiempo_respuesta', $this->tiempo_respuesta, true);
		$criteria->compare('operador_id', $this->operador_id);
		$criteria->compare('atencion_id', $this->atencion_id);
		$criteria->compare('cliente_id', $this->cliente_id);
		$criteria->compare('local_id', $this->local_id);
		$criteria->compare('comentario', $this->comentario, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                    'pagination'=>array('pageSize'=>100),
		));
	}
}