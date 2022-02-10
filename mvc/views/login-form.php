<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="./public/images/logo_khoa.png" type="image/x-icon" />
        <link rel="stylesheet" href="./public/css/style.css" />
        <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
        <title>Đăng nhập</title>
    </head>
    <body>
        <div class="container-login" style="width: 100%; height: 100vh; background-image: url('./public/images/background-login-1.jpg'); background-size: cover; background-repeat: no-repeat;">
            <div class="modal-login">
                <div class="login-contains">
                    <div class="login-header">
                        <h3 class="login-title">Đăng nhập</h3>
                    </div>
                    <form class="login-body" action="./Login" method="POST">
                        <div class="login-form">
                            <div class="login-form__input-user">
                                <i class="login-form__user-icon bx bxs-user-circle"></i>
                                <input type="text" class="login-form__input" placeholder="Email" name="taikhoan" />
                            </div>
                            <h3 class="error"><?php echo $data["nameErr"];?></h3>

                            <div class="login-form__input-pw">
                                <i class="login-form__key-icon bx bxs-lock"></i>
                                <input type="password" class="login-form__input" placeholder="Mật khẩu" name="matkhau" />
                            </div>
                            <h3 class="error"><?php echo $data["passErr"];?></h3>
                            <div class="login-form__pw">
                                <div class="login-form__pw--save">
                                    <input type="checkbox" id="save-pw" />
                                    <label for="save-pw" class="save-pw-login__label">Lưu mật khẩu</label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Đăng nhập" onclick="lsRememberMe()" class="btn login-form__btn" />
                    </form>
                    <div class="login-social-btn">
                        <a href="#" class="btn login-social-btn__link login-social-btn__link-facebook">
                            <i class="login-social-btn__icon bx bxl-facebook"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="#" class="btn login-social-btn__link login-social-btn__link-google">
                            <img src="./public/images/google.png" alt="" class="login-social-btn__img" />
                            <span>Google</span>
                        </a>
                    </div>
                    <div class="login-footer">
                        <span class="warning"><?php echo $data["out"];?></span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
