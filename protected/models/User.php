<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function updateUserInfo($user_id, $post) {
        $model = User::model()->findByAttributes(array('id' => $user_id));
        $model->setAttributes($post);
        $model->updated_at = time();
        if ($model->save(FALSE)) {
            return TRUE;
        }
        return FALSE;
    }

    public function processLoginWithFacebook($facebook_id, $age, $gender, $facebook_access_token, $photo, $username, $device_id) {
        $check = User::model()->findByAttributes(array('facebook_id' => $facebook_id));
        if ($check) {
            $check->updated_at = time();
            if ($check->save(FALSE)) {
                Yii::app()->session['user_id'] = $check->id;
                Yii::app()->session['user_avatar'] = $check->photo;
                ResponseHelper::JsonReturnSuccess($check, "Success");
            } else {
                ResponseHelper::JsonReturnError("", "Server Error");
            }
        } else {
            $model = new User;
            $model->facebook_id = $facebook_id;
            $model->age = $age;
            $model->gender = $gender;
            $model->facebook_access_token = $facebook_access_token;
            $model->photo = $photo;
            $model->username = $username;
            $model->device_id = $device_id;
            $model->created_at = time();
            $model->updated_at = time();
            $model->status = 1;
            if ($model->save(FALSE)) {
                Yii::app()->session['user_id'] = $model->id;
                Yii::app()->session['user_avatar'] = $model->photo;
                ResponseHelper::JsonReturnSuccess($model, "Success");
            } else {
                ResponseHelper::JsonReturnError("", "Server Error");
            }
        }
    }

    public function blockUser($user_block, $user_blocked) {
        $model = Relationship::model()->findByAttributes(array('user_id_1' => $user_block, 'user_id_2' => $user_blocked));
        if ($model) {
            return 1;
        } else {
            $rel = new Relationship;
            $rel->user_id_1 = $user_block;
            $rel->user_id_2 = $user_blocked;
            $rel->status = 1;
            $rel->created_at = time();
            $rel->updated_at = time();
            $rel->type = Yii::app()->params['USER_BLOCK'];
            if ($rel->save(FALSE)) {
                return 2;
            } else {
                return 0;
            }
        }
    }

    public function blockPost($user_block, $post_id) {
        $model = UserPostRelationship::model()->findByAttributes(array('user_id' => $user_block, 'post_id' => $post_id));
        if ($model) {
            return 1;
        } else {
            $rel = new UserPostRelationship;
            $rel->user_id = $user_block;
            $rel->post_id = $post_id;
            $rel->created_at = time();
            $rel->updated_at = time();
            $rel->type = Yii::app()->params['USER_BLOCK'];
            if ($rel->save(FALSE)) {
                return 2;
            } else {
                return 0;
            }
        }
    }

    public function rankByTimeApi($time, $limit, $offset) {
        $time = strtoupper($time);

        $criteria = new CDbCriteria;
        if ($time == 'DAY') {
            $time_start = strtotime('-1 day');
        } else if ($time == 'WEEK') {
            $time_start = strtotime('-1 week');
        } else if ($time == 'MONTH') {
            $time_start = strtotime('-1 month');
        }
        $time_end = time();
        $criteria->select = 'COUNT(*) AS count_like';
        $criteria->addBetweenCondition('l.created_at', $time_start, $time_end);
        $criteria->join = 'JOIN tbl_like l ON t.id = l.to';
        $criteria->order = 'count_like DESC';
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $data = User::model()->findAll($criteria);
        return $data;
    }

    public function rankByTimeForWeb($time) {
        $time = strtoupper($time);

        $criteria = new CDbCriteria;
        if ($time == 'DAY') {
            $time_start = strtotime('-1 day');
        } else if ($time == 'WEEK') {
            $time_start = strtotime('-1 week');
        } else if ($time == 'MONTH') {
            $time_start = strtotime('-1 month');
        }
        $time_end = time();
        $criteria->select = 'COUNT(*) AS count_like';
        $criteria->addBetweenCondition('l.created_at', $time_start, $time_end);
        $criteria->join = 'JOIN tbl_like l ON t.id = l.to';
        $criteria->order = 'count_like DESC';
        $data = User::model()->findAll($criteria);
        $count = User::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = Yii::app()->params['RESULT_PER_PAGE'];
        $pages->applyLimit($criteria);
        return array('data' => $data, 'pages' => $pages);
    }

//    public function rankByMonth() {
//        $criteria = new CDbCriteria;
//        $time_start = strtotime('-1 month');
//        $time_end = time();
//        $criteria->select = 'COUNT(*) AS count_like';
//        $criteria->addBetweenCondition('tbl_like.created_at', $time_start, $time_end);
//        $criteria->join = 'JOIN tbl_like ON tbl_user.id = tbl_like.to';
//        $criteria->limit = Yii::app()->params['RESULT_PER_PAGE'];
//        $criteria->order = 'count_like DESC';
//        $data = User::model()->findAll($criteria);
//        return $data;
//    }
//
//    public function rankByWeek() {
//        $criteria = new CDbCriteria;
//        $time_start = strtotime('-1 week');
//        $time_end = time();
//        $criteria->select = 'COUNT(*) AS count_like';
//        $criteria->addBetweenCondition('tbl_like.created_at', $time_start, $time_end);
//        $criteria->join = 'JOIN tbl_like ON tbl_user.id = tbl_like.to';
//        $criteria->limit = Yii::app()->params['RESULT_PER_PAGE'];
//        $criteria->order = 'count_like DESC';
//        $data = User::model()->findAll($criteria);
//        return $data;
//    }

    public function getProfile($user_id) {
        $data = User::model()->findByPk($user_id);
        return $data;
    }

    public function searchByUsername($username, $limit, $offset) {
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->addSearchCondition('username', $username);
        $data = User::model()->findAll($criteria);
        return $data;
    }

}
