<?php
class Controller
{
    public function model($model)
    {

        require_once '../app/models/'.$model.'.php';
        return new $model();
        //echo $model;
    }
    public function view($view,$data=[])
    {

        require_once '../app/views/'.$view.'.php';
}

}

?>