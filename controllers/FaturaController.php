<?php
    require_once './models/User.php';
    require_once './models/Fatura.php';
    require_once './models/Linhafatura.php';

    class FaturaController extends BaseAuthController
    {
        public function index()
        {
            $clientes = User::find('all', array('role' => 'Cliente'));
            $this->renderView('fatura/index', ['clientes' => $clientes]);
        }

        public function produtos()
        {
            if(isset($_POST['cliente_id'])) {
                $produtos = Produto::all();

                $fatura = new Fatura();
                $auth = new Auth();
                $dataAtual =  date('Y-m-d H:i:s');

                $fatura->update_attributes(array(
                    'data' => $dataAtual,
                    'valortotal' => 0,
                    'ivatotal' => 0,
                    'estado' => 'Em Lancamento',
                    'cliente_id' => $_POST['cliente_id'],
                    'funcionario_id' => $auth->getUserId()
                ));
                if($fatura->is_valid()){
                    $fatura->save();
                }
                $faturaDB = Fatura::Find('first', array('data' => $dataAtual));
                $this->renderView('fatura/produtos', ['fatura_id' => $faturaDB->id, 'cliente_id' => $_POST['cliente_id'], 'produtos' => $produtos]);
            } else {
                $this->index();
            }
        }

        public function linhaFatura($cId, $fId, $pId)
        {
            if (isset($_POST['quantidade_'.$pId])) {
                $quantidade = $_POST['quantidade_'.$pId];
            }else{
                $quantidade = 1;
            }

            if(isset($cId, $fId, $pId, $quantidade))
            {
                $produtos = Produto::all();
                $produto = Produto::find('first', [$pId]);
                $fatura = Fatura::find([$fId]); 
                $linhaFatura = new Linhafatura();

                $linhaFatura->update_attributes(array(
                    'quantidade' => $quantidade,
                    'valor' => $quantidade * $produto->preco,
                    'valoriva' => $quantidade * (($produto->preco / 100)  * $produto->iva->percentagem),
                    'produto_id' => $produto->id,
                    'fatura_id' => $fId
                ));
                if($linhaFatura->is_valid()){

                    $fatura->update_attributes(array(
                        'valortotal' => $fatura -> valortotal + $linhaFatura -> valor,
                        'ivatotal' => $fatura -> ivatotal + $linhaFatura -> valoriva
                    ));
                    $linhaFatura->save();

                }
                
                if($fatura->is_valid()){
                    $fatura->save();
                }
                $this->renderView('fatura/produtos', ['fatura_id' => $fId, 'cliente_id' => $cId, 'produtos' => $produtos]);
            }
        }

        public function carrinho($cId, $fId)
        {
            if(isset($cId, $fId)) {
                $linhafaturas = Linhafatura::all(array('fatura_id' => $fId));


                $this->renderView('fatura/carrinho', ['fatura_id' => $fId, 'cliente_id' => $cId, 'linhafaturas' => $linhafaturas]);
            } else {
                $this->index();
            }
        }

        public function checkout($fId)
        {
            if(isset($fId, $_POST)) {
                $fatura = Fatura::find('first', array('id' => $fId));

                $fatura->update_attributes(array(
                    'valortotal' => $_POST['valorTotal'],
                    'ivatotal' => $_POST['valorIvaTotal'],
                    'estado' => 'Emitida'
                ));

                if($fatura->is_valid()){
                    $fatura->save();
                }
            }
            $this->index();
        }

        public function historico()
        {
            $faturas = Fatura::all();
            $clientes = User::all();
            $this->renderView('fatura/historico', ['faturas' => $faturas, 'clientes' => $clientes]);
        }
        public function delete($fId){
            $linhaFatura = Linhafatura::find([$fId]);
            $fatura = Fatura::find([$linhaFatura->fatura_id]); 
            if($linhaFatura->is_valid()){
                    $fatura->update_attributes(array(
                    'valortotal' => $fatura -> valortotal - $linhaFatura -> valor,
                    'ivatotal' => $fatura -> ivatotal - $linhaFatura -> valoriva
                ));                
                if($fatura->is_valid()){
                    $fatura->save();
                }
                $linhaFatura->delete();

            }
            $this->redirectToRoute('fatura','carrinho',['fId' => $fatura->id, 'cId' => $fatura->cliente_id]);
        }
    }