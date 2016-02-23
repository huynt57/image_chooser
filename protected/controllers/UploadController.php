<?php

class UploadController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionAddImage() {
        $request = Yii::app()->request;
        try {
            $post_content = StringHelper::filterString($request->getPost('post_content'));
            $user_id = StringHelper::filterString($request->getPost('user_id'));
            $location = StringHelper::filterString($request->getPost('location'));
            $cats_arr = StringHelper::filterArrayString($request->getPost('cats'));
            $cats = json_encode($cats_arr);
            $url = Yii::app()->request->getUrlReferrer();
            //   $url_arr = NULL;
            $url_arr = UploadHelper::getUrlUploadMultiImages($_FILES['images'], $user_id);
            // $album = StringHelper::filterString($request->getPost('album'));
            $album = NULL;
            if (Posts::model()->addPost($user_id, $post_content, $location, $url_arr, $album, $cats)) {
                $this->redirect($url);
            } else {
                $this->redirect($url);
            }
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
