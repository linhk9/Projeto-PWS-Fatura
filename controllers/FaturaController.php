<?php
    require_once './models/Fatura.php';
    use Carbon\Carbon;

    class FaturaController extends BaseAuthController
    {
        public function index()
        {
            $this->loginFilter();
            $this->renderView('fatura/index');
        }

    }
