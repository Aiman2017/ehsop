<?php
defined('ROOTPATH') OR die(http_response_code(404));

//main controller
class Controller
{
    //display the views
    public function view($path, $data = [])
    {
        extract($data);
        //views file
        $filename = "../app/views/" . THEME . $path . ".view.php";
        if (file_exists($filename)) {
            require_once $filename;
        }
    }

    public function loadModel($model)
    {
        $filename = "../app/models/" . strtolower($model) . ".model.php";
        if (file_exists($filename)) {
            require_once $filename;
            return new $model();
        }
        return false;
    }
}