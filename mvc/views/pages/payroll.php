 <!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Tính lương</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../Admin/show">Hệ Thống</a></li>

                <li class="breadcrumb-item active">Tính lương</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->

<!-- Edit Modal -->
<div class="modal-body">
    <form method="POST" action="../PayRoll/addPayroll">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <?php
                        $ma = date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $ma = date("YmdHis");
                    ?>
                    <label class="col-form-label">Mã lương<span class="text-danger">*</span></label>
                    <input name="maluong" class="form-control" type="text" required value="<?php echo $ma; ?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Nhân viên</label>
                            <select name="custom" class="form-control" id="custom">
                                <option  style="background-color:coral; color:cornsilk;">-- Chọn --</option>
                                <?php 
                                    foreach($data['showCustom'] as $key => $value){
                                ?>
                                <option value="<?php echo $value['id_user']; ?>"><?php echo $value['HoTen']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Số ngày công</label>
                    <input name="ngaycong" class="form-control" type="text" required value="<?php ?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Ngày tính lương</label>
                    <input name="ngaytinhluong" class="form-control" type="date" required value="<?php echo $value['NgayVaoLam']; ?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">ứng trước <span class="text-danger">*</span></label>
                    <input name="ungtruoc" class="form-control" type="text" required value="0"/>
                </div>
            </div>
            <!--  -->
            <div id="new-div"></div>
            <!--  -->
        </div>
        <div class="submit-section">
            <button id="submit" name="submit" class="btn btn-primary submit-btn">TÍnh lương</button>
        </div>
    </form>
</div>
<script >
$(document).ready(function () {
    $(document).on("change", "#custom", function (event) {
        let userId = $(this).val();
        console.log(userId);
        $.ajax({
            url: "../PayRoll/showSalary",
            method: "POST",
            data: {
                id_user: userId,
            },
            dataType: "text",
            success: function (res) {
                $('#new-div').html(res);
            },
        });
    });
});

</script>

