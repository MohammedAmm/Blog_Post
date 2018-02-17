<?php
class Post extends ActiveRecord\Model
{
    static $has_many = array(
        ['comments']
     );
    static $belongs_to = array(
            ['category'],
            ['user']
        );
}
