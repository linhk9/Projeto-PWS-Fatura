<?php
    class Fatura extends \ActiveRecord\Model
    {
        static array $validates_presence_of = array(
            array('data'),
            array('valortotal'),
            array('ivatotal'),
            array('estado'),
            array('cliente_id'),
            array('funcionario_id')
        );


        static $belongs_to = array(
            array('User')
        );
    }
