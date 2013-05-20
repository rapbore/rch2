<?php

Yii::import('application.models._base.BasePedido');

class Pedido extends BasePedido
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}