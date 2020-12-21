<?php
    $host="localhost";
    $db="grasitas";
    $user="root";
    $passwd="toor";
    $user1=$_POST["user"];
    $contra=$_POST["contra"];
    $contra1=md5($contra);
    $sql="SELECT id from usuarios where nikname='".$user1."' and passwd='".$contra1."'";
    $con=new mysqli($host, $user, $passwd, $db);
    if($resultado=$con->query($sql)){
        if($fila=$resultado->fetch_row()){
            echo"<html>
            <head>
                <meta http-equiv='Refresh' content='0;url=\"./productos.php\"'>
            </head>
            <body>
            </body>
            </html>";
        }
        else{
            //dar alertas y pedir que se registre
            echo"<html>
            <head>
                <meta http-equiv='Refresh' content='5;url=\"./login.php\"'>
            </head>
            <body>
                <h1>Usuario o Contraseña incorrecta, espere para intentarlo de nuevo</h1>
            </body>
            </html>";
        }
    }
    else{
        //dar alertas y pedir que se registre
        echo"<html>
        <head>
            <meta http-equiv='Refresh' content='5;url=\"./login.php\"'>
        </head>
        <body>
            <h1>Usuario o Contraseña incorrecta, espere para intentarlo de nuevo</h1>
        </body>
        </html>";
    }
?>