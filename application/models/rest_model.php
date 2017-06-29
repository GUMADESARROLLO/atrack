<?php
/**
 * Created by PhpStorm.
 * User: maryan.espinoza
 * Date: 28/06/2017
 * Time: 11:44
 */

class Rest_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function rLogin($usuario,$pass){
        $i=0;
        $rtnUsuario = array();

        $this->db->where('Usuario',$usuario);
        $this->db->where('Estado',0);
        $this->db->where('Clave',MD5($pass));
        $query = $this->db->get('usuario');

        if ($query->num_rows() > 0) {
            $Usuario = $query->result_array();
            $rtnUsuario['results'][0]['mExiste']  = true;
            $rtnUsuario['results'][0]['mId']      = $Usuario[0]['IdUsuario'];
            $rtnUsuario['results'][0]['mNombre']  = $Usuario[0]['Nombre'];
        }else{
            $rtnUsuario['results'][$i]['mExiste'] = false;
        }
        echo json_encode($rtnUsuario);
    }

    public function rProductos($id){
        $i=0;
        $aryProductos = array();

        $this->db->where('idcliente',$id);
        $query = $this->db->get('view_bitacora');

        if ($query->num_rows() > 0) {
            $C = $query->num_rows();
            foreach ($query->result_array() as $key) {
                $aryProductos['results'][$i]['mOk'] = true;
                $aryProductos['results'][$i]['mCount'] = $C;
                $aryProductos['results'][$i]['mId'] = $key['id'];
                $aryProductos['results'][$i]['mProducto'] = $key['producto'];
                $aryProductos['results'][$i]['mFactura'] = $key['factura'];
                $aryProductos['results'][$i]['mDOc'] = $key['ndoc'];
                $i++;
            }
        }else{
            $aryProductos['results'][$i]['mOk'] = true;
            $aryProductos['results'][$i]['mCount'] = 0;
        }
        echo json_encode($aryProductos);
    }
    public function rHistorico($id){
        $i=0;
        $aryProductos = array();
        $this->db->order_by("idLog", "desc");
        $this->db->where('idBitacora',$id);
        $query = $this->db->get('bitacora_log');

        if ($query->num_rows() > 0) {
            $C = $query->num_rows();
            foreach ($query->result_array() as $key) {
                $aryProductos['results'][$i]['mOk'] = true;
                $aryProductos['results'][$i]['mCount'] = $C;
                $aryProductos['results'][$i]['mVia'] = $key['viaNombre'];
                $aryProductos['results'][$i]['mStatus'] = $key['Status'];
                $aryProductos['results'][$i]['mFecha'] = $key['dtActualizado'];
                $i++;
            }
        }else{
            $aryProductos['results'][$i]['mOk'] = true;
            $aryProductos['results'][$i]['mCount'] = 0;
        }
        echo json_encode($aryProductos);
    }
}

