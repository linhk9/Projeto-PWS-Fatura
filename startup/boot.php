<?php
    require_once './vendor/autoload.php';

    const APP_NAME = 'Fatura+';
    const INVALID_ACCESS_ROUTE = 'c=login&a=index';

    ActiveRecord\Config::initialize(static function($cfg)
    {
        $cfg->set_model_directory('./models');
        $cfg->set_connections(
            array(
                'development' => 'mysql://root:@localhost/pws_fatura'
            )
        );
    });