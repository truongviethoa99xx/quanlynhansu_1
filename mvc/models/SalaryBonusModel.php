<?php 
    class SalaryBonusModel extends DB {
        public function showSalaryBonus(){
            $sql ="SELECT tbl_information.Avatar, tbl_information.id_user, tbl_information.HoTen, tbl_lichsuthuong.MaThuong, tbl_lichsuthuong.NgayThuong 
            FROM tbl_information LEFT JOIN tbl_lichsuthuong ON tbl_information.id_user = tbl_lichsuthuong.id_user";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function showBonus(){
            $sql ="SELECT * FROM tbl_thuong";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function checkSalaryBonus($id_user){
            $sql = "SELECT `id_user` FROM `tbl_lichsuthuong` WHERE `id_user` = '$id_user'";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if(mysqli_num_rows($query) == 0){
                $result = true;
            }

            return json_encode($result);
        }

        public function addSalaryBonus($id_user, $ma){
            $sql = "INSERT INTO `tbl_lichsuthuong`(`id_user`, `MaThuong`) VALUES ('$id_user','$ma')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function editSalaryBonus($id_user, $ma){
            $sql = "UPDATE `tbl_lichsuthuong` SET `MaThuong`='$ma' WHERE `id_user` = '$id_user'";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function addhistory($id_user, $ghichu){
            $sql = "INSERT INTO `tbl_ghichuthuong`(`id_user`, `GhiChu`) VALUES ('$id_user','$ghichu')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function showName($id_user){
            $sql ="SELECT * FROM tbl_information WHERE `id_user` = '$id_user'";
            $query = mysqli_query($this->conn, $sql);
            while ($data = mysqli_fetch_array($query)){
                $list = $data['HoTen'];
            }

            return $list;
        }

        public function showHistory(){
            $sql ="SELECT * FROM tbl_ghichuthuong";
            $query = mysqli_query($this->conn, $sql);
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }
    }
?>