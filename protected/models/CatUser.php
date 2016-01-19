<?php

Yii::import('application.models._base.BaseCatUser');

class CatUser extends BaseCatUser
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}