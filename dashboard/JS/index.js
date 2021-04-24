$(document).ready(function() {
    tablaproductos = $("#tablaproductos").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar' data-toggle='modal' data-target='#exampleModalCenter'><i class='fas fa-eye'></i></button>&nbsp&nbsp<button class='btn btn-info btnproforma'><i class='fas fa-file-invoice-dollar'></i></button>&nbsp&nbsp<button class='btn btn-danger btnEliminar'><i class='fas fa-trash-alt'></i></button></div>"
        }],
      
        "order": [
            [1, 'asc']
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });
});

$(document).on("click", ".btnEditar", function(){    
    
    fila = $(this).closest("tr");
    id = fila.find('td:eq(0)').text();
    codigo1 = fila.find('td:eq(1)').text();
    codigo2 = fila.find('td:eq(2)').text();
    nombre = fila.find('td:eq(3)').text();
    marca = fila.find('td:eq(4)').text();
    modelo = fila.find('td:eq(5)').text();
    precio = parseInt(fila.find('td:eq(6)').text());
    anio = fila.find('td:eq(7)').text();
    comentario = fila.find('td:eq(8)').text();

    $("#nombre").val(nombre);
    $("#codigo1").val(codigo1);
    $("#codigo2").val(codigo2);
    $("#marca").val(marca);
    $("#modelopresentacion").val(modelo);
    $("#pventa").val(precio);
    $("#anio").val(anio);
    $("#comentario").val(comentario);
    $("#idpro").val(id);

});

$("#formPersonas").submit(function(e){
    e.preventDefault();    

    id = $.trim($("#idalmacen").val());
    nombre = $.trim($("#nombre").val());
    codigo1 = $.trim($("#codigo1").val());
    codigo2 = $.trim($("#codigo2").val()); 
    marca = $.trim($("#marca").val());       
    modelopresentacion = $.trim($("#modelopresentacion").val());
    precio = $.trim($("#pventa").val());
    anio = $.trim($("#anio").val());
    comentario = $.trim($("#comentario").val());
    
    //Indice para actualizar los productos
    agregarproducto = 4;

    let preventa = parseInt(precio);

    $.ajax({
            url: "../dashboard/bd/c.php",
            type: "POST",
            dataType: "json",
            data: {
                id: id,
                nombre:nombre, 
                codigo1:codigo1,
                codigo2:codigo2,
                marca:marca,
                modelopresentacion:modelopresentacion,
                pventa:preventa,
                anio:anio,
                comentario:comentario,
                opcion: 2,
            },
            success: function(data){  
                
                console.log(data);
                
                id = data[0].IDCodigoAlmacen;            
                nombre = data[0].NombreArticulo;
                Codigo1 = data[0].Codigo1;
                Codigo2 = data[0].Codigo2;
                Marca = data[0].Marca;
                Modelopresentacion = data[0].Modelopresentacion;
                Notas = data[0].Notas;
                PrecioCompra = data[0].PrecioCompra;
                precioVenta = data[0].precioVenta;
    
                tablaproductos.row(fila).data([id,Codigo1,Codigo2,nombre, Marca, Modelopresentacion, precioVenta, PrecioCompra, Notas]).draw();
                $("#modaUpdate").modal("hide");
            }        
        });    
});

$(document).on("click", ".btnproforma", function(){    
    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    let respuesta = confirm("Desea agregar a la proforma: "+id+"?");

    $.ajax({
        url: '../dashboard/bd/estados.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 1, 
            id: id
        }, 
        success: function(data) {
            //tablaproductos.row(fila.parents('tr')).remove().draw();
        }
    });
})

$(document).on("click", ".btnEliminar", function(){    
    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    let respuesta = confirm("Estas seguro que desea Eliminarlo: "+id+"?");

    $.ajax({
        url: '../dashboard/bd/estados.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 2, 
            id: id
        }, 
        success: function(data) {
            tablaproductos.row(fila.parents('tr')).remove().draw();
        }
    });
})