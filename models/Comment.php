<?php
class Comment extends ActiveRecord\Model
{
    static $belongs_to = array(
        ['post'],
        ['user']
    );
}
