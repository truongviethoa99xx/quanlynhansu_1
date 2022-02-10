
 <!-- Page Header -->
 <div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Báo cáo lương</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../Admin/show">Hệ Thống</a></li>

                <li class="breadcrumb-item active">Báo cáo lương</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Báo cáo</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Ngày tính lương</th>
                            <th>Số ngày làm</th>
                            <th>Hệ số lương</th>
                            <th>Tiền thưởng</th>
                            <th>Tiền phụ cấp</th>
                            <th>Tổng lương</th>
                            <th>Thực nhận</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($data['show'] as $key => $value){

                        ?>
                        <tr>
                            <th><?php echo $value['HoTen'] ?></th>
                            <th><?php echo $value['NgayTinhLuong'] ?></th>
                            <th><?php echo $value['SoNgayLamViec'] ?></th>
                            <th><?php echo $value['HeSoLuong'] ?></th>
                            <th><?php echo $value['TienThuong'] ?></th>
                            <th><?php echo $value['TienPhuCap'] ?></th>
                            <th><?php echo $value['TongLuong'] ?></th>
                            <th><?php echo $value['ThucNhan'] ?></th>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->


