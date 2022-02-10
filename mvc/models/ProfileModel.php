<?php 
    class ProfileModel extends DB{
        public function relationship(){
            $sql = "SELECT tbl_information.HoTen, tbl_permission.name_per, tbl_information.Avatar FROM ((tbl_relationship 
            INNER JOIN tbl_information ON tbl_information.id_user = tbl_relationship.id_user) 
            INNER JOIN tbl_permission ON tbl_permission.id_per = tbl_relationship.id_per)";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = $query->fetch_array()) {
                $list[] = $data;
            }

            return ($list);
        }
        public function showProfile($id){
            $sql = "SELECT tbl_information.HoTen, tbl_information.GioiTinh,tbl_information.QueQuan,tbl_information.SoCMT,tbl_information.TinhTrang, tbl_information.Email, tbl_information.SoDienThoai, tbl_information.NgayVaoLam, tbl_information.TinhTrang, tbl_information.NgaySinh, tbl_permission.name_per, tbl_information.Avatar FROM ((tbl_relationship 
            INNER JOIN tbl_information ON tbl_information.id_user = tbl_relationship.id_user) 
            INNER JOIN tbl_permission ON tbl_permission.id_per = tbl_relationship.id_per) WHERE tbl_information.id_user = '$id'";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = $query->fetch_array()) {
                $list[] = $data;
            }

            return ($list);
        }
    }
?>