@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-8" >
        <form class="well form-horizontal" action="../controllers/PostController.php" method="post" enctype="multipart/form-data" id="contact_form">   
        <br>
        <br>
        <div class="form-control">
        <div class="card my-4">
        <input type="hidden" name="op" value="add">
        <h5 class="card-header">Add new post:</h5>
        <div class="form-control">
          <select class="form-control col-md-2" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            </div>
                        <div class="form-group">
            &nbsp&nbsp &nbspUpload Cover:<br>
                &nbsp&nbsp&nbsp&nbsp<input type="file" name="image">
            </div>
        <div class="card-body">
            <input type="text" class="form-control " name="title" placeholder="Title"/>            
            <div class="form-group">
                <textarea class="form-control" rows="6" name="body" placeholder="Add post here...."></textarea>
            </div>
            <input type="submit" class="btn btn-success" value="Add"/>
        </div>
        </div>         
        </div>   
        </form>
    </div>
</div>

@stop