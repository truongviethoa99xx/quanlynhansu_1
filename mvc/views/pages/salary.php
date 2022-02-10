<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title"> Hệ số lương </h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../Admin/show"> Hệ Thống </a></li>
                <li class="breadcrumb-item active"> hệ số lương </li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="../SalaryWage/history" id="history-wage" class="btn add-btn"><i class="fas fa-history"></i> Lịch sử </a>
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
                        <th class="text-center">Hệ số lương </th>
                        <th class="text-center">Ngày áp dụng hệ số lương</th>
                    </tr>
                </thead>
                <tbody>
					<?php 
						foreach ($data['showSalaryWage'] as $key => $value){
                            $id = $value['id_user'];
                            $hoten = $value['HoTen'];
                            $avatar = $value['Avatar'];
                            $maHSL = $value['maHSL'];
                            $date = $value['NgayTangHSL'];
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
                                <select class="custom-select mr-sm-2" data-date-id="<?php echo $date;?>" data-heso-id="<?php echo $id; ?>" id="heso_select">
                                    <option selected disabled style="color: #fff; background: orange;">
                                    <?php
                                        if($maHSL){
                                            echo $maHSL; 
                                        } else {
                                            echo "Chưa xét";
                                        }
                                    ?>
                                    </option>
                                    <?php   
                                        foreach ($data['showWage'] as $key => $value ){
                                            $ma = $value['maHSL'];
                                    ?>
                                    <option value="<?php echo $ma; ?>"><?php echo $ma; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                        <td id="date_update" class="text-center"><?php echo $date; ?></td>
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
    $(document).on("change", "#heso_select", function (event) {
        let userId = $(this).data('heso-id');
        let heso = $(this).val();
        let date = $(this).data('date-id');
        console.log(userId);
        console.log(heso);
        console.log(date);
        $.ajax({
            url: "../SalaryWage/check",
            method: "POST",
            data: {
                id_user: userId,
                heso: heso,
                date: date,
            },
            dataType: "text",
            success: function (res) {
                // console.log(res);
            },
        });
    });
});
</script>
