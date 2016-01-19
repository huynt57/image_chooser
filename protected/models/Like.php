<?php

Yii::import('application.models._base.BaseLike');

class Like extends BaseLike
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}