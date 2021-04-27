let nombreexcel;

document.getElementById('pdfimport').onchange = function () {
    nombreexcel = document.getElementById('pdfimport').files[0].name;
    document.querySelector('#namefile').innerText = nombreexcel;
}

$(document).on("click", ".enviar", function(){    
    /* set up XMLHttpRequest */
    var url = "archivos/COPIA -"+nombreexcel;
    var oReq = new XMLHttpRequest();
    oReq.open("GET", url, true);
    oReq.responseType = "arraybuffer";

    oReq.onload = function(e) {

        var info = leerdata();
        let i = 0;
        info.forEach(function (name){
            
            console.log(i++);
            codigo1 = name["Codigo 1"];
            codigo2 = name["Codigo 2"];
            nombre = name["Producto"];
            marca = name["Marca"];
            modelo = name["Modelo"];
            anio = name["Año"];
            precio = name["Precio"];
            notas = name["Notas"];

            $.ajax({
                url: "../dashboard/bd/crud.php",
                type: "POST",
                dataType: "json",
                data: {
                    nombre:nombre, 
                    codigo1:codigo1,
                    codigo2:codigo2,
                    marca:marca,
                    modelopresentacion:modelo,
                    pventa:precio,
                    anio:anio,
                    comentario:notas,
                    opcion: 1,
                },
                success: function(){  
                }
            });            
        });
        

        function leerdata(){

            var arraybuffer = oReq.response;

            /* convert data to binary string */
            var data = new Uint8Array(arraybuffer);
            var arr = new Array();
            for(var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
            var bstr = arr.join("");

            /* Call XLSX */
            var workbook = XLSX.read(bstr, {type:"binary"});

            /* DO SOMETHING WITH workbook HERE */
            var first_sheet_name = workbook.SheetNames[0];
            /* Get worksheet */
            var worksheet = workbook.Sheets[first_sheet_name];
            info = XLSX.utils.sheet_to_json(worksheet,{raw:true});
            
            return info;
        }
    }

    oReq.send();
})

$( document ).ready(function() {
    $("#formPersonas").on("submit", function(e) {
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formPersonas"));

        $.ajax({
            url: "../dashboard/bd/excel.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(res) {
        });
    });

});

/*
        data = JSON.stringify(info);

        $.ajax({
            url: '../dashboard/bd/inserccionesmasivas.php',
            type:"POST",
            datatype: "json",
            data: {
                data: data
            }, 
            success: function() {
  
            },
            error: function(error){
                alert("Algo paso.")
                alert(error)
            }
        });

*/