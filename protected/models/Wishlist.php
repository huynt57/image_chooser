<?php

Yii::import('application.models._base.BaseWishlist');

class Wishlist extends BaseWishlist
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}