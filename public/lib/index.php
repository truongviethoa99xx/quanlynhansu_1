<?php
$conn = mysqli_connect('localhost', 'root', '', 'quanlynhansu');
require_once 'Classes/PHPExcel.php';
    $objPHPExcel = new PHPExcel();
    
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Họ Tên');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Ngày sinh');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Quê quán');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Số điện thoại');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Số chứng minh');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Email');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Ngày vào làm');
    $objPHPExcel->getActiveSheet()->setTitle('Chesse1');
    $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff00');
    $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $rowCount = 1;
    $result = $conn->query("SELECT `HoTen`, `NgaySinh`, `QueQuan`, `SoDienThoai`, `SoCMT`, `Email`, `NgayVaoLam` FROM `tbl_information`");
    while ($row = mysqli_fetch_array($result)){
        $rowCount++;
        $objPHPExcel->getActiveSheet()->setCellValue("A".$rowCount,$row['HoTen']);
        $objPHPExcel->getActiveSheet()->setCellValue("B".$rowCount,$row['NgaySinh']);
        $objPHPExcel->getActiveSheet()->setCellValue("C".$rowCount,$row['QueQuan']);
        $objPHPExcel->getActiveSheet()->setCellValue("D".$rowCount,$row['SoDienThoai']);
        $objPHPExcel->getActiveSheet()->setCellValue("E".$rowCount,$row['SoCMT']);
        $objPHPExcel->getActiveSheet()->setCellValue("F".$rowCount,$row['Email']);
        $objPHPExcel->getActiveSheet()->setCellValue("G".$rowCount,$row['NgayVaoLam']);
    
    }
    $styleArray = array(
        'borders'=> array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );
    $objPHPExcel->getActiveSheet()->getStyle("A1:" . "G" .($rowCount))->applyFromArray($styleArray);
    
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Danh_sach_nhan_vien.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');



?>