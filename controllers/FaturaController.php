<?php
    require_once './models/Fatura.php';

    class FaturaController extends BaseAuthController
    {
        public function index()
        {
            $this->loginFilter();
            $this->renderView('fatura/index');
        }

    }
