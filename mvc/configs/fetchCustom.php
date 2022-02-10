<?php
//DB Connection
$connect = new PDO("mysql:host=localhost; dbname=quanlynhansu", "root", "");

$column = [ "hoten", "socmt", "sodienthoai"];

$query = "SELECT * FROM tbl_information ";

if (isset($_POST["search"]["value"])) {
    $query .=
        '
 WHERE HoTen LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 OR SoCMT LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 OR SoDienThoai LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id_user ASC ';
}
$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = [];

foreach ($result as $row) {
    $sub_array = [];
    $sub_array[] = $row['HoTen'];
    if(isset($row['SoDienThoai'])){
    	 $sub_array[] = $row['SoDienThoai'];
    }
    else {
    	$sub_array[] = 'Chưa có thông tin';
    }
    if($row['GioiTinh'] == '0'){
    	 $sub_array[] = 'Nữ';
    }
    elseif($row['GioiTinh'] == '1') {
    	$sub_array[] = 'Nam';
    }
    else {
    	$sub_array[] = 'Chưa có thông tin';
    }
    if(isset($row['SoDienThoai'])){
    	 $sub_array[] = $row['SoCMT'];
    }
    else {
    	$sub_array[] = 'Chưa có thông tin';
    }
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM tbl_information";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = [
    'draw' => intval($_POST['draw']),
    'recordsTotal' => count_all_data($connect),
    'recordsFiltered' => $number_filter_row,
    'data' => $data,
];

echo json_encode($output);

?>