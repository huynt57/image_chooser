<?php

class ImageController extends Controller {

    public function actionIndex() {
        $storeFolder = Yii::getPathOfAlias('webroot') . '/images/';
        $jsonName = 'data.json';
        $path = $storeFolder . 'aothun_22/' . $jsonName;
        $json = file_get_contents($path);
        $arr = json_decode($json, true);
        $urlImages = array();
        foreach ($arr['data'] as $item) {
            $itemArr = array();
            $itemArr['image_url'] = $item['images']['standard_resolution']['url'];
            $itemArr['image_url_thumbnail'] = $item['images']['thumbnail']['url'];
            $itemArr['caption'] = $item['caption']['text'];
            $itemArr['user_insta_id'] = $item['caption']['from']['id'];
            $itemArr['username'] = $item['caption']['from']['username'];
            $itemArr['fullname'] = $item['caption']['from']['full_name'];
            $itemArr['profile_picture'] = $item['caption']['from']['profile_picture'];
            $urlImages[] = $itemArr;
        }
        $this->render('index', array('data' => $urlImages));
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
