<?php 
    class Permission extends Controller{
        public $PermissionModel;
        public function __construct()
        {
            $this->PermissionModel = $this->model('PermissionModel');
        }

        public function show(){
            $showOption = $this->PermissionModel->showOption();
            $showPermission = $this->PermissionModel->showPermission();
            $this->view('home', [
                "pages"=>"permission",
                "showOption"=>$showOption,
                "showPermission"=>$showPermission,
            ]);
        }

        public function checkData(){
            $id_user = $_REQUEST['id_user'];
            $chucvu = $_REQUEST['chucvu'];
            $checkPermission = $this->PermissionModel->checkPermission($id_user);
            if($checkPermission == 'true'){
                $this->PermissionModel->addPermission($id_user, $chucvu);
            } else {
                $this->PermissionModel->editPermission($id_user, $chucvu);
            }
        }

        public function checkUser(){
            $id_user = $_REQUEST['id_user'];
            $activate = $_REQUEST['activate'];
            $exit = $this->PermissionModel->editActivate($id_user, $activate);
        }
    }
?>