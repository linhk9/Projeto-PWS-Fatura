<?php
    class Produto extends \ActiveRecord\Model
    {
        static array $validates_presence_of = array(
            array('referencia'),
            array('descricao'),
            array('preco'),
            array('stock'),
            array('iva_id')
        );


        static $belongs_to = array(
            array('Iva')
        );
    }
