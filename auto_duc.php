<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<title>Update your NO-IP domain!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
    <form name="formulario" id="formulario" method="POST">
    <h2>Rellena los campos para actualizar el dominio</h2>
        Usuario: <input type="text" name="usuario" id="usuario"/><br />
        Contrasena: <input type="password" name="pass" id="pass"/><br />
        Dominio: <input type="text" name="dominio" id="dominio"/><br />
        <button id="envia_info" onclick="return comprobar()">Enviar datos</button>

    </form>

    <!-- Si hemos pasado el formulario hacemos la actualizacion --> 

    <?php
        $usuario = $_POST["usuario"];
        $password = $_POST["pass"];
        $host = $_POST["dominio"];
        $hostname = "hostname=$host";

        # La IP no es necesaria usarla porque la API puede obtener la IP como tal
        $url = "http://$usuario:$password@dynupdate.no-ip.com/nic/update?$hostname";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_exec($curl);
        curl_close($curl);

        # Cambiamos de página web
        header("Location: connectdb.php", TRUE, 301); // si no va entonces solo el location
        die();
    ?>

</body>
</html>
