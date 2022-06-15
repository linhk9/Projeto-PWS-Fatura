<?php
    class User extends \ActiveRecord\Model
    {
        static array $validates_presence_of = array(
            array('percentagem'),
            array('descricao'),
            array('vigor'),
        );
    }