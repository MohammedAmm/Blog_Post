<?php
    include_once 'controller.php';
    include_once '../config.php';
    class OperationController{
        public function signup(){
            render('signup',['pageTitle'=>'Sign Up','uname'=>'','user_id'=>""]);

        }
        public function signin(){
            render('login',['pageTitle'=>'Login','uname'=>'','user_id'=>""]);
        }
    }
    $op=new OperationController();
    if(!isset($_SESSION['uname'])){
        if(isset($_GET['op'])&&$_GET['op']=="signup"){
            $op->signup();
        }else if(isset($_GET['op'])&&$_GET['op']=="signin"){
            $op->signin();
        }
    }else{
        header('Location:PostController.php ');
    }
  