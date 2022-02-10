<?php 
    class Bonus extends Controller {
        public $BonusModel;
        public function __construct()
        {
            $this->BonusModel = $this->model("BonusModel");
        }

        public function show(){
            // model
            $bonus = $this->BonusModel-> showBonus();
            // view
            $this->view("home", [
                "pages"=>"bonus",
                "show"=>$bonus
            ]);
        }

        public function action(){
            header('Content-Type: application/json');
            $input = filter_input_array(INPUT_POST);
            if ($input['action'] === 'edit') {
                $ma = $input['id'];
                $heso = $input['col1'];
                $this->BonusModel-> editBonus($ma, $heso);
             } else if ($input['action'] === 'delete') {
                $ma = $input['id'];
                $this->BonusModel->deleteBonus($ma);
             } else if ($input['action'] === 'restore') {
                $add = "restore";
             }

            echo json_encode($input);
        }

        public function addBonus(){
            header('Content-Type: application/json');
            // tra ve json tu tap lenh php
            $ma = $_POST['ma'];
            $heso = $_POST['heso'];
            $check = $this->BonusModel->checkBonus($ma, $heso);
            if ($check == 'true'){
                $this->BonusModel->addBonus($ma, $heso);
                $text = true;
            } else {
                $text = false;
            }
            echo json_encode($text);
        }
    }
?>