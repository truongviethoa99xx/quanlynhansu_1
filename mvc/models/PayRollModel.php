<?php
    class PayRollModel extends DB{
        public function showCustom(){
            $sql = "SELECT * FROM `tbl_information`";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function showSalary($id){
            $sql = "SELECT tbl_information.HoTen , tbl_phucap.TienPhuCap, tbl_hesoluong.HeSoLuong, tbl_thuong.TienThuong FROM (tbl_information LEFT JOIN tbl_lichsuphucap ON tbl_lichsuphucap.id_user = tbl_information.id_user LEFT JOIN tbl_phucap ON tbl_lichsuphucap.MaPhuCap = tbl_phucap.MaPhuCap LEFT JOIN tbl_lichsutangluong ON tbl_information.id_user = tbl_lichsutangluong.id_user LEFT JOIN tbl_hesoluong ON tbl_lichsutangluong.maHSL = tbl_hesoluong.maHSL LEFT JOIN tbl_lichsuthuong ON tbl_information.id_user = tbl_lichsuthuong.id_user LEFT JOIN tbl_thuong ON tbl_lichsuthuong.MaThuong = tbl_thuong.MaThuong) WHERE tbl_information.id_user = '$id'";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function addWageTable($id, $NgayTinhLuong, $id_user, $SoNgayLamViec, $TongLuong, $ThucNhan, $UngTruoc){
            $sql = "INSERT INTO `tbl_chamcong`(`id_chamcong`, `NgayTinhLuong`, `id_user`, `SoNgayLamViec`, `TongLuong`, `ThucNhan`, `UngTruoc`) VALUES ('$id','$NgayTinhLuong','$id_user','$SoNgayLamViec','$TongLuong','$ThucNhan','$UngTruoc')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }
            
            return json_encode($result);
        }
    }
?>