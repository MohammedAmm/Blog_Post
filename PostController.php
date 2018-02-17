<?php
    include_once 'controller.php';
    include_once '../config.php';
    class PostController{
        public function index()
        {
            # code...
            $posts=Post::all();
            $categories=Category::all();
            render('index',array('pageTitle' => 'Manage Directory', 'posts' => $posts,'categories'=>$categories));
        }
        public function customIndex($cat){
            $cat=Category::find_by_name($cat);
            $posts=$cat->posts;
            $categories=Category::all();
            render('index',array('pageTitle' => $cat->name, 'posts' => $posts,'categories'=>$categories));

        }
        public function specificPost($id){
            $post=Post::find($id);
            $comments=$post->comments;
            render('post',array('pageTitle' => $post->title, 'post' => $post,'comments'=>$comments));
        }
        public function create(array $data)
        {
            $post = new Post();
            $post->user_id=$data['user_id'];
            $post->title=$data['title'];
            $post->body=$data['body'];
            $post->category_id=$data['category_id'];
            $post->save();
        }
        public function edit()
        {
            # code...

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


    }
    $uc=new PostController();
    if(isset($_GET['cat'])){
        $desiredCategory=$_GET['cat'];    
        $uc->customIndex($desiredCategory);
    }else if(isset($_GET['id'])){
        $desiredCategory=$_GET['id'];    
        $uc->specificPost($desiredCategory);
    }
    else{

        $uc->index();
    }
   
    
    $arr=[
       'user_id'=>1,    
       'title'=>'First Post',
       'body'=>'This is my first post',
       'category_id'=>1
    ];
  //  $uc->create($arr);
//   $cat=Category::find(1);
//     print_r($cat->posts); 
    //   $post=post::find(1) ;
    // print_r($post);     
    