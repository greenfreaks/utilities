<?php require "conex.php";
$id = $_GET['id'];
$query_tabla = "SELECT * FROM archivo WHERE id = '$id' ";
$exec_tabla = mysqli_query($con, $query_tabla);
$tabla = mysqli_fetch_assoc($exec_tabla);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="actions.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="editar_id" disabled value="<?php echo $tabla['id'] ?>"> <br> <br>
        <input type="text" name="editar_nombre" value="<?php echo $tabla['nombre'] ?>"> <br> <br>
        <input type="file" name="editar_archivo" value="<?php echo $tabla['archivo'] ?>"> <br> <br>
        <input type="submit" name="editar">
    </form>

    <script src="script.js"></script>
</body>

</html>