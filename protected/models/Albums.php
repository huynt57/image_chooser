<?php

Yii::import('application.models._base.BaseAlbums');

class Albums extends BaseAlbums
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}