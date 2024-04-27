<?php

class BaseController {
    const VIEW_FOLDER_NAME = 'Views';

    const MODEL_FOLDER_NAME = 'Models';

    protected function view($path, array $data = []){
        foreach($data as $key => $value) {
            $$key = $value;
        }
        // echo '<pre>';
        // print_r($students);
        // die;
        $path = self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $path).".php";
        // die($path);
        return require ($path);
    }

    protected function loadModel($modelPath) {
        $path = self::MODEL_FOLDER_NAME . '/' . $modelPath .".php";
        // die($path);
        return require ($path);
    }
}