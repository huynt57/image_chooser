<?php

class ResponseHelper {

    public static function JsonReturnSuccess($data, $message) {
        header('Content-type: application/json');
        echo CJSON::encode(array('status' => 1, 'data' => $data, 'message' => $message));
    }

    public static function JsonReturnError($data, $message) {
        header('Content-type: application/json');
        echo CJSON::encode(array('status' => 0, 'data' => $data, 'message' => $message));
    }

}
