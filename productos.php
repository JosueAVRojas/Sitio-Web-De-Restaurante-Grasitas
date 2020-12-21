<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD productos</title>
    <link rel="stylesheet" href="./diseño/principal.css">
</head>
<body>

    <nav class="menu">
            <ul>
                <li><a href="./productos.php">Productos</a></li>
                <li><a href="./promo.php">Promociones</a></li>
                <li><a href="./categoria.php">Categoria</a></li>
                <li><a href="./usuarios.php">Usuarios</a></li>
                <li><a href="./promo.php">Promociones</a></li>
                <li><a href="./salir.php">Salir</a></li>
            </ul>
    </nav>
    <div>
        <table align="center" class="tabla-productos">
            <thead >
                <tr>
                    <td colspan="11" align="center">
                        <p class="TituloDatos">¡CRUD de los Alimentos!</p>
                    </td>
                    
                </tr>
                <tr height = "50px">
                    <td colspan="6"></td>
                    <td align="center">
                        <a class="agregarPBTN" href="insertarProducto.php">Agregar</a>
                    </td>
                    
                </tr>
                <tr class="tabla-titulo">
                    <th width="100px">Nombre</th>
                    <th width="250px">Descripcion</th>
                    <th width="100px">Precio</th>
                    <th width="100px">Categoria</th>
                    <th width="100px">Destacado</th>
                    <th width="150px"></th>
                    <th width="100px"></th>
                </tr> 
            </thead>
            <tbody > 
                <?php
                    $host="localhost";
                    $db="grasitas";
                    $user="root";
                    $passwd="toor";
                    $fila = 0;
                    $columna = 0;
                    $sql="SELECT id, nombre, descripcion, precio, categoria, destacado from productos";
                    $conexion=new mysqli($host, $user, $passwd, $db);
                    if($resultado=$conexion->query($sql)){
                        //convirtiendo la informacion en filas
                        while($fila=$resultado->fetch_row()){
                            echo"
                            <tr align='center' height = '90px'> 
                                <td class='filas'>".$fila[1]."</td>
                                <td class='filas'>".$fila[2]."</td>
                                <td class='filas'>".$fila[3]."</td>
                                <td class='filas'>".$fila[4]."</td>
                                <td class='filas'>".$fila[5]."</td>
                                <td>
                                    <a class='editarPBTN' href='editarAlumno.php?id=".$fila[0]."'>Editar</a>
                                </td>
                                <td>
                                <a class='eliminarPBTN' href='eliminarAlumno.php?id=".$fila[0]."'>Eliminar</a>
                                </td>
                            </tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>