<?php

Yii::import('application.models._base.BaseRelationship');

class Relationship extends BaseRelationship
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}