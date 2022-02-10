<?php 
    class PayRoll extends Controller{
        public $PayRollModel;

        public function __construct()
        {
            $this->PayRollModel = $this->model("PayRollModel");
        }

        public function show(){
            $showCustom = $this->PayRollModel->showCustom();

            $this->view('home',[
                "pages"=>"payroll",
                "showCustom"=>$showCustom
            ]);
        }

        public function showSalary(){
            $id = $_REQUEST['id_user'];
            $show = $this->PayRollModel->showSalary($id);
            foreach ($show as $key => $value){
                $hesoluong = $value['HeSoLuong'];
                $thuong = $value['TienThuong'];
                $phucap = $value['TienPhuCap'];
            }
            echo '<div class="col-sm-3">
                    <div class="form-group">
                        <label class="col-form-label">Hệ số lương</label>
                        <input disabled name="ngaysinh" class="form-control" type="text" required value="'.$hesoluong.'"/>
                    </div>
                 </div>
                 <div class="col-sm-3">
                    <div class="form-group">
                        <label class="col-form-label">Phụ cấp</label>
                        <input disabled name="ngaysinh" class="form-control" type="text" required value="'.$phucap.'"/>
                    </div>
                 </div>
                 <div class="col-sm-3">
                    <div class="form-group">
                        <label class="col-form-label">Tiền thưởng</label>
                        <input disabled name="ngaylam" class="form-control" type="text" required value="'.$thuong.'"/>
                    </div>
                 </div>';
        }

        public function addPayroll(){
            $maluong = $custom = $ngaycong = $ngaytinhluong = $ungtruoc = $hesoluong = $thuong = $phucap = ""; 
            if(isset($_POST['submit'])){
                $maluong = $_POST['maluong'];
                $custom = $_POST['custom'];
                $ngaycong = $_POST['ngaycong'];
                $ngaytinhluong = $_POST['ngaytinhluong'];
                $ungtruoc = $_POST['ungtruoc'];
                $show = $this->PayRollModel->showSalary($custom);
                foreach ($show as $key => $value){
                $hesoluong = $value['HeSoLuong'];
                $thuong = $value['TienThuong'];
                $phucap = $value['TienPhuCap'];
                }
                $tong = 174000 * $hesoluong * $ngaycong + $thuong + $phucap;
                $thucnhan = $tong - $ungtruoc;
                $save = $this->PayRollModel->addWageTable($maluong, $ngaytinhluong, $custom, $ngaycong, $tong, $thucnhan, $ungtruoc);
                if ($save == 'true'){
                    header("Location: ../BangLuong/show");
                }
            }
        }
    }
?>