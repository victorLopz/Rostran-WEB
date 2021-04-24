$(document).on("click", ".btnEliminar", function(){

    event.preventDefault();
    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());

    let respuesta = confirm("Estas seguro que desea Eliminarlo de la proforma: "+id+"?");

    $.ajax({
        url: '../dashboard/bd/estados.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 5, 
            id: id
        }, 
        success: function(data) {
            $(this).closest('tr').remove();
            //tablaproductos.row(fila.parents('tr')).remove().draw();
        }
    });
})

valoresSuna();

function valoresSuna(){
    $.ajax({
        url: '../dashboard/bd/estados.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 6
        }, 
        success: function(data) {
            $.each(JSON.parse(data), function(Nivel, name) {
                $('#monto').val(name.sumat);
            });
            
        }
    });

    $.ajax({
        url: '../dashboard/bd/estados.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 4,
        }, 
        success: function(data) {
            $.each(JSON.parse(data), function(Nivel, name) {           
                    
                    //Armamos la Tabla 
                    fila="<tr>" +
                            "<td class='txt' hidden>"+name.id+"</td>"+
                            "<td class='txt'>"+name.codigo1+"</td>"+
                            "<td class='txt' >"+name.nombre+"</td>"+
                            "<td class='txt'>"+name.marca+"</td>"+
                            "<td class='txt total'>"+name.precio+"</td>"+
                            "<td><button type='button' class='btn btn-danger btnEliminar'>Eliminar</button></td>"+
                        "</tr>";
    
                    var btn = document.createElement("TR");
                    btn.innerHTML=fila;
                    document.getElementById("tablita").appendChild(btn);
                    //$('.total > td:eq(0)').html("NIO: "+ totalglobal);
            });
        }        
    }); 
}

function borrado(){
    $.ajax({
        url: '../dashboard/bd/estados.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 3
        }, 
        success: function(data) {
            document.location.reload();           
        }
    });

}

function pdfile(){    
    var nombredatos = $.trim($("#nombredatos").val());
    window.location="../dashboard/pdf.php?nombre="+nombredatos;
}