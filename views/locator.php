<?php
     include_once '../config.php';
     $content = 'tes doang';
     render('page',array('pageTitle' => 'Manage Directory', 'content' => $content));
   // print $blade->view()->make('page', array('pageTitle' => 'Manage Directory', 'content' => $content));
   
