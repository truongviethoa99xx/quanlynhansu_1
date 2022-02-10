<?php
    $connect = mysqli_connect("localhost", "root", "", "quanlynhansu");
    $output = '';
    if (isset($_POST["query"])) {
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query = "SELECT * FROM tbl_chucvu WHERE MaChucVu LIKE '%$search%' OR TenChucVu LIKE '%" .$search ."%' ";
    } else {
        $query = "SELECT * FROM tbl_chucvu ORDER BY MaChucVu";
    }
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) { 
    $output .= '
    <div class="table-responsive">
         <table class="table table bordered">
            <tr>
                <th>Mã chức vụ</th>
                <th>Tên chức vụ</th>
            </tr>
            '; 
            while ($row = mysqli_fetch_array($result)) {
            $output .= '
                <tr>
                    <td>' . $row["MaChucVu"] . '</td>
                    <td>' . $row["TenChucVu"] . '</td>
                </tr>'; 
            } 
            echo $output; 
    } else { 
        echo 'Data Not Found'; 
    } 
?>
