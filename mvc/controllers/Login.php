<?php
class Login extends Controller
{
    public $LoginModel;

    public function __construct()
    {
        //model
        $this->LoginModel = $this->model("LoginModel");
    }

    public function show()
    {
        $user = $warnning = $check = $per_id = $activate = "";
        $emailErr = $passErr = "*Mời điền thông tin";
        $email = $password = "";
        if (isset($_POST["submit"])) {
            function test_input($input)
            {
                $input = trim($input);
                $input = stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
            }
            // Check form
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["taikhoan"])) {
                    $emailErr = "*Chưa nhập tên";
                } else {
                    $email = test_input($_POST["taikhoan"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "*Email sai định dạng";
                    }
                }

                if (empty($_POST["matkhau"])) {
                    $passErr = "*Chưa nhập mật khẩu";
                } else {
                    $password = test_input($_POST["matkhau"]);
                    $password = md5($password);
                }
            }
            // check model
            $login = $this->LoginModel->loginAccount($email, $password);
            $check = $this->LoginModel->selectData($email, $password);
            $check = json_decode($check);
            $relation = $this->LoginModel->relationship($check);
            $per_id = $relation[0];
            $activate = $relation[1];
            if ($login == "false") {
                $warnning = "Sai Email hoặc Mật khẩu";
            } else {
                $_SESSION['id'] = $check;
                $_SESSION['user'] = $email;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + 60 * 60;
                if ($activate == 1) {
                    if ($per_id == 1) {
                        $_SESSION['phanquyen'] = $per_id;
                        $warnning = "quan tri";
                        header('Location: ./Admin/show');
                    } elseif ($per_id == 2) {
                        $_SESSION['phanquyen'] = $per_id;
                        $warnning = "nhan su";
                        header('Location: ./Admin/show');
                    } elseif ($per_id == 3) {
                        $_SESSION['phanquyen'] = $per_id;
                        $warnning = "nhan vien";
                        header('Location: ./Admin/show');
                    } elseif ($per_id == 4) {
                        $_SESSION['phanquyen'] = $per_id;
                        $warnning = "tai vu";
                        header('Location: ./Admin/show');
                    }
                } else {
                    $warnning = "Tài khoản chưa kích hoạt hoặc bị khóa";
                }
            }
        }
        //view
        $this->view("login-form", [
            "nameErr" => $emailErr,
            "passErr" => $passErr,
            "userSS" => $user,
            "password" => $password,
            "out" => $warnning,
            "login" => $activate,
        ]);
    }
} ?>




