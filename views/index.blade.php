@extends('layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
        @foreach($posts as $post)
        <div class="form-control">
          <!-- Title -->
          <h1 class="mt-4">{{$post->title}}</h1>
          <!-- Author -->
          <p class="lead">
            by
            <a href="#">{{$post->user->fname." ".$post->user->lname}}</a>
          </p>

          <hr>

          <p>{{
                date("F jS, Y", strtotime( date_format($post->created_at, 'Y-m-d'))) }}</p>
          <!-- Preview Image -->
          <img class="img-fluid rounded" src="../public/images/{{$post->image}}" alt="">
          <hr>

          <!-- Post Content -->
         <p>{{substr($post->body,0,110)."... "}}</p>
        <a href="PostController.php?id={{$post->id}}">Read more</a>

          <hr>
        </div>
       @endforeach
        </div>
      <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  @foreach($categories as $category)
                    <li>
                      <a href="../controllers/PostController.php?cat={{$category->name}}">{{$category->name}}</a>
                    </li>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          @if($uname)
          <div class="card my-4">
              <button class="btn btn-success"><a href="PostController.php?add">Add Post</a></button>
          </div>
         @endif
        </div>
     
      </div>
      <!-- /.row -->

    </div>

@stop