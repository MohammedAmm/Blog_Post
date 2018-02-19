<?php
    include_once 'controller.php';
    include_once '../config.php';
    class PostController{
        public function index()
        {
            # code...
            $posts=Post::all(['conditions'=>'is_approved=1']);
            $categories=Category::all();
            if(isset($_SESSION['uname'])){
                render('index',array('pageTitle' => 'Manage Directory', 'posts' => $posts,'categories'=>$categories,'uname'=>$_SESSION['uname'],'user_id'=>$_SESSION['user_id'],'role'=>$_SESSION['role']));
            }else{
                render('index',array('pageTitle' => 'Manage Directory', 'posts' => $posts,'categories'=>$categories,'uname'=>'','user_id'=>'','role'=>''));
            }            

        }
        public function customIndex($cat){
            $cat=Category::find_by_name($cat);
            $posts=$cat->posts;
            $categories=Category::all();
            if(isset($_SESSION['uname'])){
                render('index',array('pageTitle' => 'Manage Directory', 'posts' => $posts,'categories'=>$categories,'uname'=>$_SESSION['uname'],'user_id'=>$_SESSION['user_id'],'role'=>$_SESSION['role']));
            }else{
                render('index',array('pageTitle' => 'Manage Directory', 'posts' => $posts,'categories'=>$categories,'uname'=>'','user_id'=>'','role'=>''));
            }  

        }
        public function specificPost($id){
            $post=Post::find($id);
            $comments=$post->comments;
            if(isset($_SESSION['uname'])){
                render('post',array('pageTitle' => $post->title, 'post' => $post,'comments'=>$comments,'uname'=>$_SESSION['uname'],'user_id'=>$_SESSION['user_id'],'role'=>$_SESSION['role']));
            }else{
                render('post',array('pageTitle' => $post->title, 'post' => $post,'comments'=>$comments,'uname'=>'','user_id'=>'','role'=>''));
            }  
        }
        public function create(array $data)
        {
            $imageName='';
            if(isset($_FILES['image'])){
                $imgError= '';
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];
                $tmp = explode('.', $file_name);
                $file_exten = end($tmp);
                $file_ext=strtolower($file_exten);
                $expensions= array("jpeg","jpg","png");
                
                if(in_array($file_ext,$expensions)=== false){
                   $imgError="extension not allowed, please choose a JPEG or PNG file.";
                }
                
                if($file_size > 5097152){
                   $imgError='File size must be excately 2 MB';
                }
                if($imgError){
                    $file_name='';
                }else{       
                   move_uploaded_file($file_tmp,"../public/images/".$file_name);
                   $imageName=$_FILES['image']['name'];

                }
            }
            $post = new Post();
            // $post->user_id=$data['user_id'];
            $post->user_id=1;            
            $post->title=$data['title'];
            $post->body=$data['body'];
            $post->image=$imageName;            
            $post->category_id=$data['category_id'];
            $post->save();
        }
        public function edit()
        {
            # code...

        }
        public function addPage()
        {
            # code...
            $categories=Category::all();
            render('addpost',array('pageTitle' => 'Add Post','categories'=>$categories));
        }
        public function update()
        {
            # code...

            $post = Post::find($id);  
            $post->title = "Some new title";
            $post->save();

            $_POST['post'] = array('title' => 'New Title', 'body' => 'New body!');
            $post = Post::find($id);
            $post->update_attributes($_POST['post']);
        }
        public function delete($id)
        {
            # code...
            $post = new Post();
            $post=Post::find($id);
            $post->delete();
        }

public function deleteComment($id){
            $comment=new Comment();
            $comment=Comment::find($id);
            $comment->delete();
        }


    }
    $uc=new PostController();
    if(isset($_GET['cat'])){
        $desiredCategory=$_GET['cat'];    
        $uc->customIndex($desiredCategory);
    }else if(isset($_GET['id'])){
        $desiredCategory=$_GET['id'];    
        $uc->specificPost($desiredCategory);
    }else if(isset($_GET['add'])){
        $uc->addPage();
    }else if(isset($_GET['delCom'])){
        $uc->deleteComment($_GET['id']);
    }else if(isset($_POST['op'])&&$_POST['op']=="add"){
        $uc->create($_POST);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        $uc->index();
    }
   
