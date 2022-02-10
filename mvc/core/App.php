<?php 
   class App{
    // set default value
    protected $controller = "Login";
    protected $action = "show";
    protected $params = [];

        function __construct()
        {
            $arr = $this -> urlProcess();
            // print_r($arr);
            // Array ( [0] => Home [1] => Show [2] => 1 [3] => 2 )
            // Xu ly controller
            if ( file_exists("./mvc/controllers/".$arr[0].".php")){
                 // Neu co file thi controller co gia tri bang array phan tu thu [0]
                $this -> controller = $arr[0];
                // Sau khi su dung thi huy gia tri
                unset($arr[0]);
            }
            require_once "./mvc/controllers/". $this->controller .".php";
            $this -> controller  = new $this -> controller;
             // Khi khong co file thi controller co gia tri default la Home  
            
            // Xu ly action
            if (isset($arr[1])){
                // kiem tra trong file co ton tai function hay khong
                if (method_exists($this->controller, $arr[1])){
                    $this-> action = $arr[1];
                }
                unset($arr[1]);
            }
            // Xu ly params
            $this->params = $arr?array_values($arr):[];

            call_user_func_array([$this->controller, $this->action], $this->params);
            // để gọi các hàm có tên mà không biết trước 
            // nhưng chương trình phải tra cứu hàm khi chạy.
        }
        function urlProcess(){
            if( isset($_GET["url"]) ){
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
   }
?>