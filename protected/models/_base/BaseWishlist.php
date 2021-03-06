<?php

/**
 * This is the model base class for the table "tbl_wishlist".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Wishlist".
 *
 * Columns in table "tbl_wishlist" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $user_id
 *
 */
abstract class BaseWishlist extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_wishlist';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Wishlist|Wishlists', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('post_id, created_at, updated_at, status, user_id', 'numerical', 'integerOnly'=>true),
			array('post_id, created_at, updated_at, status, user_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, post_id, created_at, updated_at, status, user_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'post_id' => Yii::t('app', 'Post'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'status' => Yii::t('app', 'Status'),
			'user_id' => Yii::t('app', 'User'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('post_id', $this->post_id);
		$criteria->compare('created_at', $this->created_at);
		$criteria->compare('updated_at', $this->updated_at);
		$criteria->compare('status', $this->status);
		$criteria->compare('user_id', $this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}