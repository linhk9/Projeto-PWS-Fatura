<?php
    class ProdutoController extends BaseAuthController
    {
        public function index()
        {
            $produtos = Produto::all();
            $ivas = Iva::all();
            $this->renderView('produto/index', ['produtos' => $produtos, 'ivas' => $ivas]);
        }

        public function delete($id)
        {
            $produto = Produto::find([$id]);
            $produto->delete();
            $produto -> redirectToRoute('produto', 'index');
        }

        public function update($id){

            if(isset($_POST))
            {
                $produto = Produto::find([$id]);
                $produto->update_attributes($_POST);
                if($produto->is_valid()){
                    $produto->save();
                }
            }
            $produto -> redirectToRoute('produto', 'index');
        }

        public function create()
        {
            if(isset($_POST))
            {
                $produto = new Produto();

                $produto->update_attributes($_POST);
                if($produto->is_valid()){
                    $produto->save();
                }
                $produto -> redirectToRoute('produto', 'index');
            } else {
                $produto -> redirectToRoute('produto', 'index');
            }
        }
    }