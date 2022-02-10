<?php
    class Wage extends Controller{
        public $WageModel;
        public function __construct( )
        {
            $this->WageModel = $this->model('WageModel');
        }

        public function show(){
            // model
            $wage = $this->WageModel->showWage();
            // view
            $this->view("home", [
                "pages"=>"wage",
                "show"=>$wage,
            ]);
        }

        public function action(){
            header('Content-Type: application/json');
            $input = filter_input_array(INPUT_POST);
            if ($input['action'] === 'edit') {
                $ma = $input['id'];
                $heso = $input['col1'];
                $edit = $this->WageModel-> editWage($ma, $heso);
             } else if ($input['action'] === 'delete') {
                $ma = $input['id'];
                $add = $this->WageModel->deleteWage($ma);
             } else if ($input['action'] === 'restore') {
                $add = "restore";
             }
            // $err = $this->WageModel->checkWage($ma, $heso);

            echo json_encode($input);
        }

        public function addWage(){
            header('Content-Type: application/json');
            $ma = $_POST['ma'];
            $heso = $_POST['heso'];
            $check = $this->WageModel->checkWage($ma, $heso);
            if ($check == 'true'){
                $this->WageModel->addWage($ma, $heso);
                $text = true;
            } else {
                $text = false;
            }
            echo json_encode($text);
        }
    }

?>