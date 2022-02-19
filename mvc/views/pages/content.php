<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                Xin chào:
                    <?php 
                        foreach ($data['show'] as $key =>$value){ 
                            $user = $value['HoTen']; } 
                    ?>
                    <?php echo $user; ?>
            </h3>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><a href="../ListCustommer/show"><i class="fa fa-user"></i></a></span>
                <div class="dash-widget-info">
                    <h3><?php echo $data['countCustom'] ?></h3>
                    <span>Nhân Viên</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><a href="../ListCustommer/show"><i class="fas fa-user-slash"></i></a></span>
                <div class="dash-widget-info">
                    <h3><?php echo $data['OfflineCustom'] ?></h3>
                    <span>Nhân Viên Nghỉ Việc</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><a href="../public/lib/index.php"><i class="fas fa-file-excel"></i></a></span>
                <div class="dash-widget-info">
                    <h3>Excel</h3>
                    <span>Xuất danh sách nhân viên</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><a href="../public/lib/bangluongEx.php"><i class="fas fa-file-excel"></i></a></span>
                <div class="dash-widget-info">
                    <h3>Excel</h3>
                    <span>Xuất bảng lương</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /Statistics Widget -->

<div class="row">
   
    <div class="col-xl-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Danh sách nhân viên</h3>
            </div>
            <br>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="emp_list" class="table table-bordered" style="width:100%;">
                        <thead>
                            <tr>   
                                <th>Họ và tên</th>
                                <th>Số điện thoại</th>
                                <th>Giới tính</th>
                                 <th>Số chứng minh thư</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="../ListCustommer/show">Danh sách nhân viên</a>
            </div>
        </div>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" language="javascript">
            $(document).ready(function () {
                var dataTable = $("#emp_list").DataTable({
                    processing: true,
                    serverSide: true,
                    order: [],
                    ajax: {
                        url: "../mvc/configs/fetchCustom.php",
                        type: "POST",
                    },
                });
            });
        </script>
    </div>  
    <div class="col-md-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Danh sách chức vụ</h3>
                <br>
                <br>
                <div class="input-group">   
                    <span class="input-group-addon">Tìm kiếm</span>
                    <input type="text" name="search_text" id="search_text" placeholder="Nhập để tìm kiếm" class="form-control" />
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="result"></div>
                </div>
            </div>
            <div class="card-footer">
                <a href="../Position/show">Danh sách chức vụ</a>
            </div>
        </div>
    </div>
<!-- Script -->
    <script>
        $(document).ready(function () {
            load_data();

            function load_data(query) {
                $.ajax({
                    url: "../mvc/configs/fetchPosition.php",
                    method: "POST",
                    data: { query: query },
                    success: function (data) {
                        $("#result").html(data);
                    },
                });
            }
            $("#search_text").keyup(function () {
                var search = $(this).val();
                if (search != "") {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });
    </script>
<!-- /Script -->
</div>

<div class="row">
    <div class="col-xl-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Danh sách nhân viên nghỉ phép</h3>
            </div>
            <div class="card-body">
                <br>
                <div class="table-responsive">
                    <table id="np_search" class="table table-bordered">
                        <thead>
                            <tr>   
                                <th>Họ và tên</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Lý do</th>
                            </tr>
                        </thead>
                            <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="../CustomOffline/show">Danh sách nhân viên nghỉ phép</a>
            </div>
        </div>
        <script type="text/javascript" language="javascript">
            $(document).ready(function () {
                var dataTable = $("#np_search").DataTable({
                    processing: true,
                    serverSide: true,
                    order: [],
                    ajax: {
                        url: "../mvc/configs/fetchOffline.php",
                        type: "POST",
                    },
                });
            });
        </script>
    </div>
    <!-- Script -->
    <script>
    </script>

    <!-- /Script -->
    <div class="col-md-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Danh sách nghỉ việc</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <br>
                    <table id="nv_search" class="table table-bordered">
                        <thead>
                            <tr>   
                                <th>Họ và tên</th>
                                <th>Ngày nghỉ việc</th>
                                <th>Lý do</th>
                            </tr>
                        </thead>
                            <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="#">Danh sách nhân viên nghỉ việc</a>
            </div>
        </div>
        <script type="text/javascript" language="javascript">
            $(document).ready(function () {
                var dataTable = $("#nv_search").DataTable({
                    processing: true,
                    serverSide: true,
                    order: [],
                    ajax: {
                        url: "../mvc/configs/quitJob.php",
                        type: "POST",
                    },
                });
            });
        </script>
            </div>
        </div>
    </div>
</div>
