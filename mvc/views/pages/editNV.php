<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Danh Sách Nhân Viên</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../Admin/show">Hệ Thống</a></li>

                <li class="breadcrumb-item active">Chỉnh sửa</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <div class="view-icons">
                <a href="../ShowCustommer/show" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                <a href="../ListCustommer/show" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->

<!-- Edit Modal -->
<?php 
    foreach ($data['showCustom'] as $key => $value){

    }
?>
<div class="modal-body">
    <form method="POST" action="../EditCustommer/edit&pos=<?php echo $_GET['pos']; ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Họ tên<span class="text-danger">*</span></label>
                    <input name="hoten" class="form-control" type="text" required value="<?php echo $value['HoTen']; ?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Ngày sinh</label>
                    <input name="ngaysinh" class="form-control" type="date" required value="<?php echo date('Y-m-d',strtotime($value["NgaySinh"]))?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Giới tính</label>
                            <select name = "gioitinh" class="form-control">
                                <option  style="background-color:coral; color:cornsilk;" value="<?php $value['GioiTinh'] ?>">
                                    <?php 
                                        if($value['GioiTinh'] == 0){
                                            echo "Nữ"; 
                                        } else {
                                            echo "Nam";
                                        }
                                    ?>
                                </option>
                                <option value="0">Nữ</option>
                                <option value="1">Nam</option>
                            </select>
                    </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Quê quán <span class="text-danger">*</span></label>
                    <input name="quequan" class="form-control" type="text" required value="<?php echo $value['QueQuan']; ?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Số điện thoại</label>
                    <input name="sdt" class="form-control" type="text" required value="<?php echo $value['SoDienThoai']; ?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Số chứng minh thư</label>
                    <input name="cmt" class="form-control" type="text" required value="<?php echo $value['SoCMT']; ?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                    <input name="email" type="email" class="form-control" required value="<?php echo $value['Email']; ?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Ngày vào làm </label>
                    <input name="ngaylam" class="form-control" type="date" required value="<?php echo $value['NgayVaoLam']; ?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Password <span class="text-danger">*</span></label>
                    <input name="pw" class="form-control" type="password" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Confirm password <span class="text-danger">*</span></label>
                    <input name="cpw" class="form-control" type="password" required/>
                </div>
            </div>
        </div>

        <div class="submit-section">
            <button name="submit" class="btn btn-primary submit-btn">Sửa đổi</button>
        </div>
    </form>
</div>
