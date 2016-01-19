<?php

/**
 * This is the model base class for the table "tbl_comments".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Comments".
 *
 * Columns in table "tbl_comments" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $comment_id
 * @property string $comment_content
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $status
 * @property integer $post_id
 *
 */
abstract class BaseComments extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_comments';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Comments|Comments', $n);
	}

	public static function representingColumn() {
		return 'comment_content';
	}

	public function rules() {
		return array(
			array('created_at, updated_at, created_by, status, post_id', 'numerical', 'integerOnly'=>true),
			array('comment_content', 'safe'),
			array('comment_content, created_at, updated_at, created_by, status, post_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('comment_id, comment_content, created_at, updated_at, created_by, status, post_id', 'safe', 'on'=>'search'),
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
			'comment_id' => Yii::t('app', 'Comment'),
			'comment_content' => Yii::t('app', 'Comment Content'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'created_by' => Yii::t('app', 'Created By'),
			'status' => Yii::t('app', 'Status'),
			'post_id' => Yii::t('app', 'Post'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('comment_id', $this->comment_id);
		$criteria->compare('comment_content', $this->comment_content, true);
		$criteria->compare('created_at', $this->created_at);
		$criteria->compare('updated_at', $this->updated_at);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('status', $this->status);
		$criteria->compare('post_id', $this->post_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}