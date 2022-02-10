<?php 
    class Profile extends Controller{
        public $ProfileModel;

        public function __construct()
        {
            //model
            $this->ProfileModel = $this->model("ProfileModel");
        }
        

        public function show(){
            $profile = $this -> ProfileModel -> showProfile(1);

            $this->view('home', [
                "pages"=>"profileviews",
                "profile"=> $profile,
            ]);
        }
    }
?>