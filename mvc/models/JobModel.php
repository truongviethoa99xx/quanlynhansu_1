<?php 
    class JobModel extends DB{
        public function showJob(){
            $sql = "SELECT tbl_information.HoTen, tbl_information.Avatar, tbl_hoso_cv.NgayBoNhiem, tbl_hoso_cv.NgayKetThucBoNhiem, tbl_chucvu.TenChucVu, tbl_hoso_cv.id_hoso FROM ((tbl_hoso_cv INNER JOIN tbl_information ON tbl_information.id_user = tbl_hoso_cv.id_user) INNER JOIN tbl_chucvu ON tbl_chucvu.MaChucVu = tbl_hoso_cv.MaChucVu)";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while ($data = $query->fetch_array()) {
                $list[] = $data;
            }

            return ($list);
        }

        public function custommer(){
            $sql = "SELECT `HoTen`, `id_user` FROM tbl_information";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function position(){
            $sql = "SELECT * FROM tbl_chucvu";
            $query = mysqli_query($this->conn, $sql);
            $list = array();
            while($data = mysqli_fetch_array($query)){
                $list[] = $data;
            }

            return $list;
        }

        public function deleteJob($id){
            $sql = "DELETE FROM `tbl_hoso_cv` WHERE `id_hoso` = '$id'";  
            $result = false;
            if(mysqli_query($this->conn, $sql))  
            {  
                $result = true; 
            }  

            return json_encode($result);
        }

        public function addJob($ngaybonhiem, $ngayketthuc, $id_user, $machucvu){
            $sql = "INSERT INTO `tbl_hoso_cv`(`NgayBoNhiem`, `NgayKetThucBoNhiem`,`id_user`,`MaChucVu`) VALUES ('$ngaybonhiem','$ngayketthuc','$id_user','$machucvu')";
            $query = mysqli_query($this->conn, $sql);
            $result = false;
            if ($query){
                $result = true;
            }
            return json_encode($result);    
        }

        public function editJob($id, $chucvu){
            $sql = "UPDATE `tbl_hoso_cv` SET `MaChucVu`='$chucvu' WHERE id_hoso = '$id'";
            $result = false;
            $query = mysqli_query($this->conn, $sql);
            if ($query){
                $result = true;
            }

            return json_encode($result);
        }
    }
?>