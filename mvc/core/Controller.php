<?php
    // Viet ham de goi model va view
    class Controller{
        // Ham goi den model
        public function model($model){
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }
        // Ham goi den view
        public function view($view, $data=[]){
            require_once "./mvc/views/".$view.".php";
        }

    }
?>