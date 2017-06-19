<header class="demo-header mdl-layout__header ">
    <div class="centrado  ColorHeader">

        <span class=" title">DEVOLUCION DE FACTURA</span>

    </div>
</header>
<main class="mdl-layout__content mdl-color--grey-100">
    <div class="row center TextColor">DEVOLUCION DE FACTURA</div>
    <div class="row">
        <div class="input-field col s12 m6 l6 offset-l3">
                <select class="chosen-select browser-default" name="cliente" id="ListCliente">
                    <option value="" disabled selected>CLIENTE</option>
                    <?php
                        if(!$data){}
                        else{
                                foreach($data as $asd){
                                    echo '<option value="'.$asd['CLIENTE'].'">'.$asd['NOMBRE'].'| '.$asd['CLIENTE'].'</option>';                                
                            }
                        }
                    ?>
                </select>
            </div>
    </div>
    <div class="contenedor ">
        <div class="datos" id="mitabla">
            <table id="tblEliminar" class="TblDatos">
                <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>FACTURA</th>
                        <th>CLIENTE</th>
                        <th>PUNTOS</th>
                        <th>PUNTOS A RESTAR</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div><!-- div Datos-->
    </div><!-- fin de Contenedor-->


    </div>
</main>


<!-- MODALES-->

<!-- Modal#1 Structure  muestra los datos a eliminar-->
<div id="modal1" class="modal">
    <div class="modal-content">

        <div class=" row">
            <div class="right col s1 m1 l1">
                <a href="#!" class=" BtnClose modal-action modal-close ">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
        </div>
        <h6  class="center Mcolor">INGRESE LA CANTIDDAD A ANULAR</h6>
        <div class="row center noMargen">            
            <h6  class="center Mcolor noMargen">FACTURA: <span class="mediana" id="factura">0.00</span></h6>            
        </div>
        <div class="row center noMargen">            
            <h6  class="center Mcolor noMargen">PUNTOS: <span class="mediana" id="puntos">0.00</span></h6>            
        </div>
        <div class="row noMargen">
            <div id="loadIMG" style="display:none" class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left"><div class="circle"></div></div>
                            <div class="gap-patch"><div class="circle"></div></div>
                        <div class="circle-clipper right"><div class="circle"></div></div>
                    </div>
                </div>
            <table id="TbDetalleFactura" class="TblDatos center">
                    <thead>
                        <tr>
                            <th>ARTICULO.</th>
                            <th>DESCRIPCIÓN</th>
                            <th>CANTIDAD.</th>
                            <th>PUNTOS</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>

                    <tbody></tbody>
                </table>
        </div>
        <div class="row center noMargen">
            <div class="input-field col s12">
                <h6  class="center Mcolor">CANTIDAD: <input maxlength="5" id="cantidad" onkeyup="if(/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="frp" type="text" class="validate"></h6>
            </div>
            <div class="noMargen input-field col s12">
                <p class="Datos">OBSERVACIONES</p>
                <textarea id="observaciones" class="mayuscula materialize-textarea observaciones"></textarea>
            </div>
        </div>
    </div>
    <div class="center row">
        <div class="input-field col s5 m4 l2 offset-s3 offset-m3 offset-l5">
            <a href="#" id="btnProcesar" class="Procesar waves-effect btn">procesar</a>
        </div>
    </div>

</div>
<!-- Fin de Modal#1-->