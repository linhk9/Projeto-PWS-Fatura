<?php
    class EmpresaController extends BaseAuthController
    {
        public function index()
        {
            $empresas = Empresa::all();
            $this->renderView('empresa/index', ['empresas' => $empresas]);
        }

        public function delete($id)
        {
            $empresa = Empresa::find([$id]);
            $empresa->delete();
            $this->redirectToRoute('empresa', 'index');
        }

        public function update($id){

            if(isset($_POST))
            {
                $empresa = Empresa::find([$id]);
                $empresa->update_attributes($_POST);
                if($empresa->is_valid()){
                    $empresa->save();
                }
            }
            $this->redirectToRoute('empresa', 'index');
        }

        public function create()
        {
            if(isset($_POST))
            {
                $empresa = new Empresa();

                $empresa->update_attributes($_POST);
                if($empresa->is_valid()){
                    $empresa->save();
                }
                $this->redirectToRoute('site', 'index');
            } else {
                $this->redirectToRoute('empresa', 'index');
            }
        }
    }