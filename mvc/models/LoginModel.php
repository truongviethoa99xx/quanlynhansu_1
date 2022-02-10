<?php
    class LoginModel extends DB{
        public function SinhVien(){
            $qr = "SELECT * FROM tbl_information";
            return mysqli_query($this->conn, $qr);
        }

        public function loginAccount($username, $password){
            $sql = "SELECT id_user, Email, Password, HoTen FROM tbl_information WHERE Email = '$username' AND Password = '$password' ";

            $result = false; 
            $query = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($query) != 0){
                $result = true;
            } 
            return json_encode($result);
        }

        public function selectData($username, $password){
            $sql = "SELECT id_user, Email, Password, HoTen FROM tbl_information WHERE Email = '$username' AND Password = '$password' ";
            $active = false;
            $query = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($query) != 0){
                while($row = mysqli_fetch_array($query)){
                    $active = $row['id_user'];
                }
            } 
            return json_encode($active);
        }

        public function relationship($id){
            $sql = "SELECT tbl_relationship.id_user, tbl_relationship.id_per, tbl_permission.name_per, tbl_relationship.activate FROM tbl_relationship INNER JOIN tbl_permission ON tbl_relationship.id_per = tbl_permission.id_per WHERE id_user = '$id'";
            $check_id = false;
            $check_active = false;
            $query = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($query) != 0){
                while($row = mysqli_fetch_array($query)){
                    $check_id = $row['id_per'];
                    $check_active = $row['activate'];
                }
            } 
            return array($check_id, $check_active);
        }
    }
?>