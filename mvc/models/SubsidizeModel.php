<?php 
    class SubsidizeModel extends DB{
        public function showSubsidize(){
            $sql = "SELECT * FROM tbl_phucap";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }
            return $list;
        }

        public function deleteSubsidize($ma){
            $sql = "DELETE FROM `tbl_phucap` WHERE `MaPhuCap` = '$ma'";  
            $result = false;
            if(mysqli_query($this->conn, $sql))  
            {  
                $result = true; 
            }  

            return json_encode($result);
        }

        public function addSubsidize($ma, $heso){
            $sql = "INSERT INTO `tbl_phucap`(`MaPhuCap`, `TienPhuCap`) VALUES ('$ma','$heso')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if ($query){
                $result = true;
            }
            return json_encode($result);
        }

        public function editSubsidize($ma, $heso){
            $sql = "UPDATE `tbl_phucap` SET `MaPhuCap`='$ma',`TienPhuCap`='$heso' WHERE `MaPhuCap` = '$ma'";
            $result = false;
            $query = mysqli_query($this->conn, $sql);
            if ($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function checkSubsidize($ma, $heso){
            $sql = "SELECT * FROM `tbl_phucap` WHERE `MaPhuCap` = '$ma' OR `TienPhuCap` = '$heso'";
            $query = mysqli_query($this->conn, $sql);
            $result = true;
            if (mysqli_num_rows($query) > 0){
                $result = false;
            } 
            return json_encode($result);
        }
    }
?>