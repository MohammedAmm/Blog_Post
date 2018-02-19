@extends('layouts.master')
@section('content')
    <div class="row">
    <div class="col-md-9">
    <form >
        <div class="table-bordered">
        <table >
            <tr>
                <td>body</td>
                <td>Approved</td>
                <td>Rejected</td>
                <td></td>                                          
                <td></td>                                       
                                                      
            </tr>
            @foreach($comments as $comment)
                <tr style="">
                    <td style="width:70%;">{{$comment->body}}&nbsp</td>
                    @if($comment->is_approved==0)
                        <td>{{"Non-Approved"}}&nbsp</td>
                    @elseif($comment->is_approved==1)
                        <td>{{"Approved"}}&nbsp</td>   
                    @endif
                    @if($comment->rejected==0)
                        <td>{{"Valide"}}&nbsp</td>
                    @else
                        <td>{{"Rejected"}}&nbsp</td>                
                    @endif
                    <td><a href="AdminController.php?cid={{$comment->id}}&&approve">Approve</a></td>
                    <td><a href="AdminController.php?cid={{$comment->id}}&&reject">Reject</a>   </td>  
                </tr>
            @endforeach
            
        </table>
        </div>

    </form>
    </div>
    <div class="col-md-3">
                            <a href="AdminController.php?">Users</a>
                            <br>
                            <a href="AdminController.php?posts">Posts</a>

    </div>
    </div>
@stop