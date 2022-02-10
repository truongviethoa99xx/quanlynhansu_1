<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
        <meta name="description" content="Smarthr - Bootstrap Admin Template" />
        <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects" />
        <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
        <meta name="robots" content="noindex, nofollow" />
        <title>QUẢN LÍ NHÂN SỰ</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="../public/images/logo_khoa.png" type="image/x-icon" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../public/css/css/bootstrap.min.css" />

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../public/font/fontawesome-free-5.15.4-web/css/all.css" />
        <link rel="stylesheet" href="../public/css/css/font-awesome.min.css" />

        <!-- Chart CSS -->
        <link rel="stylesheet" href="../public/plugins/morris/morris.css" />

        <!-- Main CSS -->
        <link rel="stylesheet" href="../public/css/css/style.css" />

        <!-- jQuery -->
        <script src="../public/js/jquery-3.5.1.min.js"></script>
        <script src="//code.jquery.com/jquery.min.js"></script>
        <script src="../public/js/jquery.tabledit.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

<!-- PHP -->
<?php
    if(isset($_SESSION['user'])){
        $phanquyen = $_SESSION['phanquyen'];
        $id = $_SESSION['id'];
        $user = $_SESSION['user'];
        $now = time(); // Hàm kiểm tra thời gian tự động đăng xuất
        if ($now > $_SESSION['expire']) 
        {
            session_destroy();
            header('location:../Login');
        } else{ 
            //Starting this else one [else1])
        }
    } else {
        header('location:./Login');
    }
    
?>
<!-- /PHP -->

    <body>
        <!-- Main Wrapper -->
        <div class="main">
            <!-- Header -->
            <div class="header">
                <!-- Logo -->
                <div class="header-left">
                    <a href="../Admin/show" class="logo">
                        <img src="../public/images/logo_khoa.png" width="40" height="40" alt="Logo khoa Fira" />
                    </a>
                </div>
                <!-- /Logo -->

                <a id="toggle_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <div class="page-title-box">
                    <h3>QUẢN TRỊ NHÂN SỰ</h3>
                </div>
                <!-- Header Title -->
                <!-- /Header Title -->
                <!-- Header Menu -->
                <ul class="nav user-menu">
                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img"><img src="../public/images/user.png" alt="" style="border: 1px solid #000;" /> <span class="status online"></span></span>
                            <span><?php echo $user; ?></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.html">Thông tin</a>
                            <a class="dropdown-item" href="settings.html">Cài đặt</a>
                            <a class="dropdown-item" href="../Signout">Đăng Xuất</a>
                        </div>
                    </li>
                </ul>
                <!-- /Header Menu -->

                <!-- Mobile Menu -->
                <div class="dropdown mobile-user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile.html">Thông tin</a>
                        <a class="dropdown-item" href="settings.html">Cài đặt</a>
                        <a class="dropdown-item" href="../Signout">Đăng Xuất</a>
                    </div>
                </div>
                <!-- /Mobile Menu -->
            </div>
        </div>


    