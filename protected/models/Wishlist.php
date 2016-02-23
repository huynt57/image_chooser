<?php

Yii::import('application.models._base.BaseWishlist');

class Wishlist extends BaseWishlist {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function addWishList($post_id, $user_id) {
        $check = Wishlist::model()->findByAttributes(array('post_id' => $post_id, 'user_id' => $user_id));
        if ($check) {
            return FALSE;
        } else {
            $model = new Wishlist;
            $model->post_id = $post_id;
            $model->user_id = $user_id;
            $model->status = 1;
            $model->created_at = time();
            $model->updated_at = time();
            if ($model->save(FALSE)) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function getWishListAPI($user_id, $limit, $offset) {
        $returnArr = array();
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->condition = "user_id = $user_id";
        $posts = Wishlist::model()->findAll($criteria);
        if ($posts) {
            foreach ($posts as $post) {
                $itemArr = Posts::model()->getPostById($post->post_id);
                $returnArr[] = $itemArr;
            }
            return $returnArr;
        }
        return FALSE;
    }

    public function getWishListForWeb($user_id) {
        $returnArr = array();
        $criteria = new CDbCriteria;
        $criteria->condition = "user_id = $user_id";
        $count = Posts::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = Yii::app()->params['RESULT_PER_PAGE'];
        $pages->applyLimit($criteria);
        $posts = Wishlist::model()->findAll($criteria);
        if ($posts) {
            foreach ($posts as $post) {
                $itemArr = Posts::model()->getPostById($post->post_id);
                $returnArr[] = $itemArr;
            }
            return array('data' => $returnArr, 'pages' => $pages);
        }
        return FALSE;
    }

}
