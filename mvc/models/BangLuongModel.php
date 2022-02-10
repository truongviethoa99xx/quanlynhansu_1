<?php 
    class BangLuongModel extends DB{
        public function showBL(){
            $sql= "SELECT tbl_chamcong.NgayTinhLuong, tbl_chamcong.SoNgayLamViec, tbl_chamcong.TongLuong,tbl_chamcong.ThucNhan,tbl_information.HoTen , tbl_phucap.TienPhuCap, tbl_hesoluong.HeSoLuong, tbl_thuong.TienThuong FROM (tbl_information INNER JOIN tbl_lichsuphucap ON tbl_lichsuphucap.id_user = tbl_information.id_user INNER JOIN tbl_phucap ON tbl_lichsuphucap.MaPhuCap = tbl_phucap.MaPhuCap INNER JOIN tbl_lichsutangluong ON tbl_information.id_user = tbl_lichsutangluong.id_user INNER JOIN tbl_hesoluong ON tbl_lichsutangluong.maHSL = tbl_hesoluong.maHSL INNER JOIN tbl_lichsuthuong ON tbl_information.id_user = tbl_lichsuthuong.id_user INNER JOIN tbl_thuong ON tbl_lichsuthuong.MaThuong = tbl_thuong.MaThuong) INNER JOIN tbl_chamcong ON tbl_information.id_user = tbl_chamcong.id_user";
            $query=mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }
    }
?>