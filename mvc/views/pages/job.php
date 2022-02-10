<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Chức Vụ</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../Admin/show">Hệ thống</a></li>
                <li class="breadcrumb-item active">Phân chức vụ</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
		<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_ticket"><i class="fa fa-plus"></i> Phong chức vụ </a>
	</div>
    </div>
</div>
<!-- /Page Header -->

<!-- Search Filter -->
 
<!-- /Search Filter -->

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="my-table" class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Ngày bổ nhiệm</th>
                        <th>Ngày ngưng chức vụ</th>
                        <th class="text-center">Chức vụ hiện tại</th>
                        <th class="text-right no-sort">Xóa</th>
                    </tr>
                </thead>
                <tbody>
					<?php 
						foreach ($data['show'] as $key => $value){
                            $id = $value['id_hoso'];
							$avatar = $value['Avatar'];
							$hoten = $value['HoTen'];
							$ngaybonhiem = $value['NgayBoNhiem'];
							$ngayketthuc = $value['NgayKetThucBoNhiem'];
							$chucvu = $value['TenChucVu'];
					?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td>
                            <h2 class="table-avatar">
                                <a class="avatar avatar-xs" href="../Profile/show"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($avatar).'" alt= ""/>' ; ?></a>
                                <a href="../Profile/show"><?php echo $hoten; ?></a>
                            </h2>
                        </td>
                        <td><?php echo $ngaybonhiem; ?></td>
                        <td><?php echo $ngayketthuc; ?></td>
                        <td class="text-center">
                            <div class="dropdown action-label">
                                <select class="custom-select mr-sm-2" id="activate" data-hoso-id="<?php echo $id; ?>">
                                    <option selected disabled style="color: #fff; background: orange;">
                                    <?php echo $chucvu; ?>
                                    </option>
                                    <?php 
                                        foreach ($data['position'] as $key => $value ){
                                            $positionID = $value['MaChucVu'];
                                            $positionName = $value['TenChucVu'];
                                    ?>
                                    <option value="<?php echo $positionID; ?>"><?php echo $positionName; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                        <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a id="delete_btn" class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee" data-hoso-id="<?php echo $id; ?>" ><i class="fa fa-trash-o m-r-5"></i>Xóa</a>
                                    </div>
                                </div>
                            </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- Add Ticket Modal -->
<div id="add_ticket" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Phong chức vụ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ngày bổ nhiệm</label>
                                <input id="ngaybonhiem" class="form-control" type="date" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ngày hết nhiệm kỳ</label>
                                <input id="ngayketthuc" class="form-control" type="date" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Danh sách nhân viên</label>
                                <select id="hoten">
                                    <option value="">--Chọn--</option>
                                    <?php 
                                        foreach($data['custommer'] as $key => $value){
                                            $id = $value['id_user'];
                                            $name = $value['HoTen'];
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <select id="chucvu">
                                    <option value="">--Chọn--</option>
                                    <?php 
                                        foreach ($data['position'] as $key => $value ){
                                            $positionID = $value['MaChucVu'];
                                            $positionName = $value['TenChucVu'];
                                    ?>
                                    <option value="<?php echo $positionID; ?>"><?php echo $positionName; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="submit-section">
                        <button id="btn_add" name="btn_add" class="btn btn-primary submit-btn">Đồng ý</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Ticket Modal -->
<script >
$(document).ready(function () {
    $(document).on("change", "#activate", function (event) {
        let hosoId = $(this).data('hoso-id');
        let roleId = $(this).val();
        $.ajax({
            url: "../Job/edit",
            method: "POST",
            data: {
                id_hoso: hosoId,
                role: roleId,
            },
            dataType: "text",
            success: function (res) {
                console.log(res);
            },
        });
    });

    $(document).on("click", "#delete_btn", function () {
        let hosoId = $(this).data('hoso-id');
        $.ajax({
            url: "../Job/delete",
            method: "POST",
            data: {
                id_hoso: hosoId,
            },
            dataType: "text",
            success: function (data) {
                contentType: 'application/json';
                if (data == 'true') {
                    window.location="../Job/show";
                } else {
                    alert("Xóa thất bại");
                    window.location="../Job/show";
                }
            },
        });
    });

    $(document).on("click", "#btn_add", function () {
        var ngaybonhiem = $("#ngaybonhiem").val();
        console.log(ngaybonhiem);
        var ngayketthuc = $("#ngayketthuc").val();
        console.log(ngayketthuc);
        var hoten = $("#hoten").val();
        console.log(hoten);
        var chucvu = $("#chucvu").val();
        console.log(chucvu);

        if (ngaybonhiem == "") {
            alert("Nhập ngày bổ nhiệm");
            return false;
        }
        if (ngayketthuc == "") {
            alert("Nhập ngày hết nhiệm kỳ");
            return false;
        }
        if (hoten == "") {
            alert("Chọn họ tên");
            return false;
        }
        if (chucvu == "") {
            alert("Chọn chức vụ");
            return false;
        }
        $.ajax({
            url: "../Job/addJob",
            method: "POST",
            data: { ngaybonhiem: ngaybonhiem, ngayketthuc: ngayketthuc, hoten: hoten, chucvu: chucvu },
            dataType: "text",
            success: function (data) {
                if (data == "true") {
                    alert("Thêm thành công");
                } else {
                    alert("Thêm thất bại");
                }
            },
        });
    });
});

</script>
