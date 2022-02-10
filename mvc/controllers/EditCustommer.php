<?php 
    class EditCustommer extends Controller {
        public $EditCustomer;
        public function __construct()
        {
            $this ->EditCustomer = $this->model("EditCustomerModel");
        }

        public function show(){
            $id = $_GET['pos'];
            $showCustom = $this->EditCustomer->showCustom($id);
            $this->view("home",[
                "pages"=>"editNV",
                "showCustom"=>$showCustom
            ]);
        }

        public function edit(){
            $id = $hoten = $ngaysinh = $gioitinh = $quequan = $sdt = $cmt = $email = $ngayvaolam = $mk = $avatar = "";
            if (isset($_POST['submit'])){
                $id = $_GET['pos'];
                $hoten = $_POST['hoten'];
                $ngaysinh = $_POST['ngaysinh'];
                $gioitinh = $_POST['gioitinh'];
                $quequan = $_POST['quequan'];
                $sdt = $_POST['sdt'];
                $cmt = $_POST['cmt'];
                $email = $_POST['email'];
                $ngayvaolam = $_POST['ngaylam'];
                $mk = $_POST['pw'];
                $mk1 = password_hash($mk, PASSWORD_DEFAULT);
                $mk2 = $_POST['cpw'];
                $mk2 = password_hash($mk2, PASSWORD_DEFAULT);
                $exit = $this->EditCustomer->editCustom($id ,$hoten, $ngaysinh, $gioitinh, $quequan, $sdt, $cmt, $email, $ngayvaolam, $mk1);
                if ($exit == 'true'){
                    header("Location: ../ListCustommer/show");
                }
            }
        }
    }
?>