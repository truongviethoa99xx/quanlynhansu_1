<?php 
    class SalaryBonus extends Controller{
        public $SalaryBonusModel;
        public function __construct()
        {
            $this->SalaryBonusModel = $this->model("SalaryBonusModel");
        }

        public function show(){
            $showSalaryBonus = $this->SalaryBonusModel->showSalaryBonus();
            $showBonus = $this->SalaryBonusModel->showBonus();
            $this->view('home',[
                "pages"=>"salaryBonus",
                "showSalaryBonus"=>$showSalaryBonus,
                "showBonus"=>$showBonus
            ]);
        }

        public function check(){
            $id_user = $_REQUEST['id_user'];
            $ma = $_REQUEST['heso'];
            $date = $_REQUEST['date'];
            $checkSalaryBonus = $this->SalaryBonusModel->checkSalaryBonus($id_user);
            if ($checkSalaryBonus == 'true'){
                $this->SalaryBonusModel->addSalaryBonus($id_user, $ma);
            } else {
                $name = $this->SalaryBonusModel->showName($id_user);
                $ghichu = "$name đã được áp dụng thưởng là $ma vào ngày $date";
                $this->SalaryBonusModel-> editSalaryBonus($id_user, $ma);
                $this->SalaryBonusModel-> addhistory($id_user, $ghichu);
            }
        }

        public function history(){
            $history = $this->SalaryBonusModel->showHistory();
            $this->view('home',[
                "pages"=>"historyBonus",
                "history"=>$history,
            ]);
        }
    }
?>