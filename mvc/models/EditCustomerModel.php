<?php 
    class EditCustomerModel extends DB{
        public function showCustom($id){
            $sql = "SELECT * FROM tbl_information WHERE `id_user` = '$id'"; 
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function editCustom($id ,$hoten, $ngaysinh, $gioitinh, $quequan, $sdt, $cmt, $email, $ngayvaolam, $mk){
            $sql ="UPDATE `tbl_information` SET `HoTen`='$hoten',`NgaySinh`='$ngaysinh',`GioiTinh`='$gioitinh'
            ,`QueQuan`='$quequan',`SoDienThoai`='$sdt',`SoCMT`='$cmt'
            ,`Email`='$email',`Password`='$mk'
            ,`NgayVaoLam`='$ngayvaolam' WHERE `id_user` = '$id'";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }

            return json_encode($result);
        }
    }

?>