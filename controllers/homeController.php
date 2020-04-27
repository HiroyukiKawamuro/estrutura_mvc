<?php
class homeController extends controller{
    public function index(){
//        echo "dentro do homeController";
        $this->loadView("home");
    }

}
