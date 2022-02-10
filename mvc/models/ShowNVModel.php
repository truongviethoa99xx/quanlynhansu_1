<?php 
    class ShowNVModel extends DB{
        public function relationship(){
            $sql = "SELECT tbl_information.id_user ,tbl_information.HoTen, tbl_permission.name_per, tbl_information.Avatar FROM ((tbl_relationship 
            INNER JOIN tbl_information ON tbl_information.id_user = tbl_relationship.id_user) 
            INNER JOIN tbl_permission ON tbl_permission.id_per = tbl_relationship.id_per)";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = $query->fetch_array()) {
                $list[] = $data;
            }

            return ($list);
        }
    }
?>