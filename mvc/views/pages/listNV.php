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
            <a href="../Register/show" class="btn btn-success"><i class="fa fa-plus"></i>Thêm Mới</a>
            <div class="view-icons">
                <a href="../ShowCustommer/show" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                <a href="../ListCustommer/show" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Search Filter -->
<div class="page-header">
    <div class="row filter-row">
    </div>
</div>
<!-- /Search Filter -->

<div class="row staff-grid-row">
    <!-- PHP -->
    <?php 
        foreach ($data['showcv'] as $key =>$value) { 
        $name = $value['HoTen']; 
        $permission = $value['name_per']; 
        $avatar = $value['Avatar']; 
    ?>
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="profile-img">
                <a href="../Profile/show" class="avatar">
                    <?php 
                        if (isset($avatar)){
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($avatar).'" alt= ""/>' ; 
                        } else { 
                            echo '<img src="../public/images/user.png" alt="" />' ; 
                        } 
                    ?>
                </a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="../EditCustommer/show&pos=<?php echo $value['id_user']; ?>"><i class="fa fa-pencil m-r-5"></i> Sửa </a>
                </div>
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                <a href="../Profile/show"><?php echo $name; ?></a>
            </h4>
            <div class="small text-muted"><?php echo $permission; ?></div>
        </div>
    </div>
    <?php } ?>
</div>
