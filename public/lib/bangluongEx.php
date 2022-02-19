<?php
$conn = mysqli_connect('localhost', 'root', '', 'quanlynhansu');
require_once 'Classes/PHPExcel.php';
    $objPHPExcel = new PHPExcel();
    
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Họ Tên');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Ngày Tính Lương');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Số ngày làm');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Hệ số lương');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Tiền thưởng');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Phụ cấp');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Tổng lương');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Thực nhận');
    $objPHPExcel->getActiveSheet()->setTitle('Chesse1');
    $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff00');
    $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $rowCount = 1;
    $result = $conn->query("SELECT tbl_chamcong.NgayTinhLuong, tbl_chamcong.SoNgayLamViec, tbl_chamcong.TongLuong,tbl_chamcong.ThucNhan,tbl_information.HoTen , tbl_phucap.TienPhuCap, tbl_hesoluong.HeSoLuong, tbl_thuong.TienThuong FROM (tbl_information INNER JOIN tbl_lichsuphucap ON tbl_lichsuphucap.id_user = tbl_information.id_user INNER JOIN tbl_phucap ON tbl_lichsuphucap.MaPhuCap = tbl_phucap.MaPhuCap INNER JOIN tbl_lichsutangluong ON tbl_information.id_user = tbl_lichsutangluong.id_user INNER JOIN tbl_hesoluong ON tbl_lichsutangluong.maHSL = tbl_hesoluong.maHSL INNER JOIN tbl_lichsuthuong ON tbl_information.id_user = tbl_lichsuthuong.id_user INNER JOIN tbl_thuong ON tbl_lichsuthuong.MaThuong = tbl_thuong.MaThuong) INNER JOIN tbl_chamcong ON tbl_information.id_user = tbl_chamcong.id_user");
    while ($row = mysqli_fetch_array($result)){
        $rowCount++;
        $objPHPExcel->getActiveSheet()->setCellValue("A".$rowCount,$row['HoTen']);
        $objPHPExcel->getActiveSheet()->setCellValue("B".$rowCount,$row['NgayTinhLuong']);
        $objPHPExcel->getActiveSheet()->setCellValue("C".$rowCount,$row['SoNgayLamViec']);
        $objPHPExcel->getActiveSheet()->setCellValue("D".$rowCount,$row['HeSoLuong']);
        $objPHPExcel->getActiveSheet()->setCellValue("E".$rowCount,$row['TienThuong']);
        $objPHPExcel->getActiveSheet()->setCellValue("F".$rowCount,$row['TienPhuCap']);
        $objPHPExcel->getActiveSheet()->setCellValue("G".$rowCount,$row['TongLuong']);
        $objPHPExcel->getActiveSheet()->setCellValue("H".$rowCount,$row['ThucNhan']);
    
    }
    $styleArray = array(
        'borders'=> array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );
    $objPHPExcel->getActiveSheet()->getStyle("A1:" . "H" .($rowCount))->applyFromArray($styleArray);
    
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Danh_sách_lương.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');



?>