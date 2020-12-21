<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grasita</title>
    <link rel="stylesheet" href="./diseño/principal.css">
</head>
<body>
    <nav class="menu">
        <ul>
            <li><a href="./index.php">Inicio</a></li>
            <li><a href="./alimentos.php?tipo=1">Comida</a></li>
            <li><a href="./alimentos.php?tipo=3">Bebidas</a></li>
            <li><a href="./alimentos.php?tipo=2">Postres</a></li>
            <li><a href="./promociones.php">Promociones</a></li>
            <li><a href="./login.php">Login</a></li>
        </ul>
    </nav>
    <?php
        $host="localhost";
        $db="grasitas";
        $user="root";
        $passwd="toor";
        $tipo=$_GET["tipo"];
        if($tipo == 1){
            echo"<div class='headerComida'>
            <div class='portada'>
            <h1>Menú de la  <p1>Comida!</p1></h1>
                    <div class='lema'>
                        <p>¡Aquí podrás encontrar toda nuestra comida!</p>
                    </div></div>
                    </div>";
        }
        else if($tipo == 2){
            echo"<div class='headerPostre'>
            <div class='portada'>
            <h1>Menú de los  <p1>Postres!</p1></h1>
                    <div class='lema'>
                        <p>¡Aquí podrás encontrar todos los postres disponibles!</p>
                    </div></div>
                    </div>";
        }
        else if($tipo == 3){
            echo"<div class='headerBebida'>
            <div class='portada'>
            <h1>Menú de las  <p1>Bebidas!</p1></h1>
                    <div class='lema'>
                        <p>¡Aquí podrás encontrar todas las bebidas disponibles!</p>
                    </div></div>
                    </div>";
        }
    ?>
    <table>
        <?PHP
            $columna = 0;
            $sql="SELECT nombre, descripcion, precio, id from productos where categoria=".$tipo;
            $conexion=new mysqli($host, $user, $passwd, $db);
            if($resultado=$conexion->query($sql)){
                //convirtiendo la informacion en filas
                while($fila=$resultado->fetch_row()){
                    switch ($columna){
                        case 0:
                            echo"<tr><td>";
                            $columna=1;
                        break;
                        case 1:
                            echo"</td><td>";
                            $columna=2;
                        break;
                        case 2:
                            echo"</td><td>";
                            $columna=3;
                        break;
                        case 3:
                            echo"</td></tr><tr><td>";
                            $columna=1;
                        break; 
                    }
                    echo"<div class='card'>
                            <table>
                                <tr>
                                    <td>
                                        <img class='foto' src='./img/".$fila[3].".jpg' width='300'>
                                    </td>
                                    <td>
                                        <h2 class='titulo'>".$fila[0]."</h2></br>
                                        <p class='descrip'>".$fila[1]."</p></br>
                                        <h3 class='precio'>$".number_format($fila[2],'2', '.', ',')."</h3>
                                    </td>
                                </tr>
                            </table>
                        </div>";
                }
                $resultado->close();
                if($columna>0){
                    echo"</td><tr>";
                }
            }
            else{
                //mandar no conexion
            }

        ?>
    </table>
</body>
</html>