@extends('layouts.master')
@section('content')
    <div class="row">
    <div class="col-md-9">
    <form >
        <div class="table-bordered">
        <table >
            <tr>
                <td>title</td>
                <td>body</td>
                <td>Approved</td>
                <td>Rejected</td>
                <td>Category</td>    
                <td></td>                                          
                <td></td>                                       
                                                      
            </tr>
            @foreach($posts as $post)
                <tr style="">
                    <td >{{$post->title}}&nbsp</td>                    
                    <td style="width:70%;">{{$post->body}}&nbsp</td>
                    @if($post->is_approved==0)
                        <td>{{"Non-Approved"}}&nbsp</td>
                    @elseif($post->is_approved==1)
                        <td>{{"Approved"}}&nbsp</td>   
                    @endif
                    @if($post->rejected==0)
                        <td>{{"Rejected"}}&nbsp</td>
                    @else
                        <td>{{"Valide"}}&nbsp</td>                
                    @endif
                    <td><a href="AdminController.php?pid={{$post->id}}&&approve">Approve</a></td>
                    <td><a href="AdminController.php?pid={{$post->id}}&&reject">Reject</a>   </td>  
                </tr>
            @endforeach
            
        </table>
        </div>

    </form>
    </div>
    <div class="col-md-3">
                            <a href="AdminController.php?">Users</a>
                            <br>
                            <a href="AdminController.php?comments">Comments</a>

    </div>
    </div>
@stop