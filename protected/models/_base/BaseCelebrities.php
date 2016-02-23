<?php

/**
 * This is the model base class for the table "tbl_celebrities".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Celebrities".
 *
 * Columns in table "tbl_celebrities" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $celeb_name
 * @property string $celeb_height
 * @property string $celeb_weight
 * @property string $celeb_v1
 * @property string $celeb_v2
 * @property string $celeb_v3
 * @property string $celeb_ibm
 * @property string $celeb_height_rate
 * @property string $celeb_weight_rate
 * @property integer $celeb_age
 * @property string $celeb_image
 * @property string $celeb_profile
 * @property string $celeb_image_cover
 * @property string $celeb_instagram
 * @property string $celeb_facebook
 *
 */
abstract class BaseCelebrities extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_celebrities';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Celebrities|Celebrities', $n);
	}

	public static function representingColumn() {
		return 'celeb_name';
	}

	public function rules() {
		return array(
			array('celeb_age', 'numerical', 'integerOnly'=>true),
			array('celeb_name, celeb_height, celeb_weight, celeb_v1, celeb_v2, celeb_v3, celeb_ibm, celeb_height_rate, celeb_weight_rate, celeb_image, celeb_image_cover', 'length', 'max'=>255),
			array('celeb_profile, celeb_instagram, celeb_facebook', 'safe'),
			array('celeb_name, celeb_height, celeb_weight, celeb_v1, celeb_v2, celeb_v3, celeb_ibm, celeb_height_rate, celeb_weight_rate, celeb_age, celeb_image, celeb_profile, celeb_image_cover, celeb_instagram, celeb_facebook', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, celeb_name, celeb_height, celeb_weight, celeb_v1, celeb_v2, celeb_v3, celeb_ibm, celeb_height_rate, celeb_weight_rate, celeb_age, celeb_image, celeb_profile, celeb_image_cover, celeb_instagram, celeb_facebook', 'safe', 'on'=>'search'),
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
			'celeb_name' => Yii::t('app', 'Celeb Name'),
			'celeb_height' => Yii::t('app', 'Celeb Height'),
			'celeb_weight' => Yii::t('app', 'Celeb Weight'),
			'celeb_v1' => Yii::t('app', 'Celeb V1'),
			'celeb_v2' => Yii::t('app', 'Celeb V2'),
			'celeb_v3' => Yii::t('app', 'Celeb V3'),
			'celeb_ibm' => Yii::t('app', 'Celeb Ibm'),
			'celeb_height_rate' => Yii::t('app', 'Celeb Height Rate'),
			'celeb_weight_rate' => Yii::t('app', 'Celeb Weight Rate'),
			'celeb_age' => Yii::t('app', 'Celeb Age'),
			'celeb_image' => Yii::t('app', 'Celeb Image'),
			'celeb_profile' => Yii::t('app', 'Celeb Profile'),
			'celeb_image_cover' => Yii::t('app', 'Celeb Image Cover'),
			'celeb_instagram' => Yii::t('app', 'Celeb Instagram'),
			'celeb_facebook' => Yii::t('app', 'Celeb Facebook'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('celeb_name', $this->celeb_name, true);
		$criteria->compare('celeb_height', $this->celeb_height, true);
		$criteria->compare('celeb_weight', $this->celeb_weight, true);
		$criteria->compare('celeb_v1', $this->celeb_v1, true);
		$criteria->compare('celeb_v2', $this->celeb_v2, true);
		$criteria->compare('celeb_v3', $this->celeb_v3, true);
		$criteria->compare('celeb_ibm', $this->celeb_ibm, true);
		$criteria->compare('celeb_height_rate', $this->celeb_height_rate, true);
		$criteria->compare('celeb_weight_rate', $this->celeb_weight_rate, true);
		$criteria->compare('celeb_age', $this->celeb_age);
		$criteria->compare('celeb_image', $this->celeb_image, true);
		$criteria->compare('celeb_profile', $this->celeb_profile, true);
		$criteria->compare('celeb_image_cover', $this->celeb_image_cover, true);
		$criteria->compare('celeb_instagram', $this->celeb_instagram, true);
		$criteria->compare('celeb_facebook', $this->celeb_facebook, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}