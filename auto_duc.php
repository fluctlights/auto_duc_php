<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Update your NO-IP domain!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
    <form name="formulario" id="formulario" method="POST">
    <h2>Introduce credenciales y el hostname a actualizar de NO-IP</h2>
        Email: <input type="text" name="email" id="email"/><br />
        Password: <input type="text" name="password" id="password"/><br />
        Hostname: <input type="text" name="domain" id="domain"/><br />
        <button id="envia_info" onclick="return comprobar()">Enviar datos</button>

    </form>

    <?php
        $email = $_POST["email"];
        $password = $_POST["password"];
        $host = $_POST["hostname"];
        $hostname = "hostname=".$host;
        $url = "https://dynupdate.no-ip.com/nic/update?".$hostname.$ip_addr;

        $credentials = $email.":".$password;
        $b64 = base64_encode ( string $credentials ) : string
        $auth_header = "Authorization: Basic ".$b64

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $auth_header);
        
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        var_dump($resp);
    ?>
</body>
</html>
