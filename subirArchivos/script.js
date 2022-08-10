$(document).ready(function () {
    let submit = $('#submit').on('click', function () {
        data = {
            nombre: $('#nombre').val(),
            archivo: $('#archivo').val(),
            submit: $('#submit').val()
        }
        if (data.nombre == "") {
            alert("Llena el nombre");
            return false;
        } else if (data.archivo == "") {
            alert("Selecciona un archivo");
            return false;
        }
        $.ajax({
            url: 'actions.php',
            type: 'post',
            data: data,
            success: function (response) {
                // alert(response);
                console.log(response);
                if (response == "Success") {
                    alert("Exito");
                } else if (response == "Failed") {
                    alert("Falló");
                }
            }
        }); //End Ajax
    });
});