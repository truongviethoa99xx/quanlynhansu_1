<?php 
    class OfflineModel extends DB{ 
        public function showOffline(){
            $sql = "SELECT * FROM `tbl_nghiphep` INNER JOIN tbl_information ON tbl_nghiphep.id_user = tbl_information.id_user";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }
            return $list;
        }

        public function deleteOffline($ma){
            $sql = "DELETE FROM tbl_nghiphep WHERE id_np = '$ma'";  
            $result = false;
            if(mysqli_query($this->conn, $sql))  
            {  
                $result = true; 
            }  

            return json_encode($result);
        }

        public function addOffline($ma, $batdau, $ketthuc, $lydo){
            $sql = "INSERT INTO `tbl_nghiphep`(`id_user`, `NgayBatDau`, `NgayKetThuc`,`LyDo`) VALUES ('$ma', '$batdau','$ketthuc','$lydo')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if ($query){
                $result = true;
            }
            return json_encode($result);
        }

        public function editOffline($id, $batdau, $ketthuc, $lydo){
            $sql = "UPDATE `tbl_nghiphep` SET `NgayBatDau`='$batdau',`NgayKetThuc`='$ketthuc', `LyDo` = '$lydo' WHERE `id_np` = '$id'";
            $result = false;
            $query = mysqli_query($this->conn, $sql);
            if ($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function checkOffline($id){
            $sql = "SELECT * FROM `tbl_nghiphep` WHERE `id_user` = '$id'";
            $query = mysqli_query($this->conn, $sql);
            $result = true;
            if (mysqli_num_rows($query) > 0){
                $result = false;
            } 
            return json_encode($result);
        }

        public function showCustom(){
            $sql = "SELECT * FROM `tbl_information`";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }
            return $list;
        }
    }
?>