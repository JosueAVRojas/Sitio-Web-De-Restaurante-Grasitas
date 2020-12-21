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
    $sql="SELECT * from productos where id=".$id;
    $con=new mysqli($host, $user, $passwd, $db);
    if($resultado=$con->query($sql)){
        while($fila=$resultado->fetch_row()){
?>
    <div class="editar-producto">
        <form>
        <div class="agregar-producto">
            <p>¡Aquí podra actualizar los Productos!</p>
            <table align="center">
                <tr>
                <input type="hidden" name="txtid" value="<?php echo $fila[0]?>">
                </tr>
                <tr height = "40px">
                    <!--Campo nombres-->
                    <td><label for="nombre">Nombre: </label></td>
                    <td><input class="inputedit" type="text" name="nombre" id="nombre" maxlength="50" value="<?php echo $fila[1]?>"></td>
                </tr>   
                <tr height = "40px">
                    <!--Campo descripcion-->
                    <td><label for="descripcion">Descripcion: </label></td>
                    <td><input class="inputedit" type="text" name="descripcion" id="descripcion" maxlength="50" value="<?php echo $fila[2]?>"></td>
                </tr>
                <tr height = "40px">
                    <!--Campo precio-->
                    <td><label for="precio">Precio: </label></td>
                    <td><input class="inputedit" type="text" name="precio" id="precio" maxlength="50" value="<?php echo $fila[3]?>"></td>
                </tr>
                <tr height = "40px">
                    <!--Campo categoria-->
                    <td><label for="categoria">Categoria: </label></td>
                    <td><select class="inputedit" name="categoria" id="categoria" value="<?php echo $fila[4]?>">
                        <option value="1" selected>Comida</option>
                        <option value="2">Postres</option>
                        <option value="3">Bebidas</option>
                    </select></td>
                </tr>
                <tr height = "40px">
                    <!--Campo destacado-->
                    <td><label for="destacado">Destacado: </label></td>
                    <td><select class="inputedit" name="destacado" id="destacado" value="<?php echo $fila[5]?>">
                        <option value="1" selected>Pantalla principal</option>
                        <option value="0">No mostrar</option>
                    </select></td>
                </tr>
                <tr height = "40px">
                    <!--Campo imagen-->
                    <td><label for="imagen">Imagen del producto: </label></td>
                    <td><input type="file" name="imagen" ></td>
                    
                </tr>
                <tr height = "80px">
                    <!--Boton-->
                    <td colspan="2" align="center"><input type="submit" name="editarProducto" value="Editar"></td>
                </tr>
                <tr height = "40px">
                    <td><a class="menuenlace" href="productos.php">Regresar al menu</a></td>
                </tr>   
            </table>
            </div>
        </form>
        <?php }
            }?>
    </div>
    <?php
    if (isset($_POST["nombre"]) || isset($_POST["descripcion"]) || 
        isset($_POST["precio"]) || isset($_POST["categoria"]) || isset($_POST["destacado"])|| isset($_GET["txtid"])){
            $id2=$_GET["txtid"];
            $nombre = $_GET["nombre"];
            $descripcion = $_GET["descripcion"];
            $precio = $_GET["precio"];
            $categoria = $_GET["categoria"];
            $destacado = $_GET["destacado"];
        $sql2 = "UPDATE productos SET nombre='".$nombre."', descripcion='".$descripcion."', precio='".$precio."', categoria='".$categoria."', destacado='".$destacado."' where id='".$id2."'";
        $con2=new mysqli($host, $user, $passwd, $db);
        if($resultado=$con2->query($sql2)){
            echo"<html>
        <head>
            <meta http-equiv='Refresh' content='0;url=\"./productos.php\"'>
        </head></html>";
        }
    }
    ?>
    </body>
</html>