<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Thông tin cá nhân</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="./Admin">Hệ thống</a></li>
                <li class="breadcrumb-item active">Thông tin</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<!-- Profile -->
<div class="card mb-0">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                <?php 
                    foreach ($data['profile'] as $key =>$value) { 
                    $name = $value['HoTen']; 
                    $permission = $value['name_per']; 
                    $avatar = $value['Avatar']; 
                    $phone = $value['SoDienThoai'];
                    $a = $value['GioiTinh'];
                    $b = $value['TinhTrang'];
                    $email = $value['Email'];
                    $address = $value['QueQuan'];
                    $date = $value['NgaySinh'];
                    $cmnd = $value['SoCMT'];
                    $update = $value['NgayVaoLam'];
                ?>
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <a href="../Profile/show">
                            <?php 
                                if (isset($avatar)){
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($avatar).'" alt= ""/>' ; 
                                } else { 
                                    echo '<img src="../public/images/user.png" alt="" />' ; 
                                } 
                            ?>
                            </a>
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0"><?php echo $name; ?></h3>
                                    <h3 class="text-muted"><?php echo $permission; ?></h3>
                                    <h3 class="text-muted"><?php echo $b;?></h3>
                                    <h4 class="text-muted"><?php echo $cmnd;?></h4>
                                    <h4 class="text-muted">Ngày vào làm: <?php echo $update;?> </h4>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Số Điện Thoại:</div>
                                        <div class="text"><a href=""><?php echo $phone; ?></a></div>
                                    </li>
                                    <li>
                                        <div class="title">Email:</div>
                                        <div class="text"><a href=""><?php echo $email; ?></a></div>
                                    </li>
                                    <li>
                                        <div class="title">Ngày sinh:</div>
                                        <div class="text"><?php echo $date; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Địa Chỉ:</div>
                                        <div class="text"><?php echo $address; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Giới Tính:</div>
                                        <div class="text"><?php 
                                        if($a==1){
                                            echo "Nam";
                                        }
                                        else{
                                            echo "Nữ";
                                        } ?>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pro-edit">
                        <a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Profile Modal --> 
    <?php } ?>
</div>

