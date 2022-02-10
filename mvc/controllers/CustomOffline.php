<?php 
    class CustomOffline extends Controller{
        public $OfflineModel;

        public function __construct()
        {
            $this->OfflineModel = $this->model('OfflineModel');
        }

        public function show(){
            $offline = $this->OfflineModel->showOffline();
            $showCustom = $this->OfflineModel->showCustom();
            $this->view('home',[
                "pages"=>"offlineCT",
                "show"=>$offline,
                "showCustom"=>$showCustom
            ]);
        }

        public function action(){
            header('Content-Type: application/json');
            $input = filter_input_array(INPUT_POST);
            if ($input['action'] === 'edit') {
                $id = $input['id'];
                var_dump($id);
                return;
                $batdau = $input['col1'];
                $ketthuc = $input['col2'];
                $lydo = $input['col3'];
                $this->OfflineModel-> editOffline($id, $batdau, $ketthuc, $lydo);
             } else if ($input['action'] === 'delete') {
                $id = $input['id'];
                $this->OfflineModel->deleteOffline($id);
             } else if ($input['action'] === 'restore') {
                $add = "restore";
             }
            // $err = $this->OfflineModel->checkOffline($ma, $heso);

            echo json_encode($input);
        }

        public function addOffline(){
            header('Content-Type: application/json');
            $ma = $_REQUEST['ma'];
            $batdau = $_REQUEST['batdau'];
            $ketthuc = $_REQUEST['ketthuc'];
            $lydo = $_REQUEST['lydo'];
            var_dump($ma);
            return;
            $check = $this->OfflineModel->checkOffline($ma);
            if ($check == 'true'){
                $this->OfflineModel->addOffline($ma, $batdau, $ketthuc, $lydo);
                $text = true;
            } else {
                $text = false;
            }
            echo json_encode($text);
        }
    }
?>