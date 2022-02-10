<?php 
    class PermissionModel extends DB{
        public function showOption(){
            $sql = "SELECT * FROM tbl_permission";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }
            return $list;
        }
        
        public function showPermission(){
            $sql = "SELECT tbl_information.id_user ,tbl_information.Avatar,tbl_information.HoTen, tbl_relationship.activate, tbl_permission.name_per 
            FROM ((tbl_information LEFT JOIN tbl_relationship ON tbl_information.id_user = tbl_relationship.id_user) 
            LEFT JOIN tbl_permission ON tbl_relationship.id_per = tbl_permission.id_per)";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }
            return $list;
        }

        public function checkPermission($id_user){
            $sql = "SELECT `id_user` FROM tbl_relationship WHERE `id_user` = $id_user";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if (mysqli_num_rows($query) == 0){
                $result = true;
            }

            return json_encode($result);
        }

        public function addPermission($id_user, $chucvu){
            $sql ="INSERT INTO `tbl_relationship`(`id_user`, `id_per`) VALUES ('$id_user','$chucvu')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if ($query){
                $result = true;
            } 

            return json_encode($result);
        }

        public function editPermission($id_user, $chucvu){
            $sql = "UPDATE `tbl_relationship` SET `id_per`='$chucvu' WHERE `id_user` = '$id_user'";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }
            return json_encode($result);
        }

        public function editActivate($id_user, $activate){
            $sql = "UPDATE `tbl_relationship` SET `activate`= $activate WHERE `id_user` = '$id_user'";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }
            return json_encode($result);
        }
    }
?>