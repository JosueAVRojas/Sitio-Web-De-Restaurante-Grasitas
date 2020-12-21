<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./diseño/principal.css">
</head>
<body class="login">
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
    <div>
        <form action="./valida.php" method="post" name="login">
            <div class="cuadro">
                <table>
                    <tr>
                        <h1 class="titulogin">Iniciar Sesión</h1>
                    </tr>
                    <tr>
                        <p class="subLogin">¡Inicie sesión para ingresar al sistema!</p>
                    </tr>
                    <tr>
                        <p>Usuario:</p>
                    </tr>
                    <tr>
                        <input class="textoLogin" type="text" name="user" value="" maxlength="20">
                    </tr>
                    <tr>
                        <p>Contraseña:</p>
                    </tr>
                    <tr>
                        <input class="textoLogin" type="password" name="contra" value="" maxlength="15">
                    </tr>
                    <tr>
                        <input class="boton" type="submit" value="Entrar">
                    </tr>
                </table>
            </div>
        </form>
        
    </div>
</body>
</html>