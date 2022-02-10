<?php 
    class PositionModel extends DB{
        public function showPosition(){
            $sql = "SELECT * FROM tbl_chucvu ";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = $query->fetch_array()) {
                $list[] = $data;
            }

            return ($list);
        }

        public function deletePosition($ma){
            $sql = "DELETE FROM `tbl_chucvu` WHERE `MaChucVu` = '$ma'";  
            $result = false;
            if(mysqli_query($this->conn, $sql))  
            {  
                $result = true; 
            }  

            return json_encode($result);
        }

        public function addPosition($ma, $ten){
            $sql = "INSERT INTO `tbl_chucvu`(`MaChucVu`, `TenChucVu`) VALUES ('$ma','$ten')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if ($query){
                $result = true;
            }
            return json_encode($result);
        }

        public function editPosition($ma, $ten){
            $sql = "UPDATE `tbl_chucvu` SET `MaChucVu`='$ma',`TenChucVu`='$ten' WHERE `MaChucVu` = '$ma'";
            $result = false;
            $query = mysqli_query($this->conn, $sql);
            if ($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function checkPosition($ma, $ten){
            $sql = "SELECT * FROM `tbl_chucvu` WHERE `MaChucVu` = '$ma' OR `TenChucVu` = '$ten'";
            $query = mysqli_query($this->conn, $sql);
            $result = true;
            if (mysqli_num_rows($query) > 0){
                $result = false;
            } 
            return json_encode($result);
        }
    }
?>