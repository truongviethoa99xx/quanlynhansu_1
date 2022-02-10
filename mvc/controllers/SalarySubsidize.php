<?php 
    class SalarySubsidize extends Controller{
        public $SalarySubsidizeModel;
        public function __construct()
        {
            $this->SalarySubsidizeModel = $this->model("SalarySubsidizeModel");
        }

        public function show(){
            $showSalarySubsidize = $this->SalarySubsidizeModel->showSalarySubsidize();
            $showSubsidize = $this->SalarySubsidizeModel->showSubsidize();
            $this->view('home',[
                "pages"=>"salarySubsidize",
                "showSalarySubsidize"=>$showSalarySubsidize,
                "showSubsidize"=>$showSubsidize
            ]);
        }

        public function check(){
            $id_user = $_REQUEST['id_user'];
            $ma = $_REQUEST['heso'];
            $date = $_REQUEST['date'];
            $checkSalarySubsidize = $this->SalarySubsidizeModel->checkSalarySubsidize($id_user);
            if ($checkSalarySubsidize == 'true'){
                $this->SalarySubsidizeModel->addSalarySubsidize($id_user, $ma);
            } else {
                $name = $this->SalarySubsidizeModel->showName($id_user);
                $ghichu = "$name đã được hỗ trợ phụ cấp là $ma vào ngày $date";
                $this->SalarySubsidizeModel-> editSalarySubsidize($id_user, $ma);
                $this->SalarySubsidizeModel-> addhistory($id_user, $ghichu);
            }
        }

        public function history(){
            $history = $this->SalarySubsidizeModel->showHistory();
            $this->view('home',[
                "pages"=>"historySubsidize",
                "history"=>$history,
            ]);
        }
    }
?>