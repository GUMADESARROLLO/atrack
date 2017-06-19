<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vista_controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');

        if($this->session->userdata('logged')==0){ //No aceptar a usuarios sin loguearse
            redirect(base_url().'index.php/login','refresh');
        }
    }

    public function main(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        //$data['catalogo'] = $this->catalogo_model->traerCatalogoImg();

        $this->load->view('footer/footer');
        $this->load->view('jsview/js_catalogo');
    }

    public function DetalleFact(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/DetalleFact');
        $this->load->view('footer/footer');
    }

    public function Catalogo(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/Catalogo');
        $this->load->view('footer/footer');
    }
/*Funionalidad de Usuario*/

    public function Usuarios() {// CARGAR USUARIOS
        $query['Luser'] = $this->usuario_model->LoadUser();
        $query['Lrol'] = $this->usuario_model->LoadRol();
       // $query['Lven'] = $this->usuario_model->LoadVendedor();
        $query2 = $this->cliente_model->ListarClientes();
        //print_r($query['user']);

        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/Users',$query);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_usuarios');
    }

}