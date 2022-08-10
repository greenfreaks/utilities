<?php require "conex.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="text" id="nombre" name="nombre"> <br> <br>
        <input type="file" id="archivo" name="archivo"> <br> <br>
        <input type="submit" id="submit" name="submit">
        <!-- <button id="submit">Enviar</button> -->
        <?php require "actions.php"?>
      
    </form>

    <table>
        <thead>
            <tr>
                <th>NOmbre</th>
                <th>Archivo</th>
                <th>Editar / Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_tabla = "SELECT * FROM archivo";
            $exec_tabla = mysqli_query($con, $query_tabla);
            while ($tabla = mysqli_fetch_assoc($exec_tabla)) { ?>
                <tr>
                    <td><?php echo $tabla['nombre'] ?></td>
                    <td> <a target="_blank" href="<?php echo $tabla['archivo'] ?>">Ver</a></td>
                    <td><a href="editar.php?id=<?php echo $tabla['id'] ?>"> Editar</a>
                        <a href="eliminar.php">Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script src="script.js"></script>
</html>