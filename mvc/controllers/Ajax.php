<?php 
class Ajax extends Controller{
    public $AddModel;

    public function __construct(){
        $this->AddModel = $this->model("AddModel");
    }
    
    public function checkName(){
        $un = $_POST["un"];
        $kq = $this ->AddModel->checkName($un);
        if($kq == 'true'){
            echo "Tên hợp lệ";
        } else {
            echo "Tên đã tồn tại";
        }
        
    }
    

}
?>