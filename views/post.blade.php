@extends('layouts.master')
@section('content')
   <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4">{{$post->title}}</h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#">{{$post->user->fname." ".$post->user->lname}}</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>{{
                date("F jS, Y", strtotime( date_format($post->created_at, 'Y-m-d'))) }}</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

          <hr>
          <p>{{$post->body}}</p>
          <hr>

          <!-- Comments Form -->
        <form class="well form-horizontal" action="../controllers/CommentController.php" method="get"  id="contact_form">   
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <input type="hidden" name="post_id" value="{{$post->id}}"/>
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="comment"></textarea>
                </div>
                <input type="submit" class="btn btn-success" value="Add"/>
            </div>
          </div>
                    
              </form>

          <!-- Single Comment -->
          @foreach($comments as $comment)
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">{{$comment->user->fname." ".$comment->user->lname}}</h5>
                {{$comment->body}}
            </div>
          </div>
            <hr>
            @endforeach
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
@stop