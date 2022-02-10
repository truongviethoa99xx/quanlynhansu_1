<!-- Page Header -->

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Danh Sách Nhân Viên</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Hệ Thống</a></li>
                <li class="breadcrumb-item active">Thêm Mới</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="addNV.php" class="btn btn-success"><i class="fa fa-plus"></i>Thêm Mới</a>
            <div class="view-icons">
                <a href="../ShowCustommer/" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                <a href="../ListCustommer/" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->
<!-- Search Filter -->
<form>
    <?php if(isset($data["result"])) { ?>
    <h1>
        <?php 
      if($data["result"]=="true"){
         echo "Đăng Kí Thành Công";
      }
      else{
         echo "Thất Bại";
      }
      ?>
    </h1>
    <?php } ?>
</form>
<!-- Add Employee Modal -->
<div class="modal-body">
    <form action="../Register/ThemNhanVien" method="POST">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Họ và tên <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="HoTen" id="hoten" value="<?php echo $data['hoten'] ?>" />
                    <span class="text-danger"><?php echo $data["nameErr"]; ?></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Giới tính</label>
                    <input class="form-control" type="text" name="GioiTinh" id="gioitinh" value="" />
                    <span class="text-danger"><?php echo $data["genderErr"]; ?></span>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" name="Email" id="email" value="" />
                    <span class="text-danger"><?php echo $data["emailErr"]; ?></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Mật khẩu</label>
                    <input class="form-control" type="password" name="Password" id="password" value="" />
                    <span class="text-danger"><?php echo $data["passErr"]; ?></span>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <label class="col-form-label">Số điện thoại<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="SoDienThoai" id="SoDienThoai" value="" />
                    <span class="text-danger"><?php echo $data["pnErr"]; ?></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Số CMND<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="SoCMT" id="CMND" value="" />
                    <span class="text-danger"><?php echo $data["cmtErr"]; ?></span> 
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Ngày sinh <span class="text-danger">*</span></label>
                    <input class="form-control" type="date" name="NgaySinh" id="date" value="" />
                    <span class="text-danger"><?php echo $data["dateErr"]; ?></span> 
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Quê quán </label>
                    <input class="form-control" type="text" name="QueQuan" id="quequan" value="" />
                    <span class="text-danger"><?php echo $data["addErr"]; ?></span> 
                </div>
            </div>
        </div>
        <div class="submit-section">
            <button class="btn btn-primary submit-btn" type="submit" name="submit" id="submit" value="">Xác nhận</button>
        </div>
    </form>
</div>
