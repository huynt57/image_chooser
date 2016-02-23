<?php

Yii::import('application.models._base.BaseNotifications');

class Notifications extends BaseNotifications
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function getNotification($user_id, $limit, $offset)
        {
            $criteria = new CDbCriteria;
            $criteria->limit = $limit;
            $criteria->offset = $offset;
            $criteria->condition = "user_id = $user_id";
            
            return $data = Notifications::model()->findAll($criteria);
        }
}