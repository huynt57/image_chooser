<?php

Yii::import('application.models._base.BaseCatPost');

class CatPost extends BaseCatPost {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPostByCategory($cat_id, $limit, $offset) {
        $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('tbl_posts p')
                ->join('tbl_cat_post c', 'p.post_id=c.post_id')
                ->where('cat_id=:cat_id', array(':cat_id' => $cat_id))
                ->limit($limit)
                ->offset($offset)
                ->order('post_id DESC')
                ->queryAll();
        return $data;
    }

}
