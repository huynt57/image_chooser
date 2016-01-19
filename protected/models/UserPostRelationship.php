<?php

Yii::import('application.models._base.BaseUserPostRelationship');

class UserPostRelationship extends BaseUserPostRelationship
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}