$(document).ready(function() {
    tablaproductos = $('#tablaproductos').DataTable({
        "processing": true,
        "serverSide": true,
        "sAjaxSource": "../dashboard/bd/cargar.php",
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
        },
        "lengthMenu": [ 10, 25, 50, 75, 100, 200, 500 ]
    });

    new $.fn.dataTable.Buttons( tablaproductos, {
        buttons: [
            'pdf', 'excel'
        ]   
    });

    tablaproductos.buttons( 0, null ).container().prependTo(
        tablaproductos.table().container()
    );

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

    $.ajax({
        url: '../dashboard/bd/estados.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 7, 
            id: id
        }, 
        success: function(data) {
            
            let inv = JSON.parse(data)[0].precio;
            if(inv == null){
                $("#pante").val("0");
            }else{
                $("#pante").val(inv);
            }
            
        }
    });

});

$("#formPersonas").submit(function(e){
    e.preventDefault();    

    id = $.trim($("#idpro").val());
    nombre = $.trim($("#nombre").val());
    codigo1 = $.trim($("#codigo1").val());
    codigo2 = $.trim($("#codigo2").val()); 
    marca = $.trim($("#marca").val());       
    modelopresentacion = $.trim($("#modelopresentacion").val());
    precio = $.trim($("#pventa").val());
    anio = $.trim($("#anio").val());
    comentario = $.trim($("#comentario").val());

    $.ajax({
            url: "../dashboard/bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {
                id: id,
                nombre:nombre, 
                codigo1:codigo1,
                codigo2:codigo2,
                marca:marca,
                modelopresentacion:modelopresentacion,
                precio:precio,
                anio:anio,
                comentario:comentario,
                opcion: 2
            },
            success: function(data){  
                    
                id = data[0].id;            
                nombre = data[0].nombre;
                Codigo1 = data[0].codigo1;
                Codigo2 = data[0].codigo2;
                Marca = data[0].marca;
                Modelopresentacion = data[0].modelo;
                anio = data[0].anio;
                Notas = data[0].descripcion;
                PrecioCompra = data[0].precio;
    
                tablaproductos.row(fila).data([id,Codigo1,Codigo2,nombre, Marca, Modelopresentacion, PrecioCompra, anio,Notas]).draw();
                $("#exampleModalCenter").modal("hide");
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