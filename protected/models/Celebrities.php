<?php

Yii::import('application.models._base.BaseCelebrities');

class Celebrities extends BaseCelebrities {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function recommend($rate_height, $rate_weight, $ref) {

        $criteria = new CDbCriteria;
        $criteria->conditon = "celeb_heigt_rate = $rate_height AND celeb_weight_rate = $rate_weight";
        $celebs = Celebrities::model()->findAll($criteria);
        if ($ref == 'api') {
            $count = Posts::model()->count($celebs);
            $pages = new CPagination($count);
            $pages->pageSize = Yii::app()->params['RESULT_PER_PAGE'];
            $pages->applyLimit($criteria);
        }
        $returnArr = array();
        foreach ($celebs as $celeb) {
            $post_id = Posts::model()->findByAttributes(array('celeb_id' => $celeb->id));
            $returnArr[] = Posts::model()->getPostById($post_id->post_id, Yii::app()->session['user_id']);
        }

        return array('data' => $returnArr, 'pages' => $pages);
    }

}
