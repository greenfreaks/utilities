<?php
if (isset($_POST['submit'])) {
    $dir = "../files/";
    $maxSize = 200;
    $permitidos = array('doc', 'docx', 'xls', 'csv', 'xlsx');
    // Concatenamos la ruta y nombre del archivo para que con "move_uploaded_file" lo guardemos
    $ruta_carga = $dir . $_FILES['archivo']['name'];
    $arregloArchivo = explode(".", $_FILES['archivo']['name']);
    $extension = strtolower(end($arregloArchivo));

    if (in_array($extension, $permitidos)) {
        // Verificamos que el archivono sobrepase el tamaño límite
        if ($_FILES['archivo']['size'] < ($maxSize * 1024)) {
            //Si la carpeta donde queremos subir el archivo no existe, entonces creamos la carpeta
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }

            // Indicamos si todo salió bien u ocurrió un error
            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_carga)) {
                echo "Correcto";
            } else {
                echo "Error";
            }

            print_r($_FILES);
        } else {
            echo "El archivo excede el tamaño permitido";
        }
    } else {
        echo "Archivo no permitido  ";
    }
}else{
    "No seleccionaste ningún archivo";
}
