<?php 
    class ListNVModel extends DB {
        public function relationship(){
            $sql = "SELECT tbl_information.id_user, tbl_information.HoTen, tbl_information.GioiTinh, tbl_information.Email, tbl_information.SoDienThoai, tbl_information.NgayVaoLam, tbl_information.TinhTrang, tbl_information.NgaySinh, tbl_information.Avatar, tbl_permission.name_per FROM (tbl_information LEFT JOIN tbl_relationship ON tbl_information.id_user = tbl_relationship.id_user) LEFT JOIN tbl_permission ON tbl_permission.id_per = tbl_relationship.id_per;";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = $query->fetch_array()) {
                $list[] = $data;
            }

            return ($list);
        }

        public function showProfile($id){
            $sql = "SELECT tbl_information.HoTen, tbl_information.GioiTinh, tbl_information.Email, tbl_information.SoDienThoai, tbl_information.NgayVaoLam, tbl_information.TinhTrang, tbl_information.NgaySinh, tbl_permission.name_per, tbl_information.Avatar FROM ((tbl_relationship 
            INNER JOIN tbl_information ON tbl_information.id_user = tbl_relationship.id_user) 
            INNER JOIN tbl_permission ON tbl_permission.id_per = tbl_relationship.id_per) WHERE tbl_information.id_user = '$id'";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = $query->fetch_array()) {
                $list[] = $data;
            }

            return ($list);
        }

        public function editActivate($id, $role){
            $sql = " UPDATE `tbl_information` SET `TinhTrang`= $role WHERE id_user = '$id'";
            $result = false;
            $query = mysqli_query($this->conn, $sql);
            if ($query) {
                $result = true;
            }

            return json_encode($result);
        }
    }
?>