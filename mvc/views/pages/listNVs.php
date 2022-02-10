<!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Danh Sách Nhân Viên</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../Admin/show">Hệ Thống</a></li>
                    <li class="breadcrumb-item active">Danh Sách Nhân Viên</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="../Register/" class="btn btn-success"><i class="fa fa-plus"></i>Thêm Mới</a>
                <div class="view-icons">
                    <a href="../ShowCustommer/show" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                    <a href="../ListCustommer/show" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th class="text-nowrap">Ngày vào làm</th>
                            <th>Tình trạng</th>
                            <th class="text-right no-sort">Sửa</th>
                        </tr>
                    </thead>
                    <?php 
                        foreach ($data['showcv'] as $key => $value){
                            $name = $value['HoTen'];
                            $avatar = $value['Avatar'];
                            $sex = $value['GioiTinh'];
                            $email = $value['Email'];
                            $phone = $value['SoDienThoai'];
                            $date = $value['NgayVaoLam'];
                            $role = $value['TinhTrang'];
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="../Profile/show" class="avatar">
                                        <?php 
                                            if ($avatar){
                                                echo '<img src="data:image/jpeg;base64,'.base64_encode($avatar).'" alt= ""/>' ;
                                            } else {
                                                echo '<img src="../public/images/user.png" alt= ""/>' ;
                                            } 
                                        ?>
                                    </a>
                                    <a href="../Profile/show"><?php echo $name; ?>
                                    <span>
                                        <?php 
                                            if(isset($value['name_per'])){
                                                echo $value['name_per']; 
                                            } else {
                                                echo "Nhân viên";
                                            }
                                        ?>
                                    </span>
                                    </a>
                                </h2>
                            </td>
                            <td>
                                <?php 
                                    if ($sex == 1){
                                        echo 'Nam';
                                    }elseif ($sex == NULL){
                                        echo 'Chưa có thông tin';
                                    } else {
                                        echo 'Nữ';
                                    }
                                ?>
                            </td>
                            <td><?php echo $email; ?></td>
                            <td>
                                <?php 
                                    if (isset($phone)){
                                        echo $phone;
                                    }else {
                                        echo 'Chưa có thông tin';
                                    }
                                ?>
                            </td>
                            <td><?php echo $date; ?></td>
                            <td>
                                <select class="custom-select mr-sm-2" id="activate" data-user-id="<?php echo $value['id_user']; ?>">
                                    <option selected disabled style="color: #fff; background: orange;">
                                        <?php 
                                            if ($role == 0){
                                              echo 'Nghỉ việc';
                                            } elseif ($role == 1) {
                                                echo 'Hoạt động';
                                            }
                                        ?>
                                    </option>
                                    <option value="0">Nghỉ việc</option>
                                    <option value="1">Hoạt động</option>
                                </select>
                            </td>
                            <td class="text-right">
                                <div>
                                    <a href="../EditCustommer/show&pos=<?php echo $value['id_user']; ?>"><i class="fa fa-pencil m-r-5"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
        <script >
$(document).ready(function () {
    $(document).on("change", "#activate", function (event) {
        let userId = $(this).data('user-id');
        let activate = $(this).val();
        $.ajax({
            url: "../ListCustommer/edit",
            method: "POST",
            data: {
                id_user: userId,
                activate: activate,
            },
            dataType: "text",
            success: function (res) {
                // console.log(res);
            },
        });
    });
});

</script>

