<?php

Yii::import('application.models._base.BaseNotifications');

class Notifications extends BaseNotifications
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}