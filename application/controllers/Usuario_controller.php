<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_controller extends CI_Controller
{

    // AGREGAR USUARIO
    public function addUser()
    {
        $user = $this->input->post('Nombre');
        $clave = $this->input->post('pass');
        $rol = $this->input->post('rol');
        $this->usuario_model->addUser($user, $clave, $rol);
    }
    public function addBitacora()
    {
        $cls = $this->input->post('cliente');
        $doc = $this->input->post('doc');
        $pro = $this->input->post('pro');

        $via = $this->input->post('via');
        $viaN = $this->input->post('viaN');
        $status = $this->input->post('status');


        $this->usuario_model->aBitcora($cls, $doc, $pro,$via,$status,$viaN);

    }
    public function add_log()
    {

        $via = $this->input->post('via');
        $status = $this->input->post('status');
        $bitacora = $this->input->post('bitacora');
        $Cliente = $this->input->post('cliente');
        $viaN = $this->input->post('viaN');


        $this->usuario_model->uptBitcora($via,$status,$bitacora,$Cliente,$viaN);

    }
    

    public function ActUser($IdUser, $Estado)
    {/*CAMBIAR ESTADO DE USUARIO*/
        $this->usuario_model->ActUser($IdUser, $Estado);
    }

    public function LoadClient()
    {//Cargar los clientes
        $this->usuario_model->LoadClient();
    }

    public function LoadVendedor()
    {//cargar los vendedores
        $this->usuario_model->LoadVendedores();
    }
}