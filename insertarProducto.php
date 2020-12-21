<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Productos</title>
    <link rel="stylesheet" href="./diseño/principal.css">
</head>
<body>
    <div>
        <form name="agregarProdcutos" action="insertarProducto.php" method="post">
            <div class="agregar-producto">
                <h1>Agregar <p1>Productos!</p1></h1>
            <table align="center">
                <tr height = "40px">
                    <!--Campo nombres-->
                    <td><label for="nombre">Nombre: </label></td>
                    <td><input class="inputedit" type="text" name="nombre" id="nombre" maxlength="50"></td>
                </tr>   
                <tr height = "40px">
                    <!--Campo descripcion-->
                    <td><label for="descripcion">Descripcion: </label></td>
                    <td><input class="inputedit" type="text" name="descripcion" id="descripcion" maxlength="50"></td>
                </tr>
                <tr height = "40px">
                    <!--Campo precio-->
                    <td><label for="precio">Precio: </label></td>
                    <td><input class="inputedit" type="text" name="precio" id="precio" maxlength="50"></td>
                </tr>
                <tr height = "40px">
                    <!--Campo categoria-->
                    <td><label for="categoria">Categoria: </label></td>
                    <td><select class="inputedit" name="categoria" id="categoria">
                        <option value="1" selected>Comida</option>
                        <option value="2">Postres</option>
                        <option value="3">Bebidas</option>
                    </select></td>
                </tr>
                <tr height = "40px">
                    <!--Campo destacado-->
                    <td><label for="destacado">Destacado: </label></td>
                    <td><select class="inputedit" name="destacado" id="destacado">
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
                    <td colspan="2" align="center"><input class="agregarProBTN" type="submit" name="agregarProducto" value="Agregar"></td>
                </tr>
                <tr height = "40px">
                    <td><a class="menuenlace" href="productos.php">Regresar al menu</a></td>
                </tr>   
            </table>
            </div>
        </form>
        <?php
            $host="localhost";
            $db="grasitas";
            $user="root";
            $passwd="toor";
            $fila = 0;
            $columna = 0;
            
            $nombre_img=$_FILES['imagen']['name'];
            $ruta = "/Imágenes/".$nombre_img;
            $archivo=$_FILES['imagen']['tmp_name'];
            move_uploaded_file($archivo, $ruta);

            if (isset($_POST["nombre"]) || isset($_POST["descripcion"]) || 
            isset($_POST["precio"]) || isset($_POST["categoria"]) || isset($_POST["destacado"])){
                $nombre = $_POST["nombre"];
                $descripcion = $_POST["descripcion"];
                $precio = $_POST["precio"];
                $categoria = $_POST["categoria"];
                $destacado = $_POST["destacado"];
                $sql="INSERT INTO productos (nombre, descripcion, precio, categoria
                , destacado) VALUES('".$nombre."','".$descripcion."','".$precio."',
                '".$categoria."','".$destacado."')";
                $con = new mysqli($host, $user, $passwd, $db);
                if($resultado=$con->query($sql)){

                    echo"<html>
                    <head>
                        <meta http-equiv='Refresh' content='0;url=\"./productos.php\"'>
                    </head></html>";
                }
            }
        ?>
    </div>
</body>
</html>