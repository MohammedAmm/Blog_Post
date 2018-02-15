<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{{ $pageTitle }}}</title>

    <!-- Bootstrap -->
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../assets/html5shiv.min.js"></script>
    <script src="../assets/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@section('sidebar')
    This is the master sidebar.
@show

@yield('content')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../assets/jquery/jquery-1.11.1.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../assets/bootstrap/js/bootstrap.js"></script>
</body>
</html>