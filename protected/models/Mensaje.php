<?php


Yii::import('application.models._base.BaseMensaje');

class Mensaje extends BaseMensaje
{
        public $fecha_inicio;
        public $fecha_termino;
        
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function rules() {
		return array_merge(parent::rules(), array(
                        array('fecha_inicio, fecha_termino', 'safe', 'on'=>'search'),
		));
	}
	public function attributeLabels() {
		return array_merge(parent::attributeLabels(), array(
                        'user_emisor' => Yii::t('app', 'Emisor'),
			'user_receptor' => Yii::t('app', 'Receptor'),
    			'fecha_inicio' => Yii::t('app', 'fecha_inicio'),
    			'fecha_termino' => Yii::t('app', 'fecha_termino'),
    		));
	}
        
        
	public function todos() {
		
                $criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_emisor', $this->user_emisor);
		$criteria->compare('user_receptor', $this->user_receptor);
		$criteria->compare('fecha', $this->fecha, true);
		$criteria->compare('mensaje', $this->mensaje, true);
		$criteria->compare('estado', $this->estado, true);
                
                $criteria->order="user_emisor, fecha DESC";
                $criteria->group="user_emisor";
                $criteria->condition="user_emisor!=1";
                
                return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
//                $sql = '
//                SELECT
//                    mm.id,
//                    mm.user_emisor,
//                    mm.user_receptor,
//                    mm.fecha,
//                    mm.mensaje,
//                    mm.estado
//                FROM
//                    (
//                    SELECT
//                        m.id,
//                        m.user_emisor,
//                        m.user_receptor,
//                        m.fecha,
//                        m.mensaje,
//                        m.estado
//                    FROM
//                        mensaje m
//                    WHERE
//                        m.user_emisor <> 1
//                    ORDER BY
//                        m.id DESC
//                    ) as mm
//                WHERE
//                    mm.user_emisor <> 1
//                GROUP BY
//                    mm.user_emisor    
//
//                ';
//                $query=Yii::app()->db->createCommand($sql);
//                return new CSqlDataProvider($query, array());

	}
        
        public function scopes() {
            return array(
                    'anteriores'=>array(
                            'order'=>'id ASC',
                            'limit'=>10,
                    ),
                            
            );
    	}
        
        public static function misMensajes($id){
		
		$criteria=new CDbCriteria(array(
			'condition'=>'user_emisor =:user_id or user_receptor =:user_id',
			'order'=>'id DESC',
			'limit'=>5,
			'params'=> array(':user_id' => $id),
			));
                        
			$dataProvider=new CActiveDataProvider('Mensaje',array('criteria'=>$criteria,'pagination'=>false));	
			
			return ($dataProvider);

	}
        
 }
