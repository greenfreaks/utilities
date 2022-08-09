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
    $ruta = 'files/ ';
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
    $id_editar = $_POST['editar_id'];
    $ruta_editar = 'files/' . $id_editar . '/';
    $nombre_editar = $_POST['editar_nombre'];
    $archivo_editar = $ruta_editar . $_FILES['editar_archivo']['name'];
    if (!file_exists($ruta_editar)) {
        mkdir($ruta_editar);
    }
    if (!file_exists($archivo_editar)) {
        $resultado_editar = @move_uploaded_file($_FILES['archivo_editar']['tmp_name'], $archivo_editar);
        if ($resultado_editar) {
            echo "Archivo Editado";
        } else {
            echo "Error al editar";
        }
    }
    $query_editar = "UPDATE archivo SET archivo = '$archivo_editar' WHERE id = '$id_editar'";
    $exec_editar = mysqli_query($con, $query_editar);
    if($exec_editar){
        echo "Success";
    }else{
        echo "Failed";
    }
}
// }
