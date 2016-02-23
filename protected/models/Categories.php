<?php

Yii::import('application.models._base.BaseCategories');

class Categories extends BaseCategories {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getMaleCategory() {
        $data = Categories::model()->findAllByAttributes(array('type' => 1));
        return $data;
    }

    public function getFemaleCategory() {
        $data = Categories::model()->findAllByAttributes(array('type' => 2));
        return $data;
    }

    public function getOtherCategory() {
        $data = Categories::model()->findAllByAttributes(array('type' => 3));
        return $data;
    }

    public function addCategory($attr) {
        $model = new Categories;
        $model->setAttributes($attr);
        $model->status = 1;
        $model->created_at = time();
        $model->updated_at = time();
        if ($model->save(FALSE)) {
            return TRUE;
        }
        return FALSE;
    }
}
