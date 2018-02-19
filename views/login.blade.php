@extends('layouts.master')
@section('content')
<div class="container">
<form class="well form-horizontal" action="RegisterController.php" method="post"  id="contact_form">
<input type="hidden" name="op" value="signin">
<fieldset>
<!-- Form Name -->
<legend><center><h2><b>Login Form</b></h2></center></legend><br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Username</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="username" placeholder="Username" class="form-control"  type="text">
    </div>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="password" placeholder="Password" class="form-control"  type="password">
    </div>
  </div>
</div>
&nbsp&nbsp&nbsp<input type="checkbox" name="remember">&nbsp&nbsp&nbsp RememberMe
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>
</fieldset>
</form>
</div>
</div><!-- /.container -->
<br><br><br><br><br><br><br>

@stop
