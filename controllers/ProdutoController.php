<?php
    class ProdutoController extends BaseAuthController
    {
        public function index()
        {
            $this->loginFilter();
            $produtos = Produto::all();
            $ivas = Iva::all();
            $this->renderView('produto/index', ['produtos' => $produtos, 'ivas' => $ivas]);
        }

        public function delete($id)
        {
            $produto = Produto::find([$id]);
            $produto->delete();
            $this->index();
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
            $this->index();
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
                $this->index();
            } else {
                $this->index();
            }
        }
    }