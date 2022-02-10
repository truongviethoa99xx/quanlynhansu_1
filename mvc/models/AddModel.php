<?php
    class AddModel extends DB{
        public function AddNhanvien($HoTen, $Password, $Email, $NgaySinh, $QueQuan, $SoCMT, $SoDienThoai, $GioiTinh) {
            $qr = "INSERT INTO tbl_information (HoTen, Password, Email, NgaySinh, QueQuan, SoCMT, SoDienThoai, GioiTinh) VALUES ('$HoTen', '$Password', '$Email', '$NgaySinh', '$QueQuan', '$SoCMT', '$SoDienThoai', '$GioiTinh')";
            $result = false;
            if (mysqli_query($this->conn, $qr)) {
               $result = true;   
            }

            return json_encode($result);
        }
        
        public function checkName($un){
            $qr = "SELECT id_user FROM tbl_information WHERE HoTen = '$un'" ;
            $rows = mysqli_query($this->conn, $qr);
            $kq = false;
            if(mysqli_num_rows($rows)==0){
                $kq = true;
            }
            return json_encode($kq);
        }
        

    }
?>