@extends('layouts.master')
@section('content')
    <div class="row">
    <div class="col-md-9">
    <form >
        <div class="form-control">
        <table>
            <tr>
                <td>name</td>
                <td>status</td>
                <td>role</td>
                <td></td>
                <td></td>
                <td></td>   
                <td></td>                                             
            </tr>
            @foreach($users as $user)
                <tr>

                    <td>{{$user->username}}&nbsp</td>
                    @if($user->status==0)
                        <td>{{"inctive"}}&nbsp</td>
                    @elseif($user->status==1)
                        <td>{{"Active"}}&nbsp</td>   
                    @else
                        <td>{{"Deleted"}}&nbsp</td>   
                    @endif
                    @if($user->role==0)
                        <td>{{"Member"}}&nbsp</td>
                    @else
                        <td>{{"Admin"}}&nbsp</td>                
                    @endif
                    <td><a href="AdminController.php?id={{$user->id}}&&role">Admin</a></td>
                    <td><a href="AdminController.php?id={{$user->id}}&&state=1">Activate</a>   </td>  
                    <td><a href="AdminController.php?id={{$user->id}}&&state=0">Dectivate</a>   </td>                                                                               
                    <td><a href="AdminController.php?id={{$user->id}}&&state=2">Deleted</a>   </td> 
                </tr>
            @endforeach
        </table>
        </div>

    </form>
    </div>
    <div class="col-md-3">
                            <a href="AdminController.php?posts">Posts</a>
                            <br>
                            <a href="AdminController.php?comments">Comments</a>

    </div>
    </div>
@stop