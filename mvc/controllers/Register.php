<?php
class Register extends Controller
{
    public $LoginModel;
    public $AddModel;

    public function __construct()
    {
        $this->LoginModel = $this->model("LoginModel");
        $this->AddModel = $this->model("AddModel");
    }

    public function show()
    {
        $HoTen = $Email = $GioiTinh = $SoDienThoai = $SoCMT = $NgaySinh = $QueQuan = $Password = NULL;
        $HoTenErr = $EmailErr = $GioiTinhErr = $PasswordErr = $pnErr = $cmtErr = $NgaySinhErr = $QueQuanErr = "";
        if (isset($_POST["submit"])) {
            function test_input($input)
            {
                $input = trim($input);
                $input = stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
            }
            // Check Name
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $HoTen = $_POST["HoTen"];
                if (empty($_POST["HoTen"])) {
                    $HoTenErr = "*Chưa nhập họ tên";
                } else {
                    if (!preg_match("/^[a-zA-Z-' ]*$/", $HoTen)) {
                        $HoTenErr = "*Chỉ cho phép các chữ cái và khoảng trắng";
                    }
                    else {
                        $HoTen = test_input($_POST["HoTen"]);
                    }
                }
            }
            // Check Gender
            $GioiTinh = $_POST["GioiTinh"];
            if (empty($_POST["GioiTinh"])) {
                $GioiTinhErr = "*Chưa chọn giới tính";
            } else {
                $GioiTinh = test_input($_POST["GioiTinh"]);
            }
            // Check Email
            $Email = $_POST["Email"];
            if (empty($_POST["Email"])) {
                $EmailErr = "*Bạn chưa nhập email";
            } else {
                $email = test_input($_POST["Email"]);
                if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    $EmailErr = "*Email không hợp lệ";
                }
            }
            // Check Password
            $Password = $_POST["Password"];
            if (empty($_POST["Password"])) {
                $PasswordErr = "*Bạn chưa nhập mật khẩu";
            } else {
                if(strlen($Password) < 8){
                    $PasswordErr = "*Mật khẩu phải có ít nhất 8 ký tự";
                }
                else {
                    $Password = md5($Password);
                }
            }
            // Check phone number
            $SoDienThoai = $_POST["SoDienThoai"];
            if (empty($_POST["SoDienThoai"])) {
                $pnErr = "*Bạn chưa nhập số điện thoại";
            } 
            else {
                if (!preg_match("/^[0-9]*$/", $SoDienThoai)) {
                    $pnErr = "*Chỉ cho phép các chữ số";
                } 
                else if (strlen($SoDienThoai) < 10) {
                    $pnErr = "*Số điện thoại phải có 10 số";
                }
                else {
                    $SoDienThoai = test_input($_POST["SoDienThoai"]);
                }
            }
            // Check CMT
            $SoCMT = $_POST["SoCMT"];
            if (empty($_POST["SoCMT"])) {
                $cmtErr = "*Bạn chưa nhập số chứng minh thư";
            } 
            else {
                if (!preg_match("/^[0-9]*$/", $SoCMT)) {
                    $cmtErr = "*Chỉ cho phép các chữ số";
                } 
                else if (strlen($SoCMT) < 9) {
                    $cmtErr = "*Số chứng minh phải có 9 số";
                }
                else {
                    $SoCMT = test_input($_POST["SoCMT"]);
                }
            }
            // Check birthday
            $NgaySinh = $_POST["NgaySinh"];
            $today = date("Y-m-d");
            if (empty($_POST["NgaySinh"])) {
                $NgaySinhErr = "*Bạn chưa nhập ngày sinh";
            } 
            else if (strtotime($today) <= strtotime($NgaySinh)) {
                $NgaySinhErr = "*Ngày sinh không hợp lệ";
            }
            else {
                $NgaySinh = test_input($_POST["NgaySinh"]);
            }
            // Check address
            $QueQuan = $_POST["QueQuan"];
            if (empty($_POST["QueQuan"])) {
                $QueQuanErr = "*Bạn chưa nhập quê quán";
            } else {
                $QueQuan = test_input($_POST["QueQuan"]);
            }
            // insert data
            //$kq = $this->AddModel->AddNhanVien($hoten, $password, $email, $gioitinh, $phone, $CMND, $date, $quequan);
            $kq = $this->AddModel->AddNhanvien($HoTen, $Password, $Email, $NgaySinh, $QueQuan, $SoCMT, $SoDienThoai, $GioiTinh);
            //$checkName =$this->AddModel->checkName($HoTen);
            if ($kq == true) {
                echo "<script>alert('Đăng ký thành công');</script>";
            }
            else {
                echo "<script>alert('Đăng ký thất bại');</script>";
            }
            // show KQ
        }
        $this->view("home", [
            "sv" => $this->LoginModel->SinhVien(),
            "pages" => "addNV",
            "nameErr" => $HoTenErr,
            "genderErr" => $GioiTinhErr,
            "emailErr" => $EmailErr,
            "passErr" => $PasswordErr,
            "pnErr" => $pnErr,
            "cmtErr" => $cmtErr,
            "dateErr" => $NgaySinhErr,
            "addErr" => $QueQuanErr,
            "hoten" => $HoTen,
            "gioitinh" => $GioiTinh,
            "email" => $Email,
            "password" => $Password,
            "phone" => $SoDienThoai,
            "cmt" => $SoCMT,
            "date" => $NgaySinh,
            "add" => $QueQuan
        ]);
    }
} ?>




