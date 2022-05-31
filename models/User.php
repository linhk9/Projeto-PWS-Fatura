<?php
    class User extends \ActiveRecord\Model
    {
        static array $validates_presence_of = array(
            array('name'),
            array('password'),
            array('role')
        );
    }
