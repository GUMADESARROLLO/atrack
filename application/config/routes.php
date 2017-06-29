<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/******** MIS RUTAS **********/
// LOGIN
$route['login'] = 'login_controller/Acreditar';
$route['salir'] = 'login_controller/Salir';
$route['cambiarPass'] = 'login_controller/cambiarPass';
// FIN LOGIN

// RUTAS MENU
$route['Main'] = 'vista_controller/main';

/* CLIENTES */
$route['Clientes'] = 'clientes_controller/Clientes';
$route['FindClient/(:any)'] = 'clientes_controller/FindClient/$1';
$route['BajaClientes'] = 'clientes_controller/BajaClientes';
$route['PuntosClientes'] = 'clientes_controller/PuntosClientes';
$route['generarUsuarios'] = 'clientes_controller/generarUsuarios';
$route['traerUsuario/(:any)'] = 'clientes_controller/traerUsuario/$1';
$route['darBajaCliente'] = 'clientes_controller/darBajaCliente';
$route['DetalleFact'] = 'vista_controller/DetalleFact';
$route['estadoCuenta'] = 'clientes_controller/estadoCuenta';
$route['buscarEstadoCuenta'] = 'clientes_controller/buscarEstadoCuenta';
$route['ajaxFacturasXcliente/(:any)'] = 'clientes_controller/ajaxFacturasXcliente/$1';

/*DEVOLUCIONES*/
$route['devoluciones'] = 'boucher_controller';
$route['cargarDevoluciones/(:any)'] = 'boucher_controller/cargarDevoluciones/$1';
$route['aplicarDevolucion'] = 'boucher_controller/aplicarDevolucion';

/*BOUCHER*/
$route['EliminarVineta'] = 'boucher_controller';

/*CANNJES FRP*/
$route['Frp'] = 'canje_controller';
$route['getBCMora/(:any)'] = 'canje_controller/getBCMora/$1';
$route['ListarClientes'] = 'clientes_controller/ListarClientes';
$route['getAplicadoP/(:any)'] = 'canje_controller/getAplicadoP/$1';
$route['getFacturaFRP/(:any)'] = 'canje_controller/getFacturaFRP/$1';
$route['BuscaFRP/(:any)'] = 'canje_controller/BuscaFRP/$1';
$route['saveFRP'] = 'canje_controller/SaverFRP';
$route['viewPtsItemCatalogo'] = 'canje_controller/getPuntosArticulosCatalogo';
$route['ExpFRP/(:any)'] = 'exportacion_controller/ExpoFrp/$1';
$route['getviewFRP'] = 'canje_controller/viewFrp';
$route['delFRP'] = 'canje_controller/inactivar';

/*CANJES FRE*/
$route['FRE'] = 'canje_efectivo_controller';
$route['getFacturaFRE/(:any)'] = 'canje_efectivo_controller/getFacturaFRE/$1';
$route['BuscaFRE/(:any)'] = 'canje_efectivo_controller/BuscaFRE/$1';
$route['saveFRE'] = 'canje_efectivo_controller/SaverFRE';
$route['getviewFRE'] = 'canje_efectivo_controller/viewFre';
$route['delFRE'] = 'canje_efectivo_controller/inactivar';

/*USUARIOS*/
$route['Usuarios'] = 'vista_controller/Usuarios'; //cargar usuarios
$route['NuevoUsuario'] = 'Usuario_controller/addUser'; //agregar usuario
$route['addBitacora'] = 'Usuario_controller/addBitacora';
$route['add_log'] = 'Usuario_controller/add_log';
$route['ActUser/(:any)/(:any)'] = 'Usuario_controller/ActUser/$1/$2'; //cambiar estado de usuario
$route['LoadVendedores'] = 'Usuario_controller/LoadVendedor';
$route['LoadCliente'] = 'Usuario_controller/LoadClient';// cargar los clientes
/*USUARIOS*/

// RUTA FACTURAS
$route['facturas'] = 'facturas_controller';
$route['detallefacturas/(:any)'] = 'facturas_controller/detallefacturas/$1';

// RUTA REPORTES
$route['Reportes'] = 'reportes_controller';
$route['cuentaXcliente'] = 'reportes_controller/cuentaXcliente';
$route['datosCliente/(:any)'] = 'reportes_controller/datosCliente/$1';
$route['masterClientes/(:any)/(:any)'] = 'reportes_controller/masterClientes/$1/$2';
$route['masterCompras/(:any)/(:any)'] = 'reportes_controller/masterCompras/$1/$2';
$route['canjePremios/(:any)/(:any)'] = 'reportes_controller/canjePremios/$1/$2';
$route['masterFacturas/(:any)/(:any)'] = 'reportes_controller/masterFacturas/$1/$2';
$route['reporteXfecha/(:any)/(:any)'] = 'reportes_controller/reporteXfecha/$1/$2';
$route['movimientoProductos/(:any)/(:any)'] = 'reportes_controller/movimientoProductos/$1/$2';
$route['clientes_nuevos/(:any)/(:any)'] = 'reportes_controller/clientes_nuevos/$1/$2';
$route['mas_vendidos/(:any)/(:any)'] = 'reportes_controller/mas_vendidos/$1/$2';
$route['menos_vendidos/(:any)/(:any)'] = 'reportes_controller/menos_vendidos/$1/$2';
$route['puntosXcliente/(:any)/(:any)'] = 'reportes_controller/puntosXcliente/$1/$2';
$route['canjes/(:any)/(:any)'] = 'reportes_controller/canjes/$1/$2';
$route['canje_premios/(:any)/(:any)'] = 'reportes_controller/canje_premios/$1/$2';
$route['detalles_canje/(:any)/(:any)'] = 'reportes_controller/detalles_canje/$1/$2';
$route['CXCprint/(:any)/(:any)/(:any)'] = 'reportes_controller/CXCprint/$1/$2/$3';
$route['informeFactura/(:any)'] = 'reportes_controller/informeFactura/$1';
$route['informeFacturaAnu/(:any)'] = 'reportes_controller/informeFacturaAnu/$1';
$route['puntosXclienteRuta/(:any)/(:any)'] = 'reportes_controller/puntosXclienteRuta/$1/$2';
$route['informeFrpXcliente/(:any)'] = 'reportes_controller/informeFrpXcliente/$1';


/*RUTAS DE CATALOGO*/
$route['NuevoCatalogo'] = 'catalogo_controller/NuevoCatalogo';
$route['Catalogo'] = 'catalogo_controller/index';
$route['subirImg'] = 'catalogo_controller/subirImg';
$route['crearCatalogo'] = 'catalogo_controller/crearCatalogo';
$route['verificarImg/(:any)'] = 'catalogo_controller/verificarImg/$1';//verifico si la imagen existe ekisde
$route['ActualizarEstadoArticulo'] = 'catalogo_controller/ActualizarEstadoArticulo';
$route['AjaxCatalogoPasado/(:any)'] = 'catalogo_controller/CatalogoPasado/$1';
$route['actualizarPuntos/(:any)/(:any)/(:any)'] = 'catalogo_controller/actualizarPuntos/$1/$2/$3';
$route['actualizarCatalogo'] = 'catalogo_controller/actualizarCatalogo';//ruta para guardar los nuevos articulos en el catalogo
$route['getArticulosInactivos'] = 'catalogo_controller/getArticulosInactivos';
$route['subirVariasImagenes'] = 'catalogo_controller/subirVariasImagenes';
$route['activarArticulos/(:any)'] = 'catalogo_controller/activarArticulos/$1';
// FIN CATALOGO

// RUTA IMPRESION
$route['DetalleFRP'] = 'impresion_controller/DetalleFRP';
$route['DetalleFRE/(:any)'] = 'impresion_controller/DetalleFRE/$1';
// FIN IMPRESION

// RUTA EXPORTACIÓN
$route['Exp_Clientes'] = 'exportacion_controller/ExpoClients';
$route['ExpPDF'] = 'exportacion_controller/ExpoPdf';
$route['ExpPDF_PuntosClientes'] = 'exportacion_controller/ExpPDF_PuntosClientes';
$route['ExpEXCEL_PuntosClientes'] = 'exportacion_controller/ExpEXCEL_PuntosClientes';
$route['pdfCTAxCLIENTE/(:any)/(:any)/(:any)'] = 'exportacion_controller/pdfCTAxCLIENTE/$1/$2/$3';
$route['excelCTAxCLIENTE'] = 'exportacion_controller/excelCTAxCLIENTE';
$route['ExpPDFEstadoCuenta'] ='exportacion_controller/ExpPDFEstadoCuenta';
// FIN EXPORTACIÓN



//SERVICIO REST
$route['rLogin'] = 'rest_controller/rLogin';
$route['rProductos'] = 'rest_controller/rProductos';
$route['rHistorico'] = 'rest_controller/rHistorico';

