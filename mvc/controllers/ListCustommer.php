<?php 
    class ListCustommer extends Controller{
        public $ListNVModel;

        public function __construct()
        {
            //model
            $this->ListNVModel = $this->model("ListNVModel");
        }

        public function show(){
            $showCV = $this->ListNVModel->relationship();

            $this->view("home", [
                    "showcv"=>$showCV,
                    "pages"=> "listNVs",
            ]);
            
        }

        public function edit() {
            $id = $_REQUEST['id_user'];
            $role = $_REQUEST['activate'];
            $editActivate = $this->ListNVModel->editActivate($id, $role);

            echo json_encode([
                "editActivate" => $editActivate
            ]);
        }
    }
?>




