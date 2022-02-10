<?php 
    class Subsidize extends Controller {
        public $SubsidizeModel;
        public function __construct()
        {
            $this->SubsidizeModel = $this->model("SubsidizeModel");
        }

        public function show(){
            // model
            $subsidize = $this->SubsidizeModel-> showSubsidize();
            // view
            $this->view("home", [
                "pages"=>"subsidize",
                "show"=>$subsidize
            ]);
        }

        public function action(){
            header('Content-Type: application/json');
            $input = filter_input_array(INPUT_POST);
            if ($input['action'] === 'edit') {
                $ma = $input['id'];
                $heso = $input['col1'];
                $this->SubsidizeModel-> editSubsidize($ma, $heso);
             } else if ($input['action'] === 'delete') {
                $ma = $input['id'];
                $this->SubsidizeModel->deleteSubsidize($ma);
             } else if ($input['action'] === 'restore') {
                $add = "restore";
             }

            echo json_encode($input);
        }

        public function addSubsidize(){
            header('Content-Type: application/json');
            // tra ve json tu tap lenh php
            $ma = $_POST['ma'];
            $heso = $_POST['heso'];
            $check = $this->SubsidizeModel->checkSubsidize($ma, $heso);
            if ($check == 'true'){
                $this->SubsidizeModel->addSubsidize($ma, $heso);
                $text = true;
            } else {
                $text = false;
            }
            echo json_encode($text);
        }
    }
?>