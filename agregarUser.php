<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./diseño/principal.css">
</head>
<body>
    <div class="agregar-user">
        <p>¡Aquí podra agregar nuevos usuarios!</p>
        <form action="agregarUser.php" method="POST">
        <label for="">NickName:</label></br>
        <input type="text" name="usuario"></br>
        <label for="">Nombre:</label></br>
        <input type="text" name="nombre"></br>
        <label for="">Apellido:</label></br>
        <input type="text" name="apellido"></br>
        <label for="">Contraseña:</label></br>
        <input type="password" name="passwd"></br>
        <input class="agregar" type="submit" name="" value="Agregar"></br>
        <a href="usuarios.php">Regresar</a>
        </form>
        <?php
        $host="localhost";
        $db="grasitas";
        $user="root";
        $passwd="toor";
        $fila = 0;
        $columna = 0;
        if( isset($_POST["usuario"]) || isset($_POST["nombre"]) || isset($_POST["apellido"]) || isset($_POST["passwd"])) {
            $nickname = $_POST["usuario"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $contra = $_POST["passwd"];
            $sql = "INSERT INTO usuarios (nikname, passwd, nombre, apellido) VALUES ('".$nickname."', '".$contra."', '".$nombre."', '".$apellido."')";
            $con=new mysqli($host, $user, $passwd, $db);
            if($resultado=$con->query($sql)){
                echo"<html>
            <head>
                <meta http-equiv='Refresh' content='0;url=\"./usuarios.php\"'>
            </head></html>";
            }
        }
    ?>
    </div>
</body>
