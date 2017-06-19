<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">

        <span class=" title">bitacora</span>

    </div>
</header>
<!--//////////////////////////////////////////////////////////
                CONTENIDO
///////////////////////////////////////////////////////////-->

<main class="mdl-layout__content mdl-color--grey-100">

    <div class="contenedor">

        <div class=" row TextColor center">
                 bitacora
        </div>

        <div class="container">
            <div class=" Buscar row column">

                <div class="col s1 m1 l1 offset-l3 offset-m2 ">
                    <i class="material-icons ColorS">search</i>
                </div>

                <div class="input-field col s11 m5 l5">
                    <input  id="searchPtsClientes" type="text" placeholder="Buscar" class="validate">
                    <label for="searchPtsClientes"></label>
                </div>

            </div>
        </div>
        <div class="right row">
            <a href="#AUsuario" class="BtnBlue waves-effect  btn modal-trigger ">AGREGAR</a>
        </div>
    <form action="" name="FrmPuntosClientes" id="FrmPuntosClientes" method="post"> <!--Exportar datos a EXCEL -->
        <table id="PtosCliente" class=" TblDatos">
            <thead>
            <tr>
                <th>HISTORIAL</th>
                <th>BITACORA.</th>
                <th>CLIENTE</th>
                <th>PRODUCTO</th>
                <th>Nº DE DOC</th>
                <th>VIA</th>
                <th>STATUS</th>
                <th>VER</th>
            </tr>
            </thead>
            <tbody>
                <?php
                if(!($Q_Bitacora)){

                }
                else{

                    foreach($Q_Bitacora AS $cliente){
                        $clase="";
                        echo "<tr>
                                    <td class='center green-text detallesFactura'><i id='detail".$cliente['id']."' class='material-icons'>remove_red_eye</i>
                                        <div id='loader".$cliente['id']."' style='display:none;' class='preloader-wrapper small active' >
                                            <div class='spinner-layer spinner-blue-only'>
                                            <div style='overflow: visible!important;' class='circle-clipper left'>
                                                <div class='circle'></div>
                                            </div><div class='gap-patch'>
                                                <div class='circle'></div>
                                            </div><div style='overflow: visible!important;' class='circle-clipper right'>
                                                <div class='circle'></div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                   <td class='".$clase." center'>".$cliente['id']."</td>
                                   <td class='".$clase." center'>".$cliente['Nombre']."</td>
                                   <td class='".$clase." id='NomCliente'>".$cliente['producto']."</td>
                                   <td class='".$clase." center'>".$cliente['ndoc']."</td>
                                   <td class='".$clase." center'>".$cliente['Via']."</td>
                                   <td class='".$clase." center'>".$cliente['Estado']."</td>
                                   <td class='".$clase." center'>"."<a onclick='getData(".$cliente['id'].",".$cliente['idcliente'].")'  href='#detalleFactura' class='modal-trigger noHover'><i class='material-icons'>create</i></a>"."</td>
                              </tr>";


                    }

                }
                ?>
            </tbody>
        </table>
    </form>
    </div>

</main>

<div id="AUsuario" class="modal">
    <div class="modal-content">
        <div class="btnCerrar right"><i style='color:red;' class="material-icons modal-action modal-close">highlight_off</i></div>

        <div class="row TextColor center">
            AGREGAR USUARIO VISYS
        </div>
        <div class="row">
            <form class="col s12"  method="post" name="formAddUser">
                <div class="row">
                    <div class="input-field col s12">
                        <select name="rol" id="rol1" class="chosen-select browser-default">
                            <option value="" disabled selected>CLIENTES</option>
                            <?PHP
                            if(!(Q_clientes)){
                            } else {
                                foreach($Q_clientes as $rol){
                                    echo '<option value="'.$rol['IdUsuario'].'">'.$rol['Nombre'].'</option>';
                                }
                            }
                            ?>
                        </select>
                        <label id="labelRol" class="labelValidacion">SELECCIONE EL CLIENTE</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="user" placeholder="Producto" id="NombreUser" type="text" class="required">
                        <label id="labelNombre" class="labelValidacion">DIGITE EL PRODUCTO</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 ">
                        <input name="pass" placeholder="Nº de DOC" id="ndoc" type="text" class="required">
                        <label id="labelndoc" class="labelValidacion">DIGITE EL Nº DE DC</label>
                    </div>
                </div>

                <div class="row"  >
                    <div class="input-field col s12 ">
                        <div class="input-field col s12">
                            <select name="rol" id="rol" class="chosen-select browser-default">
                                <option value="" disabled selected>VIA</option>
                                <?PHP
                                if(!($Q_via)){
                                } else {
                                    foreach($Q_via as $rol){
                                        echo '<option value="'.$rol['idvia'].'">'.$rol['VIA'].'</option>';
                                    }
                                }
                                ?>
                            </select>
                            <label id="labelvia" class="labelValidacion">SELECCIONE LA VIA</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 ">
                        <input name="status" placeholder="STATUS" id="status" type="text" class="required">
                        <label id="labelstatus" class="labelValidacion">DIGITE EL STATUS</label>
                    </div>
                </div>
                <div class="row center">
                    <div class="progress" style="display:none">
                        <div class="indeterminate violet"></div>
                    </div>
                    <a  class="Btnadd btn" id="Adduser"  onclick="EnviodeDatos()">GUARDAR</a>
                </div>
            </form>
        </div>
    </div><!-- FIN DEL CONTENIDO DEL MODAL -->
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Modales Detalles Facturas
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="detalleFactura" class="modal">
    <div class="modal-content">
        <div class=" row">
            <div class="right col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close noHover"><i class="material-icons">highlight_off</i></a>
            </div>
        </div>
        <div style="display: none">
            <span id="spnBitacora">b</span>
            <span id="spnCliente">C</span>
        </div>
        <div class="row">
            <div class="col s12">
                <div id="loadIMG" style="display:none" class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left"><div class="circle"></div></div>
                        <div class="gap-patch"><div class="circle"></div></div>
                        <div class="circle-clipper right"><div class="circle"></div></div>
                    </div>
                </div>
                <div class="row"  >
                    <div class="input-field col s12 ">
                        <div class="input-field col s12">
                            <select name="rol" id="updVia" class="chosen-select browser-default">
                                <option value="" disabled selected>VIA</option>
                                <?PHP
                                if(!($Q_via)){
                                } else {
                                    foreach($Q_via as $rol){
                                        echo '<option value="'.$rol['idvia'].'">'.$rol['VIA'].'</option>';
                                    }
                                }
                                ?>
                            </select>
                            <label id="lblupdvia" class="labelValidacion">SELECCIONE LA VIA</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 ">
                        <input name="status" placeholder="STATUS" id="updstatus" type="text" class="required">
                        <label id="lblupdStado" class="labelValidacion">DIGITE EL STATUS</label>
                    </div>
                </div>
                <div class="row center">
                    <div class="progress" style="display:none">
                        <div class="indeterminate violet"></div>
                    </div>
                    <a  class="Btnadd btn" id="Adduser"  onclick="ActualizarDatos()">ACTUALIZAR</a>
                </div>
            </div>
        </div>
    </div>
</div>