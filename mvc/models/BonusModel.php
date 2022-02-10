<?php 
    class BonusModel extends DB{
        public function showBonus(){
            $sql = "SELECT * FROM `tbl_thuong`";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }
            return $list;
        }

        public function deleteBonus($ma){
            $sql = "DELETE FROM `tbl_thuong` WHERE `MaThuong` = '$ma'";  
            $result = false;
            if(mysqli_query($this->conn, $sql))  
            {  
                $result = true; 
            }  

            return json_encode($result);
        }

        public function addBonus($ma, $heso){
            $sql = "INSERT INTO `tbl_thuong`(`MaThuong`, `TienThuong`) VALUES ('$ma','$heso')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if ($query){
                $result = true;
            }
            return json_encode($result);
        }

        public function editBonus($ma, $heso){
            $sql = "UPDATE `tbl_thuong` SET `MaThuong`='$ma',`TienThuong`='$heso' WHERE `MaThuong` = '$ma'";
            $result = false;
            $query = mysqli_query($this->conn, $sql);
            if ($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function checkBonus($ma, $heso){
            $sql = "SELECT * FROM `tbl_thuong` WHERE `MaThuong` = '$ma' OR `TienThuong` = '$heso'";
            $query = mysqli_query($this->conn, $sql);
            $result = true;
            if (mysqli_num_rows($query) > 0){
                $result = false;
            } 
            return json_encode($result);
        }
    }
?>