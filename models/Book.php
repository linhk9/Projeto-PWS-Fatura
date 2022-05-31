<?php
    class Book extends \ActiveRecord\Model
    {
        static array $validates_presence_of = array(
            array('name'),
            array('isbn', 'message' => 'It must be provided')
        );

        public static array $belongs_to = array(
            array('genre')
        );
    }