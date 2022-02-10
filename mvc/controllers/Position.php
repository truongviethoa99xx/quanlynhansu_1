<?php 
    class Position extends Controller{
        public $PositionModel;

        public function __construct()
        {
            $this->PositionModel = $this->model('PositionModel');
        }

        public function show() {
            // model
            $showPosition = $this->PositionModel->showPosition();

            // view
            $this->view("home", [
                "pages"=>"position",
                "show"=>$showPosition
            ]);
        }

        public function action(){
            header('Content-Type: application/json');
            $input = filter_input_array(INPUT_POST);
            if ($input['action'] === 'edit') {
                $ma = $input['id'];
                $ten = $input['col1'];
                $this->PositionModel-> editPosition($ma, $ten);
             } else if ($input['action'] === 'delete') {
                $ma = $input['id'];
                $this->PositionModel->deletePosition($ma);
             } else if ($input['action'] === 'restore') {
                $add = "restore";
             }

            echo json_encode($input);
        }

        public function addPosition(){
            header('Content-Type: application/json');
            // tra ve json tu tap lenh php
            $ma = $_POST['ma'];
            $ten = $_POST['ten'];
            $check = $this->PositionModel->checkPosition($ma, $ten);
            if ($check == 'true'){
                $this->PositionModel->addPosition($ma, $ten);
                $text = true;
            } else {
                $text = false;
            }
            echo json_encode($text);
        }
    }
?>