<?php
//DB Connection
$connect = new PDO("mysql:host=localhost; dbname=quanlynhansu", "root", "");

function checkName($id){
    $conn = new mysqli('localhost', 'root', '', 'quanlynhansu');
    $sql = "SELECT `HoTen` FROM tbl_information WHERE `id_user` = '$id'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)){
        $name = $row['HoTen'];
    }

    return $name;
}

$column = [ "hoten", "ngaybatdau", "ngayketthuc", "lydo"];

$query = "SELECT * FROM tbl_nghiphep ";

if (isset($_POST["search"]["value"])) {
    $query .=
        '
 WHERE NgayBatDau LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 OR id_user LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 OR NgayKetThuc LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 OR LyDo LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id_np ASC ';
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
    $sub_array[] = checkName($row['id_user']);
    if(isset($row['NgayBatDau'])){
    	 $sub_array[] = $row['NgayBatDau'];
    }
    else {
    	$sub_array[] = 'Chưa có thông tin';
    }
    if(isset($row['NgayKetThuc'])){
        $sub_array[] = $row['NgayKetThuc'];
   }
   else {
       $sub_array[] = 'Chưa có thông tin';
   }
    if(isset($row['LyDo'])){
        $sub_array[] = $row['LyDo'];
   }
   else {
       $sub_array[] = 'Chưa có thông tin';
   }
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM tbl_nghiphep";
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
