<?php
    require_once './controllers/BaseAuthController.php';
    require_once './models/Fatura.php';
    use Carbon\Carbon;

    class PlanoController extends BaseAuthController
    {
        public function index()
        {
            $this->loginFilter();
            $this->renderView('plano/index');
        }

        public function calcular()
        {
            $this->loginFilter();

            if(isset($_POST['valor'], $_POST['numPrest']))
            {
                $plano = new Fatura();
                $hoje = Carbon::now();
                $matriz = $plano->calculaPlano($_POST['valor'], $_POST['numPrest']);
                $this->renderView('plano/tabela', ['hoje' => $hoje, 'matriz' => $matriz]);
            }
            else
            {
                $this->redirectToRoute('plano', 'index');
            }
        }

    }
