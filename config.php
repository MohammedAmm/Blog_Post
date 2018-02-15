<?php
require 'vendor/autoload.php';

use Philo\Blade\Blade;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new Blade($views, $cache);
//$content = 'tes doang';
//print $blade->view()->make('page', array('pageTitle' => 'Manage Directory', 'content' => $content));

function render($myPath,$myContext)
{
    global $blade;
    # code..
    print $blade->view()->make($myPath, $myContext);
}
