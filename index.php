<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PR&Aacute;CTICA COMPOSER</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
    <header>
        <h1>Geolocalizaci&oacute;n de un n&uacute;mero decimal</h1>
    </header>
    <main>
        <img src="images/Captura.PNG" alt="captura" />
        <form name="mi_formulario" action="" method="POST">
            <ul>
                <li>
                    <label>Introduce el N&deg; entero:</label>
                </li>
                <li>
                    <input required type="text" name="numero_entero" class="numero_entero">
                </li>
                <li>
                    <input type="submit" name="calcular" value="CALCULAR" class="boton">
                </li>
                <li>
                    <a href="https://www.ipaddressguide.com/ip" target="_blank">IP-To-Decimal</a>
                </li>
                <li>
                    <a href="https://ipinfo.io" target="_blank">ipinfo.io</a>
                </li>
                <li>
                    <a href="https://packagist.org" target="_blank">Packagist</a>
                </li>
            </ul>
        </form>
        <?php

        use Foolz\Inet\Inet;
        use ipinfo\ipinfo\IPinfo;

        try {
            if (isset($_REQUEST['calcular'])) {
                $num_entero = htmlspecialchars($_REQUEST['numero_entero']);
                if (ctype_digit($num_entero) && $num_entero > 0) {
                    require __DIR__ . '/vendor/autoload.php';
                    $ip = Inet::dtop($num_entero);
                    // Token proporcionado al registrarse en ipinfo.io
                    $access_token = '7d7face798d594';
                    $client = new IPinfo($access_token);
                    $details = $client->getDetails($ip);
                    $array_details = $details->all;
                    echo '<p> N&deg; ENTERO: ', $num_entero, '<br><br>';
                    foreach ($array_details as $clave => $valor) {
                        echo strtoupper($clave), ': ', $valor, '<br>';
                    }
                    echo '</p>';
                } else {
                    echo '<script type="application/javascript">setTimeout(() => {alert("Error: El valor introducido no es un número entero positivo");}, 100);</script>';
                }
            }
        } catch (Exception $e) {
            echo '<script type="application/javascript">setTimeout(() => {alert("Exception: ', $e, '");}, 100);</script>';
        }

        ?>
    </main>
    <footer>
        <h3>DESARROLLADOR: LUIS VALLES PASTOR</h3>
    </footer>
</body>

</html>