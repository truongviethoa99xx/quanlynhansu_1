<?php 
    class SalaryWageModel extends DB {
        public function showSalaryWage(){
            $sql ="SELECT tbl_information.Avatar, tbl_information.id_user, tbl_information.HoTen, tbl_lichsutangluong.maHSL, tbl_lichsutangluong.NgayTangHSL FROM tbl_information LEFT JOIN tbl_lichsutangluong ON tbl_information.id_user = tbl_lichsutangluong.id_user";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function showWage(){
            $sql ="SELECT * FROM tbl_hesoluong";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function checkSalaryWage($id_user){
            $sql = "SELECT `id_user` FROM `tbl_lichsutangluong` WHERE `id_user` = '$id_user'";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if(mysqli_num_rows($query) == 0){
                $result = true;
            }

            return json_encode($result);
        }

        public function addSalaryWage($id_user, $ma){
            $sql = "INSERT INTO `tbl_lichsutangluong`(`id_user`, `maHSL`) VALUES ('$id_user','$ma')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function editSalaryWage($id_user, $ma){
            $sql = "UPDATE `tbl_lichsutangluong` SET `maHSL`='$ma' WHERE `id_user` = '$id_user'";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function addhistory($id_user, $ghichu){
            $sql = "INSERT INTO `tbl_ghichutangluong`(`id_user`, `GhiChu`) VALUES ('$id_user','$ghichu')";
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
            $sql ="SELECT * FROM tbl_ghichutangluong";
            $query = mysqli_query($this->conn, $sql);
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }
    }
?>