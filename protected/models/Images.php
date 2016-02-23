<?php

Yii::import('application.models._base.BaseImages');

class Images extends BaseImages {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getImagePreviewByPostId($post_id) {
        $criteria = new CDbCriteria;
        $criteria->limit = 1;
        $criteria->condition = "post_id = $post_id";
        $data = Images::model()->find($criteria);
        if ($data) {
            $url = $data->img_url;    
            return StringHelper::generateUrlImage($url);//Yii::app()->request->getBaseUrl(true) . '/' . $url;
        } else {
            return '';
        }
    }

}
