<?php
class Cliente_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('canje_model');
    }
    public $CONDICION = '2015-06-01';
    public function LoadClients(){
       /* $i=0;
        $json = array();
        $query = $this->sqlsrv->fetchArray("SELECT CLIENTE,NOMBRE, RUC, DIRECCION,VENDEDOR FROM vtVS2_Clientes WHERE CLIENTE NOT IN(".$this->LoadAllClients().")",SQLSRV_FETCH_ASSOC);

        foreach($query as $key){
            $json['query'][$i]['NOMBRE']=$key['NOMBRE'];
            $json['query'][$i]['RUC']=$key['RUC'];
            $json['query'][$i]['DIRECCION']=$key['DIRECCION'];
            $json['query'][$i]['VENDEDOR']=$key['VENDEDOR'];
            $json['query'][$i]['CLIENTE']=$key['CLIENTE'];
            $i++;
        }
        return $json;
        $this->sqlsrv->close();*/
    }
    public function LoadClientsPuntos(){
        $this->db->where("ESTADOCLIENTE","0");
        $query = $this->db->get('view_bitacora');
        if($query->num_rows() <> 0){

            return $query->result_array();
        }
        return 0;
    }
    public function listarFacturas()
    {
      /*  $i=0;
        $json = array();
        $consulta = "SELECT FACTURA FROM vtVS2_Facturas_CL
                    UNION ALL
                    SELECT FACTURA FROM vtVS2_Facturas_AN";
        $query = $this->sqlsrv->fetchArray($consulta,SQLSRV_FETCH_ASSOC);
        foreach($query as $key){
            $json['query'][$i]['FACTURA']=$key['FACTURA'];
            $i++;
        }
        return $json;
        $this->sqlsrv->close();*/
        /*$consulta = "SELECT T1.CLIENTE, T0.NOMBRE AS NOMBRE_CLIENTE, T0.DIRECCION, T0.RUC, SUM(T1.TT_PUNTOS) AS PUNTOS, T0.MOROSO 
                        FROM dbo.vtVS2_Clientes T0 INNER JOIN vtVS2_Facturas_CL T1 ON T0.CLIENTE = T1.CLIENTE
                        GROUP BY T1.CLIENTE,T0.NOMBRE,T0.DIRECCION,T0.RUC,T0.MOROSO";*/

    }
    public function getAplicado($cliente)
    {
       /* $query = $this->db->query("SELECT IdCliente,SUM(DISPONIBLE) AS APLICADO FROM view_disponiblecliente WHERE IdCliente = '".$cliente."'
                                   GROUP BY IdCliente");
        if($query->num_rows() <> 0){
            return $query->result_array()[0]['APLICADO'];
        }return 0;*/
    }
    public function LoadClientsBaja()
    {
       /* $i=0;
        $json = array();
        $query = $this->sqlsrv->fetchArray("SELECT CLIENTE,NOMBRE, RUC, DIRECCION,VENDEDOR FROM vtVS2_Clientes WHERE CLIENTE IN(".$this->LoadAllClientsActivos().")",SQLSRV_FETCH_ASSOC);
            $json['query'][$i]['NOMBRE']= "";   $json['query'][$i]['RUC']= "";
            $json['query'][$i]['DIRECCION']= "";    $json['query'][$i]['VENDEDOR']= "";
            $json['query'][$i]['CLIENTE']= "";
        foreach($query as $key){
            $json['query'][$i]['NOMBRE']=$key['NOMBRE'];
            $json['query'][$i]['RUC']=$key['RUC'];
            $json['query'][$i]['DIRECCION']=$key['DIRECCION'];
            $json['query'][$i]['VENDEDOR']=$key['VENDEDOR'];
            $json['query'][$i]['CLIENTE']=$key['CLIENTE'];
            $i++;
        }
        return $json;
        $this->sqlsrv->close();*/
    }
    public function ajaxFacturasXcliente($IdCliente){

        $json = array();
        $i=0;
        $this->db->where('idBitacora',$IdCliente);
        $query = $this->db->get('bitacora_log');

        if($query->num_rows() <> 0){
            foreach ($query->result_array() as $key) {
                $json['data'][$i]["VIA"] = $key['viaNombre'];
                $json['data'][$i]["STATUS"] = $key['Status'];
                $json['data'][$i]["ACTUALIZADO"] = $key['dtActualizado'];
                $i++;
            }
        }else{
            $json['data'][$i]["VIA"] = 0;
            $json['data'][$i]["STATUS"] = 0;
            $json['data'][$i]["ACTUALIZADO"] = 0;

        }
        echo json_encode($json);

    }
    public function LoadAllClients(){
        $query = $this->db->get("vt_ClientesUser");
        $clientes="";
        if($query->num_rows() <> 0){
            foreach ($query->result_array() as $row){
                $clientes .= "'".$row['CLIENTES']."',";
            }
            $clientes = substr($clientes, 0, -1);         
        }
        return $clientes;
    }
    public function LoadAllClientsActivos(){
        $query = $this->db->get('view_ClientesActivos');
        $clientes="";
        if($query->num_rows() <> 0){
            foreach ($query->result_array() as $row){                   
                $clientes .= "'".$row['CLIENTES']."',";
            }
            $clientes = substr($clientes, 0, -1);         
        }
        return $clientes;
    }
    public function getVia()
    {
        $this->db->select('*');
        $this->db->from('bitacora_via');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function getClientes()
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('Rol','Cliente');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function traerUsuario($codigo)
    {
        $this->db->where('IdCL',$codigo);
        $query = $this->db->get('usuario');
        if ($query->row('Usuario')!="") {
            echo $query->row('Usuario');
        }else{
            echo 0;
        }
    }
    public function FindClient($cond){
        $consulta = str_replace('%20', ' ', $cond);
        $buscar = $this->sqlsrv->fetchArray("SELECT * from vtVS2_Clientes where NOMBRE ='".$consulta."'",SQLSRV_FETCH_ASSOC);

        $id=$buscar[0]['CLIENTE'];
        $cliente=$buscar[0]['NOMBRE'];
        $this->sqlsrv->close();
    }
    public function generarUsuarios($codigo,$nombre,$vendedor)
    {
        $usuario = $this->sqlsrv->fetchArray("SELECT dbo.ABREV_CL('".$nombre."') as USUARIO",SQLSRV_FETCH_ASSOC);
        $this->sqlsrv->close();
        foreach ($usuario as $key) {
            $usuario = $key['USUARIO'];
        }
        if ($usuario != "") {
            $clave = $this->generarClave($usuario);
            $this->db->where('Clave',$clave);
            $this->db->where('Usuario',$usuario);
            $this->db->where('Estado',0);
            $query = $this->db->get('usuario');
            if($query->num_rows() == 0){
                $data = array('Usuario' => $usuario,
                            'Nombre' => $nombre,
                            'Clave' => $clave,
                            'Rol' => "Vendedor",
                            'IdCL' => $codigo,
                            'Cliente' => $nombre,
                            'Estado' => 0,
                            'Zona' => $vendedor,
                            'FechaCreacion' => date('Y-m-d h:i:s')
                );
            $this->db->insert('usuario',$data);
            }
        }
    }
    public function generarClave($nombre)
    {
        $resultado = substr($nombre, -(strlen($nombre)), 2);
        return $resultado.(rand(1000,9999));
    }
    public function darBajaCliente($codigo)
    {
        $data = array('Estado' => 1);
        $this->db->where('IdCL',$codigo);
        $this->db->update('usuario',$data);
    }
    public function ListarClientes()
    {

        /*$this->db->select('*');
        $this->db->from('Vendedor');
        $this->db->where('Estado',0);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }*/
    }
}