<?php

    require_once './models/Gestao.php';

    class GestaoController extends BaseAuthController
    {
        public function index()
        {
            $iva = Iva::all();
            if (isset($_POST)){
                
            }
            else{
                $this->redirectToRoute('site', 'index');
            }
        }

    }