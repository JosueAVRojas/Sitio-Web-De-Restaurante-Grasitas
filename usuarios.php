<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <div class="contenedor-user">
        <p>¡Aquí podras editar, agregar, visualizar y eliminar a los usuarios!</p>
        <a class="agregarBTN" href="agregarUser.php">Agregar</a></br>
        <table>
            <thead>
                <tr>
                    <th width="50px">ID</th>
                    <th width="50px">NickName</th>
                    <th width="50px">Contraseña</th>
                    <th width="100px">Nombre</th>
                    <th width="50px">Apellido</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $host="localhost";
                $db="grasitas";
                $user="root";
                $passwd="toor";
                $fila = 0;
                $columna = 0;
                $sql="SELECT id, nikname, passwd, nombre, apellido from usuarios";
                $conexion=new mysqli($host, $user, $passwd, $db);
                if($resultado=$conexion->query($sql)){
                    //convirtiendo la informacion en filas
                    while($fila=$resultado->fetch_row()){
                        echo"
                        <tr>
                            <td class='filas'>".$fila[0]."</td>
                            <td class='filas'>".$fila[1]."</td>
                            <td class='filas'>".$fila[2]."</td>
                            <td class='filas'>".$fila[3]."</td>
                            <td class='filas'>".$fila[4]."</td>
                            <td>
                                <a class='editarBTN' href='editarUser.php?id=".$fila[0]."'>Editar</a>
                                <a class='eliminarBTN' href='eliminarUser.php?id=".$fila[0]."'>Eliminar</a>
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