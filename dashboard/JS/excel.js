$( document ).ready(function() {
    $("#formLogin").on("submit", function(e) {
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formLogin"));

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
            alert("Funciono ??");
        });
    });
});
