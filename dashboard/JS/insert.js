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

    $.ajax({
            url: "../dashboard/bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {
                nombre:nombre, 
                codigo1:codigo1,
                codigo2:codigo2,
                marca:marca,
                modelopresentacion:modelopresentacion,
                pventa:precio,
                anio:anio,
                comentario:comentario,
                opcion: 1,
            },
            success: function(){  
                Swal.fire(
                    'Producto insertado',
                    'Con exito',
                    'success'
                  )
                  document.location.reload(); 
            }  
        });    
});