<?php

Yii::import('application.models._base.BaseCatPost');

class CatPost extends BaseCatPost
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}