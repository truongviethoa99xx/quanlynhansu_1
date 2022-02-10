<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

$mysqli = new mysqli('localhost', 'root', '', 'quanlynhansu');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

if ($input['action'] === 'edit') {
   $sql = $mysqli->query("UPDATE tbl_hesoluong SET HeSoLuong='" . $input['col2'] . "', WHERE maHSL='" . $input['col1'] . "'");
} else if ($input['action'] === 'delete') {
    $sql = ("DELETE FROM `tbl_hesoluong` WHERE maHSL='" . $input['id'] . "'");
     mysqli_query($mysqli, $sql);
} else if ($input['action'] === 'restore') {
    $mysqli->query("UPDATE users SET deleted=0 WHERE maHSL='" . $input['id'] . "'");
}

mysqli_close($mysqli);

echo json_encode($input);
