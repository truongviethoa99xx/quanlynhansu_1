<?php 
    class SalarySubsidizeModel extends DB {
        public function showSalarySubsidize(){
            $sql ="SELECT tbl_information.Avatar, tbl_information.id_user, tbl_information.HoTen, tbl_lichsuphucap.MaPhuCap, tbl_lichsuphucap.NgayPhuCap FROM tbl_information LEFT JOIN tbl_lichsuphucap ON tbl_information.id_user = tbl_lichsuphucap.id_user";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function showSubsidize(){
            $sql ="SELECT * FROM tbl_phucap";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function checkSalarySubsidize($id_user){
            $sql = "SELECT `id_user` FROM `tbl_lichsuphucap` WHERE `id_user` = '$id_user'";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if(mysqli_num_rows($query) == 0){
                $result = true;
            }

            return json_encode($result);
        }

        public function addSalarySubsidize($id_user, $ma){
            $sql = "INSERT INTO `tbl_lichsuphucap`(`id_user`, `MaPhuCap`) VALUES ('$id_user','$ma')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function editSalarySubsidize($id_user, $ma){
            $sql = "UPDATE `tbl_lichsuphucap` SET `MaPhuCap`='$ma' WHERE `id_user` = '$id_user'";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if($query){
                $result = true;
            }

            return json_encode($result);
        }

        public function addhistory($id_user, $ghichu){
            $sql = "INSERT INTO `tbl_ghichuphucap`(`id_user`, `GhiChu`) VALUES ('$id_user','$ghichu')";
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
            $sql ="SELECT * FROM tbl_ghichuphucap";
            $query = mysqli_query($this->conn, $sql);
            while ($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }
    }
?>