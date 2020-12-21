<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./diseño/principal.css">
</head>
<body>
<?php
    $host="localhost";
    $db="grasitas";
    $user="root";
    $passwd="toor";
    $id=$_GET["id"];
    $sql="SELECT * from usuarios where id=".$id;
    $con=new mysqli($host, $user, $passwd, $db);
    if($resultado=$con->query($sql)){
        while($fila=$resultado->fetch_row()){
?>
    <div class="editar-user">
        <form>
        <p>¡Aquí podra actualizar los usuarios!</p>
        <input type="hidden" name="txtid" value="<?php echo $fila[0]?>">
        <label for="">NickName:</label></br>
        <input type="text" name="usuario" value="<?php echo $fila[1]?>"></br>
        <label for="">Nombre:</label></br>
        <input type="text" name="nombre" value="<?php echo $fila[3]?>"></br>
        <label for="">Apellido:</label></br>
        <input type="text" name="apellido" value="<?php echo $fila[4]?>"></br>
        <label for="">Contraseña:</label></br>
        <input type="password" name="passwd" value="<?php echo $fila[2]?>"></br>
        <input class="editar" type="submit" name="" value="Actualizar"></br>
        <a href="usuarios.php">Regresar</a>
        </form>
        <?php }
            }?>
    </div>
    <?php
        if( isset($_POST["usuario"]) || isset($_POST["nombre"]) || isset($_POST["apellido"]) || isset($_POST["passwd"]) || isset($_GET["txtid"])) {
        $id2=$_GET["txtid"];
        $nickname = $_GET["usuario"];
        $nombre = $_GET["nombre"];
        $apellido = $_GET["apellido"];
        $contra = $_GET["passwd"];
        $sql2 = "UPDATE usuarios SET nikname='".$nickname."', passwd='".$contra."', nombre='".$nombre."', apellido='".$apellido."' where id='".$id2."'";
        $con2=new mysqli($host, $user, $passwd, $db);
        if($resultado=$con2->query($sql2)){
            echo"<html>
        <head>
            <meta http-equiv='Refresh' content='0;url=\"./usuarios.php\"'>
        </head></html>";
        }
    }
    ?>