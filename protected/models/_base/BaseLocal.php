<?php

/**
 * This is the model base class for the table "local".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Local".
 *
 * Columns in table "local" available as properties of the model,
 * followed by relations of table "local" available as properties of the model.
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $ciudad
 * @property string $direccion
 * @property string $telefono
 * @property string $nombre
 *
 * @property User $user
 * @property Recarga[] $recargas
 */
abstract class BaseLocal extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'local';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Local|Locals', $n);
	}

	public static function representingColumn() {
		return 'nombre';
	}

	public function rules() {
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('ciudad, telefono, nombre', 'length', 'max'=>45),
			array('direccion', 'length', 'max'=>100),
			array('user_id, ciudad, direccion, telefono, nombre', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, ciudad, direccion, telefono, nombre', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'recargas' => array(self::HAS_MANY, 'Recarga', 'local_id'),
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
			'ciudad' => Yii::t('app', 'Ciudad'),
			'direccion' => Yii::t('app', 'Direccion'),
			'telefono' => Yii::t('app', 'Telefono'),
			'nombre' => Yii::t('app', 'Nombre'),
			'user' => null,
			'recargas' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('ciudad', $this->ciudad, true);
		$criteria->compare('direccion', $this->direccion, true);
		$criteria->compare('telefono', $this->telefono, true);
		$criteria->compare('nombre', $this->nombre, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
	public function cargarUser()
	{
		$session=Yii::app()->getSession();
		$id_user=$session['_id'];
		return ($id_user);
		
	}
	
	public function cargarLocal()
	{
		$session=Yii::app()->getSession();
		$id_local=$session['_id'];
		return ($id_local);
		
	}
	
	public function cargarLocalesCliente(){
		
			$id_user=$this->cargarUser();
			
			$criteria=new CDbCriteria(array(
				'condition'=>'user_id =:user_id',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(':user_id' => $id_user),
					));
			$model=Local::model()->findAll($criteria);
			$dataProvider=new CActiveDataProvider('Local',array('criteria'=>$criteria,));
			$dataProvider->setPagination(false);		
			
			return ($dataProvider);

	}
	
	public function cargarRecargasLocal($id){
		
			$criteria=new CDbCriteria(array(
				'condition'=>'local_id =:local_id and estado =:estado',
				'order'=>'id DESC',
				'limit'=>500,
				'params'=> array(':local_id' => $id , ':estado'=>'LISTA'),
					));
			$model=Recarga::model()->findAll($criteria);
			$dataProvider=new CActiveDataProvider('Recarga',array('criteria'=>$criteria,));
			$dataProvider->setPagination(false);		
			
			return ($dataProvider);

	}
	
}//finfin