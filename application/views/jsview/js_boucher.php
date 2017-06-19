<script>
	$(document).ready(function() {
		$('#tblEliminar').DataTable({
            "scrollCollapse": true,
            "paging":         false,
            "info":    false,            
            "lengthMenu": [[5,10,50,100,-1], [5,10,50,100,"Todo"]],
            "language": {
                "zeroRecords": "NO HAY RESULTADOS",
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
	});

	$( "#ListCliente").change(function() {
        var Cls = $(this).val();

        if(Cls !=0){
                    $('#mitabla').html('');
            		$('#mitabla').html('<table id="tblEliminar" class="TblDatos"><thead><tr><th>FECHA</th><th>FACTURA</th><th>CLIENTE</th><th>PUNTOS</th><th>PUNTOS A RESTAR</th></tr></thead><tbody class="center"></tbody></table>');                    
            		$('#tblEliminar').DataTable({
                                ajax: "cargarDevoluciones/"+ Cls,
                                "info":    false,
                                "bPaginate": false,
                                "paging": false,
                                "pagingType": "full_numbers",
                                "emptyTable": "No hay datos disponibles en la tabla",
                                columns: [
                                    { "data": "FECHA" },
                                    { "data": "FACTURA" },
                                    { "data": "CLIENTE" },
                                    { "data": "DISPONIBLE" },
                                    { "data": "CAM1" },
                                ]
                            });
        }else{
            mensaje("SELECCIONE UN CLIENTE","error");
        }
    });
function anulacionParcial(factura) {
	$("#modal1").openModal();
	$("#puntos").html($('#ptos-'+factura).html());
	$("#factura").html($('#factu-'+factura).html());
    limpiarTabla(TbDetalleFactura);
        $('#TbDetalleFactura').DataTable({
                "order": [[ 1, "desc" ]],
                ajax: "detallefacturas/"+ $('#factu-'+factura).html(),
                "info":    false,
                "bPaginate": false,
                "paging": false,
                "pagingType": "full_numbers",
                "lengthMenu": [[10, -1], [10, "Todo"]],
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "lengthMenu": '_MENU_ ',
                    "search": '<i class=" material-icons">search</i>',
                    "loadingRecords": "cargando...",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última ",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                },
               columns: [
                    { "data": "ARTICULO" },
                    { "data": "DESCRIPCION" },
                    { "data": "CANTIDAD" },
                    { "data": "PUNTOS" },
                    { "data": "TOTAL" }
              ]
            });
            $('#TbDetalleFactura').on( 'init.dt', function () {
                $('#TbDetalleFactura').show();
                $('#loadIMG').hide();
            }).dataTable();
}
$('#btnProcesar').click(function(){
    //alert($('#clie-'+$('#factura').html()).html());
    var cantidad = parseInt($('#cantidad').val());
    var total = parseInt($('#ptos-'+$('#factura').html()).html());
    if ($('#cantidad').val()=="" || $('#observaciones').val()=="") {
        mensaje("INGRESE LOS CAMPOS REQUERIDOS","error");return false;
    }if (cantidad>total) {
        mensaje("LA CANTIDAD SUPERO LOS PUNTOS DISPONIBLES","error");return false;
    }
    else{
        var form_data = {
            factura: $('#factura').html(),
            cantidad: $('#cantidad').val(),
            observacion: $('#observaciones').val(),
            cliente: $('#clie-'+$('#factura').html()).html(),
            ttPuntos: $('#ptos-'+$('#factura').html()).html()
            };
            $.ajax({
                url: "aplicarDevolucion",
                type: "post",
                async:true,
                data: form_data,
                success:
                function(json){
                    if (json==1) {
                        mensaje("DEVOLUCION APLICADA CORRECTAMENTE");
                        window.setTimeout($(location).attr('href',"devoluciones"), 4000);
                    }else{mensaje("ERROR AL APLICAR LA DEVOLUCION, CONTACTE A SISTEMAS","error");}
                }
            });
    }
});
function mensaje(mensaje,clase) {
    var $toastContent = $('<span class="center">'+mensaje+'</span>');
	    if (clase == 'error'){
	        return Materialize.toast($toastContent, 3500,'rounded error');
	    }
	    return  Materialize.toast($toastContent, 3500,'rounded');    
	}
function limpiarTabla (idTabla) {
    idTabla = $(idTabla).DataTable();
    idTabla.destroy();
    idTabla.clear();
    idTabla.draw();
}
</script>