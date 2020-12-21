<?php
    $host="localhost";
    $db="grasitas";
    $user="root";
    $passwd="toor";
    $id=$_GET["id"];
    $sql="DELETE FROM usuarios where id=".$id;
    $con=new mysqli($host, $user, $passwd, $db);
    if($resultado=$con->query($sql)){
        echo"<html>
        <head>
            <meta http-equiv='Refresh' content='0;url=\"./usuarios.php\"'>
        </head></html>";
    }
?>