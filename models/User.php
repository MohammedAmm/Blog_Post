<?php
    class User extends ActiveRecord\Model
    {
        static $has_many = array(
            ['posts'],
            ['comments']
        );
        
    }
