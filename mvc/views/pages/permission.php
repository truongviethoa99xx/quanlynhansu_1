<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Cấp quyền</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../Admin/show">Hệ thống</a></li>
                <li class="breadcrumb-item active">Phân quyền</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->


<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="my-table" class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>Họ và tên</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Quyền</th>
                    </tr>
                </thead>
                <tbody>
					<?php 
						foreach ($data['showPermission'] as $key => $value){
                            $id = $value['id_user'];
                            $hoten = $value['HoTen'];
                            $avatar = $value['Avatar'];
                            $activate = $value['activate'];
                            $chucvu = $value['name_per'];
					?>
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a class="avatar avatar-xs" href="../Profile/show"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($avatar).'" alt= ""/>' ; ?></a>
                                <a href="../Profile/show"><?php echo $hoten; ?></a>
                            </h2>
                        </td>
                        <td class="text-center">
                            <div class="dropdown action-label">
                                <select class="custom-select mr-sm-2" id="activate_select" data-users-id="<?php echo $id; ?>">
                                    <option selected disabled style="color: #fff; background: orange;">
                                        <?php
                                            if ($activate == 1){
                                                echo " Đã kích hoạt";
                                            } else{
                                                echo "Chưa kích hoạt";
                                            }
                                        ?>
                                    </option>
                                    <option value="1">Kích hoạt</option>
                                    <option value="0">Ngắt kích hoạt</option>
                                </select>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="dropdown action-label">
                                <select class="custom-select mr-sm-2" id="chucvu_select" data-user-id="<?php echo $value['id_user']; ?>">
                                    <option selected disabled style="color: #fff; background: orange;">
                                    <?php
                                        if($chucvu){
                                            echo $chucvu; 
                                        } else {
                                            echo "Chưa xét";
                                        }
                                    ?>
                                    </option>
                                    <?php 
                                        foreach ($data['showOption'] as $key => $value ){
                                            $id = $value['id_per'];
                                            $name = $value['name_per'];
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                    <?php } ?>
                                </select>
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
<script >
$(document).ready(function () {
    $(document).on("change", "#chucvu_select", function (event) {
        let userId = $(this).data('user-id');
        let chucvu = $(this).val();
        $.ajax({
            url: "../Permission/checkData",
            method: "POST",
            data: {
                id_user: userId,
                chucvu: chucvu,
            },
            dataType: "text",
            success: function (res) {
                // console.log(res);
            },
        });
    });

    $(document).on("change", "#activate_select", function (event) {
        let userId = $(this).data('users-id');
        let activate = $(this).val();
        console.log(userId);
        console.log(activate);
        $.ajax({
            url: "../Permission/checkUser",
            method: "POST",
            data: {
                id_user: userId,
                activate: activate
            },
            dataType: "text",
            success: function (res) {
               
            },
        });
    });
});

</script>
