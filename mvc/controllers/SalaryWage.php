<?php 
    class SalaryWage extends Controller{
        public $SalaryWageModel;
        public function __construct()
        {
            $this->SalaryWageModel = $this->model("SalaryWageModel");
        }

        public function show(){
            $showSalaryWage = $this->SalaryWageModel->showSalaryWage();
            $showWage = $this->SalaryWageModel->showWage();
            $this->view('home',[
                "pages"=>"salary",
                "showSalaryWage"=>$showSalaryWage,
                "showWage"=>$showWage
            ]);
        }

        public function check(){
            $id_user = $_REQUEST['id_user'];
            $ma = $_REQUEST['heso'];
            $date = $_REQUEST['date'];
            $checkSalaryWage = $this->SalaryWageModel->checkSalaryWage($id_user);
            if ($checkSalaryWage == 'true'){
                $this->SalaryWageModel->addSalaryWage($id_user, $ma);
            } else {
                $name = $this->SalaryWageModel->showName($id_user);
                $ghichu = "$name đã được thay đổi hệ số lương thành $ma vào ngày $date";
                $this->SalaryWageModel-> editSalaryWage($id_user, $ma);
                $this->SalaryWageModel-> addhistory($id_user, $ghichu);
            }
        }

        public function history(){
            $history = $this->SalaryWageModel->showHistory();
            $this->view('home',[
                "pages"=>"historyWage",
                "history"=>$history,
            ]);
        }
    }
?>