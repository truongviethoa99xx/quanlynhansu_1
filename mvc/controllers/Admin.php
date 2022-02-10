<?php 
    class Admin extends Controller{
        public $AdminModel;

        public function __construct()
        {
            //model
            $this->AdminModel = $this->model("AdminModel");
        }

        public function show(){
            // model
            $id = $_SESSION['id'];
            $showAll = $this->AdminModel->showAll($id);
            $countCustom = $this->AdminModel->countCustom();
            $OfflineCustom = $this ->AdminModel->countOfflineCustom();
            // view
            $this->view("home", [
                    "show"=>$showAll,
                    "pages"=> "content",
                    "countCustom"=>$countCustom,
                    "OfflineCustom"=>$OfflineCustom

            ]);
        }

        public function showData(){
            // model
            
            // view
            $this->view("home", [
                    "pages"=> "Bonus", 
            ]);
        }
    }
?>




