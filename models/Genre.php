<?php
    class Genre extends \ActiveRecord\Model
    {
        public static array $belongs_to = array(
            array('genre')
        );

    }