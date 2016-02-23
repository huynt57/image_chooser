<?php

Yii::import('application.models._base.BaseComments');

class Comments extends BaseComments {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function addComment($user_id, $post_id, $content) {
        $model = new Comments;
        $model->post_id = $post_id;
        $model->created_by = $user_id;
        $model->updated_at = time();
        $model->comment_content = $content;
        $model->status = 1;
        $model->created_at = time();
        $model->updated_at = time();

        $post = Posts::model()->findByPk($post_id);
        $post->post_comment_count++;
        $user = User::model()->findByPk($model->created_by);
        if ($model->save(FALSE) && $post->save(FALSE)) {
            $returnArr = array();
            $returnArr['created_by'] = $model->created_by;
            $returnArr['username'] = $user->username;
            $returnArr['photo'] = $user->photo;
            $returnArr['created_at'] = Util::time_elapsed_string($model->created_at);
            $returnArr['comment_content'] = $model->comment_content;
            return $returnArr;
        }
        return FALSE;
    }

    public function getCommentByPost($post_id, $limit, $offset) {

        $sql = "SELECT tbl_comments.*, tbl_user.username, tbl_user.photo FROM tbl_comments JOIN tbl_user ON tbl_comments.created_by = tbl_user.id WHERE tbl_comments.post_id = $post_id ORDER BY tbl_comments.comment_id DESC LIMIT $offset, $limit ";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }

}
