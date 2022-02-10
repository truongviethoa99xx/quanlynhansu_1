<?php 
    class ShowCustommer extends Controller{
        public $ShowNVModel;

        public function __construct()
        {
            //model
            $this->ShowNVModel = $this->model("ShowNVModel");
        }

        public function show(){
            $showCV = $this->ShowNVModel->relationship();
            // $name = $showData['HoTen'];
            $this->view("home", [
                    "showcv"=>$showCV,
                    "pages"=> "listNV",
            ]);
        }
    }
?>




