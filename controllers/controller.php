<?php
    include_once '../php-activerecord/ActiveRecord.php';  
    include_once '../dbConfig.php';
    ActiveRecord\Config::initialize(function($cfg){
        global $db_userName,$db_password,$db_name;
        $cfg->set_model_directory('../models');
        $cfg->set_connections(array(
        "development" => "mysql://{$db_userName}:{$db_password}@localhost/{$db_name}"));
    });