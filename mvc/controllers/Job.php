<?php 
    class Job extends Controller{
        public $JobModel;
        public function __construct()
        {
            $this->JobModel = $this->model('JobModel');
        }

        public function show(){
            $custommer = $this->JobModel->custommer();
            $position = $this->JobModel->position();
            $show = $this->JobModel->showJob();
            $this->view('home', [
                "pages"=>"job",
                "show"=>$show,
                "custommer" => $custommer,
                "position"=> $position
            ]);
        }

        public function addJob(){
            header('Content-Type: application/json');
            // tra ve json tu tap lenh php
            $ngaybonhiem = $_POST['ngaybonhiem'];
            $ngayketthuc = $_POST['ngayketthuc'];
            $id_user = $_POST['hoten'];
            $machucvu = $_POST['chucvu'];
            $add = $this->JobModel->addJob($ngaybonhiem, $ngayketthuc, $id_user, $machucvu);
            if ($add == 'true'){
                $text = true;
            } else {
                $text = false;
            }
            echo json_encode($text);
        }

        public function edit(){
            header('Content-Type: application/json');
            $chucvu = $_REQUEST['role'];
            $id = $_REQUEST['id_hoso'];
            $edit = $this->JobModel->editJob($id, $chucvu);
            echo json_encode($edit);
        }

        public function delete(){
            $id = $_REQUEST['id_hoso'];
            $delete = $this->JobModel->deleteJob($id);
            echo $delete;
        }
    }
?>