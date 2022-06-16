<?php
    class Empresa extends \ActiveRecord\Model
    {
        static array $validates_presence_of = array(
            array('designacaosocial'),
            array('email'),
            array('telefone'),
            array('nif'),
            array('morada'),
            array('codigopostal'),
            array('localidade'),
            array('capitalsocial')
        );
    }
