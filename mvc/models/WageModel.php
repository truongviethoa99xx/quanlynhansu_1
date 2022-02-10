<?php 
    class WageModel extends DB{ 
        public function showWage(){
            $sql = "SELECT * FROM tbl_hesoluong";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }
            return $list;
        }

        public function deleteWage($ma){
            $sql = "DELETE FROM tbl_hesoluong WHERE maHSL = '$ma'";  
            $result = false;
            if(mysqli_query($this->conn, $sql))  
            {  
                $result = true; 
            }  

            return json_encode($result);
        }

        public function addWage($ma, $heso){
            $sql = "INSERT INTO `tbl_hesoluong`(`maHSL`, `HeSoLuong`) VALUES ('$ma','$heso')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if ($query){
                $result = true;
            }
            return json_encode($result);
        }

        public function editWage($ma, $heso){
            $sql = "UPDATE `tbl_hesoluong` SET `maHSL`='$ma',`HeSoLuong`='$heso' WHERE maHSL = '$ma'";
            $result = false;
            $query = mysqli_query($this->conn, $sql);
            if ($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function checkWage($ma, $heso){
            $sql = "SELECT * FROM `tbl_hesoluong` WHERE maHSL = '$ma' OR HeSoLuong = '$heso'";
            $query = mysqli_query($this->conn, $sql);
            $result = true;
            if (mysqli_num_rows($query) > 0){
                $result = false;
            } 
            return json_encode($result);
        }
    }
?>