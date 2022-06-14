<?php
    class User extends \ActiveRecord\Model
    {
        static array $validates_presence_of = array(
            array('username'),
            array('password'),
            array('email'),
            array('role'),
            array('telefone'),
            array('morada'),
            array('codigopostal'),
            array('localidade'),
            array('nif')
        );
    }
