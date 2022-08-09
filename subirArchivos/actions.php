<?php
// if (isset($_POST['submit'])) {
require "conex.php";
if (isset($_POST['submit'])) {
    insert();
}else if(isset($_POST['editar'])){
    edit();
}
function insert(){
    global $con;
    // $id_insert = $con->insert_id;
    // $ruta = 'files/ ' . $id_insert . '/';
    $ruta = 'files/';
    $nombre = $_POST['nombre'];
    $archivo = $ruta . $_FILES['archivo']['name'];

    if (!file_exists($ruta)) {
        mkdir($ruta);
    }
    if (!file_exists($archivo)) {
        $resultado = @move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo);
        if ($resultado) {
            echo "Archivo Guardado";
        } else {
            echo "Error";
        }
    } else {
        echo "El archivo ya existe";
    }

    $query = "INSERT INTO archivo(nombre, archivo) VALUES ('$nombre', '$archivo')";
    $exec = mysqli_query($con, $query);
    if ($exec) {
        echo "Success";
    } else {
        echo "Failed";
    }
}

function edit(){
    global $con;
    // $id_insert = $con->insert_id;
    // $ruta = 'files/ ' . $id_insert . '/';
    $id = $_POST['id'];
    $ruta = 'files/';
    $nombre = $_POST['nombre'];
    $archivo = $ruta . $_FILES['archivo']['name'];
    if($archivo == 'files/'){
        $archivo = "";
    }

    if (!file_exists($ruta)) {
        mkdir($ruta);
    }
    if (!file_exists($archivo)) {
        $resultado = @move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo);
        if ($resultado) {
            echo "Archivo Guardado";
        } else {
            echo "Error";
        }
    } else {
        echo "El archivo ya existe";
    }

    $query = "UPDATE archivo SET nombre = '$nombre', archivo = '$archivo' WHERE id = '$id'";
    $exec = mysqli_query($con, $query);
    if ($exec) {
        echo "Success";
    } else {
        echo "Failed";
    }
}
// }
