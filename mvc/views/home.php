<!-- Header -->
<?php include './mvc/views/blocks/header.php';?>
<!-- Sidebar -->
<?php 
if($phanquyen == (4)){
    include './mvc/views/blocks/sidebar_2.php';
}else{
    include './mvc/views/blocks/sidebar.php';
}

?>

<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <?php require_once './mvc/views/pages/'. $data["pages"].'.php';?>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
</div>
<!-- /Main Wrapper -->

<!-- Footer -->
<?php include './mvc/views/blocks/footer.php';?>
