<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--(Create, Read, Update, Delete) de la tabla de usuarios -->
    <form name="usuario" action="./menu2.php" method="post"></form>
        <table>
            <tr>
                <td><label for="nikname">Nombre de usuario:</label></td>
                <td><input name="nikname" id="nikname" type="text" maxlength="20"></td>
                <td><label for="contra">Contraseña:</label></td>
                <td><input name="contra" id="contra" type="password" maxlength="10"></td>
            </tr>
            <tr>
            <td><label for="nombre">Nombre:</label></td>
                <td><input name="nombre" id="nombre" type="text" maxlength="45"></td>
                <td><label for="apellido">Apellido:</label></td>
                <td><input name="apellido" id="apellido" type="text" maxlength="45"></td>
            </tr>
            <tr>    
                <td colspan="4" align="center">
                <input type="hidden" name="accion" value="1">
                <input type="submit" value="Agregar">
                </td>
            </tr>
        </table>
    <table>
        <thead>
            <tr>
                <th>Usuario: </th>
                <th>Nombre: </th>
                <th>Apellido: </th>
            </tr>
        </thead>
        <tbody>
           <?PHP
                $host="localhost";
                $db="grasitas";
                $user="root";
                $passwd="";
                //Verificar si es nuevo
                if(isset($accion)){
                    if($accion ==1){
                    $nombre=$_POST["nombre"];
                    $contra=$_POST["contra"];
                    $apellido=$_POST["apellido"];
                    $nikname=$_POST["nikname"];
                    $contrau = md5($contra);
                    $sql="INSERT INTO usuarios (nikname, passwd, nombre, apellido) VALUES('".$nikname."','".$contrau."','".$nombre."','".$apellido."')";
                    $con=new mysqli($host, $user, $passwd, $db);
                    $con->query($sql);
                    $con->close();
                    }
                
                if($accion ==2){
                    $id=$_POST["id"];
                    $sql="DELETE FROM usuarios WHERE id=".$id;
                    $con=new mysqli($host, $user, $passwd, $db);
                    $con->query($sql);
                    $con->close();
                    }
                
                }
                //Listar usuarios
                $sql="SELECT id, nikname, nombre, apellido from usuarios";
                $con=new mysqli($host, $user, $passwd, $db);
                if($resultado=$con->query($sql)){
                    while($fila=$resultado->fetch_row()){
                        echo"<tr>
                            <td>".$fila[1]."</td>
                            <td>".$fila[2]."</td>
                            <td>".$fila[3]."</td>
                            <td>
                            <form name='borrau".$fila[0]."' action='./menu2.php' method='post'>
                            <input  type ='hidden' name='id' value='".$fila[0]."'>
                            <input  type ='hidden' name='accion' value='2'>
                            <input  type ='submit' value='Borrar'>
                            </form>
                            </td>
                        </tr>";
                    }
                
                }
                else{
                   echo"<tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>";
                }
           ?> 
        </tbody>
    </table>
</body>
</html>