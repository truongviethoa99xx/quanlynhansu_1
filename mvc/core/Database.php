<?php
    // File connect database
    class DB{
        /* Properties */
        public $servername = "localhost";
        public $dbname = "quanlynhansu";
        public $username = "root";
        public $password = "";
        public $conn;
    
        function __construct() {
            // Hàm mysqli_connect được sử dụng để kết nối với một MySQL database server
            $this-> conn = mysqli_connect($this->servername, $this->username, $this->password);
            // hàm mysqli_select_db được sử dụng để chọn một cơ sở dữ liệu
            mysqli_select_db($this->conn, $this->dbname);
            // hàm mysqli_query() thực hiện một truy vấn đến database. utf8 de hien tieng viet
            mysqli_query($this->conn, "SET NAMES 'utf8'");
        }
    }
?>