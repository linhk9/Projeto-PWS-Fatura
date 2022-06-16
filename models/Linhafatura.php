<?php
    class Linhafatura extends \ActiveRecord\Model
    {
        static array $validates_presence_of = array(
            array('quantidade'),
            array('valor'),
            array('valoriva'),
            array('produto_id'),
            array('fatura_id')
        );


        static $belongs_to = array(
            array('Produto'),
            array('Fatura')
        );
    }
