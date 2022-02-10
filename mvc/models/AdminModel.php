<?php 
    class AdminModel extends DB{
        public function showAll($id){
            $sql = "SELECT * FROM `tbl_information` WHERE id_user = '$id'";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }
            return $list;
        }

        public function countCustom(){
            $sql = "SELECT COUNT(*) AS `id_user` FROM tbl_information WHERE `TinhTrang` = 1";
            $query = mysqli_query($this->conn, $sql);
            $num = mysqli_fetch_array($query);
            $count = $num["id_user"];
            
            return $count;
        } 

        public function countOfflineCustom(){
            $sql = "SELECT COUNT(*) AS `id_user` FROM tbl_information WHERE `TinhTrang` = 0";
            $query = mysqli_query($this->conn, $sql);
            $num = mysqli_fetch_array($query);
            $count = $num["id_user"];
            
            return $count;
        }
    }
?>