<?php
    include_once 'controller.php';
    include_once '../config.php';
    class CommentController{
        public function index($id){
            $post=Post::find(id);
            $comments=$post->comments;
            if(isset($_SESSION['uname'])){
                render('post',array('pageTitle' => $post->title, 'post' => $post,'uname'=>$_SESSION['uname'],'user_id'=>$_SESSION['user_id'],'role'=>$_SESSION['role']));
            }else{
                render('post',array('pageTitle' => $post->title, 'post' => $post,'uname'=>'','user_id'=>'','role'=>''));
            }        

        }
        public function add($id,$body){
            $comment = new Comment();
            $comment->user_id=1;        
            $comment->post_id=$id;
            $comment->body = $body;
            $comment->save();
        }

    }
    $comCon=new CommentController();
    if(isset($_GET['post_id'])){
        $desiredId=$_GET['post_id']; 
        if(isset($_GET['comment'])){   
            $comCon->add($desiredId,$_GET['comment']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{

        }
    }
    else{
        $uc->index();
    }
  //  $uc->create($arr);
//   $cat=Category::find(1);
//     print_r($cat->posts); 
    //   $post=post::find(1) ;
    // print_r($post);     
    