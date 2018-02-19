<?php
    include_once 'controller.php';
    include_once '../config.php';
    class AdminController{
        public function index(){
            $users=User::all();
            render('userspanel',array('pageTitle' => 'Admin Panel', 'users' => $users,'uname'=>$_SESSION['uname'],'user_id'=>$_SESSION['user_id'],'role'=>$_SESSION['role']));
        }
        public function updateRole($id){
            $user=User::find($id);
            $user->role=1;
            $user->save();
        }
        public function updateState($id,$status){
            $user=User::find($id);
            $user->status=$status;
            $user->save();
        }
        public function posts(){
            $posts=Post::all();
            render('postspanel',array('pageTitle' => 'Admin Panel', 'posts' => $posts,'uname'=>$_SESSION['uname'],'user_id'=>$_SESSION['user_id'],'role'=>$_SESSION['role']));

        }
        public function comments(){
            $comments=Comment::all();
            render('commentspanel',array('pageTitle' => 'Admin Panel', 'comments' => $comments,'uname'=>$_SESSION['uname'],'user_id'=>$_SESSION['user_id'],'role'=>$_SESSION['role']));

        }
        public function postReject($id){
            $post=Post::find($id);
            $post->rejected=1;
            $post->save();
        }
        public function postApprove($id){
            $post=Post::find($id);
            $post->is_approved=1;
            $post->save();
        }
        public function commentReject($id){
            $comment=Comment::find($id);
            $comment->rejected=1;
            $comment->save();
        }
        public function commentApprove($id){
            $comment=Comment::find($id);
            $comment->is_approved=1;
            $comment->save();
        }
    }
    $ac=new AdminController();
    if(isset($_SESSION['role'])&&$_SESSION['role']==1){
        if(isset($_GET['id'])&&isset($_GET['role'])){
            $ac->updateRole($_GET['id']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else if(isset($_GET['id'])&&isset($_GET['state'])){
            $ac->updateState($_GET['id'],$_GET['state']);    
            header('Location: ' . $_SERVER['HTTP_REFERER']);        
        }else if(isset($_GET['posts'])){
            $ac->posts();
        }else if(isset($_GET['pid'])&&isset($_GET['reject'])){
            $ac->postReject($_GET['pid']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);        

        }else if(isset($_GET['pid'])&&isset($_GET['approve'])){
            $ac->postApprove($_GET['pid']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);        
        }else if(isset($_GET['comments'])){
            $ac->comments();
        }else if(isset($_GET['cid'])&&isset($_GET['reject'])){
            $ac->commentReject($_GET['cid']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);        

        }else if(isset($_GET['cid'])&&isset($_GET['approve'])){
            $ac->commentApprove($_GET['cid']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);        
        }else{
            $ac->index();
        }
    }else{
        header('Location:PostController.php');
    }