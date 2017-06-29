<?php
/**
 * Created by PhpStorm.
 * User: maryan.espinoza
 * Date: 28/06/2017
 * Time: 11:41
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class rest_controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Rest_model');
    }
    public function rLogin()
    {
            $name = $this->input->post('usuario');
        $pass = $this->input->post('pass');
        $this->Rest_model->rLogin($name, $pass);
    }
    public function rProductos()
    {
        $name = $this->input->post('id');
        $this->Rest_model->rProductos($name);
    }
    public function rHistorico()
    {
        $name = $this->input->post('id');
        $this->Rest_model->rHistorico($name);
    }
}