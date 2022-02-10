<?php
require_once "./Classes/PHPExcel.php";
require_once "./connect.php";

if(isset($_POST['btnEx'])){
    $objExcel = new PHPExcel;
    $objExcel -> setactiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('Nhanvien');

    $rowCount = 1;
    $sheet->setCellValue("A".$rowCount,'Họ Tên');
    $sheet->setCellValue("B".$rowCount,'Ngày sinh');
    $sheet->setCellValue("C".$rowCount,'Quê quán');
    $sheet->setCellValue("D".$rowCount,'Số điện thoại');
    $sheet->setCellValue("E".$rowCount,'Số chứng minh');
    $sheet->setCellValue("F".$rowCount,'Email');
    $sheet->setCellValue("G".$rowCount,'Ngày vào làm');
    $sheet->getColumnDimension("A")->setAutoSize(true);
    $sheet->getStyle('A1:G1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff00');
    $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $result = $conn->query("SELECT `HoTen`, `NgaySinh`, `QueQuan`, `SoDienThoai`, `SoCMT`, `Email`, `NgayVaoLam` FROM `tbl_information`");
    while ($row = mysqli_fetch_array($result)){
        $rowCount++;
        $sheet->setCellValue("A".$rowCount,$row['HoTen']);
        $sheet->setCellValue("B".$rowCount,$row['NgaySinh']);
        $sheet->setCellValue("C".$rowCount,$row['QueQuan']);
        $sheet->setCellValue("D".$rowCount,$row['SoDienThoai']);
        $sheet->setCellValue("E".$rowCount,$row['SoCMT']);
        $sheet->setCellValue("F".$rowCount,$row['Email']);
        $sheet->setCellValue("G".$rowCount,$row['NgayVaoLam']);
    
    }

    $styleArray = array(
        'borders'=> array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );
    $sheet->getStyle("A1:" . "G" .($rowCount))->applyFromArray($styleArray);

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');

    header('Content-Disposition: attachment; filename"'. $filename.'"');
    header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
    header('Content-Length: '.filesize($filename));
    header('Content-Transfer-encoding: binary');
    header('Cache-control: must-revalidate');
    header('Pragma:no-cache');
    readfile($filename);
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <button name="btnEx" type="submit">Xuat</button>
    </form>
</body>
</html>