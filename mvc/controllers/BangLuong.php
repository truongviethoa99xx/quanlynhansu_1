<?php 
    class BangLuong extends Controller{
        public $BangLuongModel;

        public function __construct()
        {
            $this->BangLuongModel =$this->model('BangLuongModel');
        }

        public function show(){
            $show = $this->BangLuongModel->showBL();
            $this->view("home",[
                "pages"=>"bangluong",
                "show"=>$show
            ]);
        }
    }
?>