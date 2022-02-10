<?php 
    class DayOff extends Controller{
        public function show(){
            $this->view("home", [
                "pages"=> "tickets"
            ]);
        }
    }
?>