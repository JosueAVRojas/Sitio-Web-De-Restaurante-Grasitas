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
            <li><a href="#">Promociones</a></li>
            <li><a href="./login.php">Login</a></li>
        </ul>
    </nav>
    <?php
        $host="localhost";
        $db="grasitas";
        $user="root";
        $passwd="toor";
            echo"<div class='headerPromo'>
            <div class='portada'>
            <h1>Menú <p1>Promociones!</p1></h1>
                    <div class='lema'>
                        <p>¡Aquí podrás encontrar nuestras promociones!</p>
                    </div></div>";
            
        
    ?>
    <table>
        <?PHP
            $host="localhost";
            $db="grasitas";
            $user="root";
            $passwd="toor";
            $columna = 0;
            $sql="SELECT id, nombre, fini, ffin, descripcion from promociones";
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
                            echo"</td></tr><tr><td>";
                            $columna=1;
                        break; 
                    }
                    echo"<div class='card'>
                            <table>
                                <tr>
                                    <td>
                                        <img class='foto' src='./img/".$fila[0].".jpg'>
                                    </td>
                                    <td>
                                        <h2 class='titulo'>".$fila[1]."</h2></br>
                                        <p class='descrip'>".$fila[4]."</p></br>
                                        <p class='fechas'>Fecha de inicio: ".$fila[2]."</p>
                                        <p class='fechas'>Fecha final: ".$fila[3]." </p>
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