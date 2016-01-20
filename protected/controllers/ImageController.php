<?php

class ImageController extends Controller {

    public $layout;
    public $layoutPath;

    public function getJSONdata($shop_id) {
        $shops = Util::getShop();
        $shop_name = $shops[$shop_id];
        $storeFolder = Yii::getPathOfAlias('webroot') . '/images/';
        $jsonName = 'data.json';
        $path = $storeFolder . $shop_name . '/' . $jsonName;
        $json = file_get_contents($path);
        return $json;
    }

    public function actionIndex() {
        $shop_id = Yii::app()->request->getQuery('shop');
        $json = $this->getJSONdata($shop_id);
        $arr = json_decode($json, true);
        $urlImages = array();
        foreach ($arr['data'] as $item) {
            $itemArr['shop_id'] = $shop_id;
            $itemArr['id'] = $item['id'];
            $itemArr['image_standard_url'] = $item['images']['standard_resolution']['url'];
            $itemArr['image_url'] = $item['images']['low_resolution']['url'];
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

    public function actionUpdate() {
        $this->layoutPath = Yii::getPathOfAlias('webroot') . "/themes/classic/views/layouts";
        $this->layout = 'main_modal';
        $id = Yii::app()->request->getQuery('id');
        $shop_id = Yii::app()->request->getQuery('shop_id');
        $json = $this->getJSONdata($shop_id);
        $arr = json_decode($json, true);
        array_search($id, $arr);
        $this->render('update', array('data' => $data));
    }

    public function actionInsert() {
        if (isset($_POST['choose'])) {
            $post = new Posts;
            $post->status = 0;
            $post->updated_at = time();
            $post->created_at = time();
            $post->user_id = 1;
            $post->post_content = $_POST['caption'];
            $post->save(FALSE);
            $image = new Images;
            $image->created_at = time();
            $image->updated_at = time();
            $image->post_id = $post->post_id;
            $image->created_by = 1;
            $image->img_url = $_POST['image_standard_url'];
            $image->status = 0;
            $image->save(FALSE);
        }
        echo CJSON::encode(array('message' => 'success'));
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
