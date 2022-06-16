<?php
    class IvaController extends BaseAuthController
    {
        public function index()
        {
            $this->loginFilter();
            $ivas = Iva::all();
            $this->renderView('iva/index', ['ivas' => $ivas]);
        }

        public function delete($id)
        {
            $iva = Iva::find([$id]);
            $iva->delete();
            $this->redirectToRoute('iva', 'index');
        }

        public function update($id){

            if(isset($_POST))
            {
                $iva = Iva::find([$id]);
                $iva->update_attributes($_POST);
                if($iva->is_valid()){
                    $iva->save();
                }
            }
            $this->redirectToRoute('iva', 'index');
        }

        public function create()
        {
            if(isset($_POST))
            {
                $iva = new Iva();

                $iva->update_attributes($_POST);
                if($iva->is_valid()){
                    $iva->save();
                }
                $this->redirectToRoute('site', 'index');
            } else {
                $this->redirectToRoute('iva', 'index');
            }
        }
    }