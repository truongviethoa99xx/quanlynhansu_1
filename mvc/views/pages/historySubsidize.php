<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title"> Lịch sử </h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../SalarySubsidize/show"> Phụ cấp </a></li>
                <li class="breadcrumb-item active"> Lịch sử </li>
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
                        <th class="text-center">Ngày</th>
                        <th class="text-center">Lịch sử </th>
                    </tr>
                </thead>
                <tbody>
					<?php 
						foreach ($data['history'] as $key => $value){
                            $ngayghichu = $value['NgayGhiChu'];
                            $ghichu = $value['GhiChu'];
					?>
                    <tr>
                        <td class="text-center"><?php echo $ngayghichu; ?></td>
                        <td class="text-center"><?php echo $ghichu; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /Page Content -->