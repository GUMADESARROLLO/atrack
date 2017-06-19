var activo = false;
$(document).ready(function() {
//$('#AUsuario').openModal();
$('.datepicker').pickadate({ 
        selectMonths: true,selectYears: 15,format: 'dd-mm-yyyy',
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        showMonthsShort: undefined,showWeekdaysFull: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],today: 'Hoy',
        clear: 'BORRAR',close: 'CERRAR' });

    //$('#listaArticulosCatalogoActual').openModal();
    $('select').material_select();

    $(function() {//funcion para agregar el active en el menu, segun la pagina en la que se encuentre el usuario
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        $("ul a li").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' || $(this).attr("href")+"#" == pgurl)
            $(this).addClass("urlActual");
         })
    });

$('#tblCatalogoActual').DataTable( {
            "info":    false,
            "bPaginate": false,
            "lengthMenu": [[5,10,50,100,-1], [5,10,50,100,"Todo"]],
            "language": {
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "MOSTRAR _MENU_ REGISTORS",
                "search":     "BUSCAR"
            }
        });
$('#tblCatalogoPasado').DataTable( {
            "info":    false,
            "bPaginate": true,
            "lengthMenu": [[5,10,50,100,-1], [5,10,50,100,"Todo"]],
            "language": {
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "MOSTRAR _MENU_ REGISTROS",
                "search":     "BUSCAR"
            }
        });
$('#tblCatalogoActualModal').DataTable( {
            "scrollY":        "280px",
            "scrollCollapse": true,
            "paging":         false,
            "info":    false,
            "lengthMenu": [[5,10,50,100,-1], [5,10,50,100,"Todo"]],
            "language": {
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"                    
                },
                "lengthMenu": "MOSTRAR _MENU_",
                "emptyTable": "No hay datos disponibles en la tabla",
                "search":     "BUSCAR"
            }
        });
         $('#tblCatalogoActualModal tbody').on( 'click', 'tr', function () {
                var table2 = $('#tblCatalogoActualModal').DataTable();
                $('#tblCatalogoActualModal tbody').on( 'click', 'tr', function () {
                    $(this).toggleClass('selected');
                } );
            } );         
            $('#btnborrarSeleccionados').click( function () {
                var table2 = $('#tblCatalogoActualModal').DataTable();
                table2.row('.selected').remove().draw( false );
            } );
    /******Agregar clase Activo a items del Menú******/
    $(".nav li a").each(function() {
        if(this.href.trim() == window.location){
            $(this).parent().addClass("active");
            activo = true;
        }
    });
    if(!activo){
        $('.nav li a:first').addClass("active");
    }
    /****** Seccíon del Menú ******/

    /**** DATATABLES ****/
    $('#tblFREimpre,#TblMaVinetas,#MCXP,#BajaCliente,#tblModals').DataTable(
        {
            "info":    false,
            "searching": false,
            "bLengthChange": false,
            "lengthMenu": [[5,16,32,100,-1], [5,16,32,100,"Todo"]],
            "language": {
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu":"MOSTRAR _MENU_",
                "emptyTable": "No hay datos disponibles en la tabla",
                "search":     "<i class='material-icons'>search</i>" 
            }
        }
    );
   /**** END DATATABLES ****/

    $('.modal-trigger').leanModal();// INICIAR LOS MODALES
    Materialize.toast();
    //CARGAR LOS CLIENTES Y/O VENDEDORES EN EL SELECT (AGREGAR USUAARIO AL SISTEMA)
    $("#rol").change(function(){
       /* $("#vendedor").attr("disabled","disabled"); // inhabilitar el select
        str = $( "#rol option:selected" ).val();

        if(str=="Vendedor"||str=="Cliente"){
            if (str=="Vendedor"){
                str = "LoadVendedores";
            }else {
                str = "LoadCliente";
            }

            $.ajax({
                url: str,
                type: "get",

                async:true,
                success:
                    function(){
                        $("#vendedor").removeAttr("disabled");// habilitar el select
                        $("#vendedor").load(str);
                    }
            });

        }else{
            $("#vendedor option").remove();
        }*/
    });// FIN CARGAR LOS CLIENTES Y/O VENDEDORES EN EL SELECT (AGREGAR USUAARIO AL SISTEMA

    /********/
    $('#ClienteAdd tbody').on( 'click', 'tr', function () {
        if($(this).hasClass('odd')){
            $(this).removeClass('odd');
            $(this).toggleClass('selected');
        }else{
            $(this).removeClass('even');
            $(this).toggleClass('selected');
        }
    } );
} );//Fin Document ready

/* FUNCIONES */
$( "#rol" ).change(function() {
    /*if (this.value=="Cliente") {
        $('#divOculto').show();
    }else{
        $('#divOculto').hide();
    }  */
});
function SaveUsuario(){
    var TODO = true;

    var objname     = $('#labelNombre');
    var objnPass    = $('#labelPass');
    var objnRol     = $('#labelRol');

    var mNombre     = $('#NombreUser');
    var mPas        = $('#Contra');
    var mRol        = $('#idRoles');

    objname.hide();
    objnPass.hide();
    objnRol.hide();

    if (mNombre.val()=="") {objname.show(); TODO = false;}
    if (mPas.val()=="") {objnPass.show();TODO = false;}
    if (mRol.val()==null) {objnRol.show();TODO = false;}
    if (TODO){
        var form_data = {
            Nombre:   mNombre.val(),
            pass:     mPas.val(),
            rol:     $("#idRoles option:selected").val()
        };
        $.ajax({
            url: "NuevoUsuario",
            data: form_data,
            type: "post",
            async:true,
            success:
                function(json){
                    if (json==1) {
                        mensaje('EL USUARIO SE AGREGÓ CORRECTAMENTE', "");
                        var myVar = setInterval(myTimer, 2000);
                    }else{
                        mensaje(json,"error");
                        $('#Adduser').show();$('.progress').hide();
                    }
                },
            error:
                function(XMLHttpRequest, textStatus, errorThrow){
                    Materialize.toast(textStatus+", -->: "+errorThrow, 3000);
                    $('#Adduser').show();$('.progress').hide();
                },
        });

    }

}
function EnviodeDatos(){
    var TODO = true;

    var objname     = $('#labelNombre');
    var objndoc     = $('#labelndoc');
    var objStatus   = $('#labelstatus');
    var objvia      = $('#labelvia');
    var objrol      = $('#labelRol');

    var mNombre     = $('#NombreUser');
    var mDoc        = $('#ndoc');
    var mStatus     = $('#status');
    var mVia        = $('#rol');
    var mClientes   = $('#rol1');

    objname.hide();
    objndoc.hide();
    objStatus.hide();
    objvia.hide();
    objrol.hide();

    if (mNombre.val()=="") {objname.show(); TODO = false;}
    if (mDoc.val()=="") {objndoc.show();TODO = false;}
    if (mStatus.val()=="") {objStatus.show();TODO = false;}
    if (mVia.val()==null) {objvia.show();TODO = false;}
    if (mClientes.val()==null) {objrol.show();TODO = false;}

    if (TODO){
        var form_data = {
            cliente: $("#rol1 option:selected").val(),
            doc:     mDoc.val(),
            pro:     mNombre.val(),
            via:     $("#rol option:selected").val(),
            viaN:    $("#rol option:selected").text(),
            status:  mStatus.val()
        };
        $('#Adduser').hide();$('.progress').show();
        $.ajax({
            url: "addBitacora",
            data: form_data,
            type: "post",
            async:true,
            success:
                function(json){
                    if (json == 1) {
                        mensaje('REGISTRO GUARDADO', "");
                        var myVar = setInterval($(location).attr('href',"PuntosClientes"), 2000);
                    }else{
                        mensaje(json,"error");
                        $('#Adduser').show();$('.progress').hide();
                    }
                },
            error:
                function(XMLHttpRequest, textStatus, errorThrow){
                    Materialize.toast(textStatus+", -->: "+errorThrow, 3000);

                    $('#Adduser').show();$('.progress').hide();
                },
        });
    }
}
function getData(bit,cl){
    $('#spnBitacora').text(bit);
    $('#spnCliente').text(cl);

}
function ActualizarDatos(){
    var TODO = true;

    var objStatus   = $('#lblupdStado');
    var objvia      = $('#lblupdvia');


    var mStatus     = $('#updstatus');
    var mVia        = $('#updVia');

    objStatus.hide();
    objvia.hide();

    if (mStatus.val()=="") {objStatus.show();TODO = false;}
    if (mVia.val()==null) {objvia.show();TODO = false;}
    if (TODO){
        var form_data = {
            via:     $("#updVia option:selected").val(),
            viaN:     $("#updVia option:selected").text(),
            status:  mStatus.val(),
            cliente: $('#spnCliente').text(),
            bitacora: $('#spnBitacora').text()
        };
        //$('#Adduser').hide();$('.progress').show();
        $.ajax({
            url: "add_log",
            data: form_data,
            type: "post",
            async:true,
            success:
                function(json){
                    if (json == 1) {
                        mensaje('REGISTRO GUARDADO', "");
                        var myVar = setInterval($(location).attr('href',"PuntosClientes"), 2000);
                    }else{
                        mensaje(json,"error");
                        //$('#Adduser').show();$('.progress').hide();
                    }
                },
            error:
                function(XMLHttpRequest, textStatus, errorThrow){
                    Materialize.toast(textStatus+", -->: "+errorThrow, 3000);
                    $('#Adduser').show();$('.progress').hide();
                },
        });
    }
}

function mensaje (mensaje,clase) {
    var $toastContent = $('<span class="center">'+mensaje+'</span>');
    if (clase == 'error'){
        return Materialize.toast($toastContent, 3500,'rounded error');
    }
    return  Materialize.toast($toastContent, 3500,'rounded');    
}
function myTimer() {
    $(location).attr('href',"Usuarios");
}
function myTimer2() {
    Materialize.toast('SE GUARDARON LOS CAMBIOS EN EL CATALOGO, ESPERE..', 3000);
    $(location).attr('href',"NuevoCatalogo");
}
function myTimer3() {
    Materialize.toast('SE GUARDARON LOS CAMBIOS EN EL CATALOGO, ESPERE..', 3000);
    $(location).attr('href',"Catalogo");
}
//CAMBIAR DE ESTADO AL USUARIO EKISDE

/*function AddClients(){
    //$('#CsUser').openModal();
    $('#ClienteAdd tr').each( function () {
        if($(this).is('.selected')) {
            var cliente = $(this).find("td").eq(0).html();

            console.log(cliente);
            var patron="%20";

            var cadena=cliente.replace(patron,'');
            console.log(cadena);
            $.ajax({
                url: "FindClient/"+cadena,
                type: "post",
                async:true,
                success: function(json){
                   $(location).attr('Clientes');
                }
            });

        }

    });
}*/

$('#cambiarPass').click(function(){
    if ($('#pass1').val()=="") {
        mensaje("DIGITE UNA CONTRASEÑA","error");$('#pass1').focus();return false;
    }if ($('#pass2').val()=="") {
        mensaje("CONFIRME LA CONTRASEÑA","error");$('#pass2').focus();return false;
    }if ($('#pass2').val()=="") {
        mensaje("CONFIRME LA CONTRASEÑA","error");$('#pass2').focus();return false;
    }if ($('#pass2').val().length<8) {
        mensaje("LA CONTRASEÑA DEBE CONTENER AL MENOS 8 CARACTERES","error");$('#pass1').focus();return false;
    }if ($('#pass1').val()!=$('#pass2').val()) {
        mensaje("LAS CONTRASEÑAS NO COINCIDEN","error");$('#pass1').focus();return false;
    }else{
        $('#loadCambiarPass').show();
        document.getElementById("formNuevaPass").submit();
    }
});
    /*RECORRER LAS FILAS CHEKEADAS Y AGREGARLAS A LA TABLA DE CATALOGO ACTUAL EKISDE*/
    $('#addCatalogoAntiguo').click(function(){
         $("#tblCatalogoPasado input:checkbox:checked").each(function(index) {
            var valores = "";
            var table = $('#tblCatalogoActualModal').DataTable();
            var campo1 = "";
            var campo2 = "";
            var campo3 = "";
            var campo4 = ""; var campo5 = ""; var bandera = 0; 
            $(this).parents("tr").find("td").each(function(){
                switch($(this).parent().children().index($(this))) {//obtengo el index de la columna EKISDE
                    case 0:
                        campo1 = $(this).html();
                        break;
                    case 1:
                        campo2 = $(this).html();
                        break;
                    case 2:
                        campo3 = $(this).html();
                        break;
                    case 3:
                        campo4 = $(this).html()+'<input id="'+campo1+'" type="hidden" value="'+$('#cmbCatalogos').val()+'"/>';
                        break;
                    case 5:
                        campo5 = $(this).html();
                        break;
                    default:x="";
                }
            });/*valido si el articulo ya esta agregado*/
            table.cells().eq(0).each( function ( index ) {
                var cell = table.cell(index);             
                var data = cell.data();
                if (campo1 == data) {bandera=1;};
            } );
            if (bandera == 0) {
            table.row.add([
                        campo1,
                        campo2,
                        campo3,
                        campo4
                    ]).draw(false);var $toastContent = $('<span class"center">ARTÍCULO AGREGADO</span>');
            Materialize.toast($toastContent, 3500,'rounded');
            }
            else{
                var $toastContent = $('<span class="center">EL ARTICULO: <h6 class="negra noMargen">"'+campo2+'"</h6> YA ESTA AGREGADO</span>');
                Materialize.toast($toastContent, 3500,'rounded error');
            }
        });
    });

    function ActualizarPuntos(codImagen,IdCatalogo) {
        $('#tblCatalogoActual').hide();
        $('.progress2').show();
        $.ajax({
            url: "actualizarPuntos/"+codImagen+"/"+IdCatalogo+"/"+$('#'+codImagen).val(),
            type: "get",
            async:true,
            success: function(json){
                $(location).attr('href','NuevoCatalogo');
            }
        });
        //$('#tblCatalogoActual').show();
    }

    function darBaja(r){
         var table = $('#tblCatalogoActualModal').DataTable();
         
            $('#tblCatalogoActualModal tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );         
            $('#button').click( function () {
                table.row('.selected').remove().draw( false );
            } );
    }
