<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1, p {
            text-align: center;
            line-height: 1.4;
            margin: 10px;
        }
        .container {
            text-align: center;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        p {
            font-size: 18px;
        }
    </style>
    <title>Actividad | Módulo 1</title>
</head>
<body>
    <h1>Actividad | Módulo 1</h1>
    <p>Supongamos que, la primer clave de una tarjeta de crédito nueva, tiene el siguiente algoritmo por seguridad:</p>
    <p>"Si el número de DNI es par, la diferencia entre el primer y el último dígito se eleva al resto de la división entre el el primer y último dígito.<br>Si el resultado de la potencia es par, la clave de la tarjeta, es la sumatoria de todos los dígitos pares.<br>En cualquier caso que faltasen dígitos para completar los cuatro dígitos de la clave, se agrega el resto de la división en dos de cada número, de izquierda a derecha  (sin considerar los ceros)."</p>
    <div class = "container"> 
    <?php
        echo "El número de DNI es: 40.021.438<br>";
        define("dni", 41021438);
        $resto_0 = dni % 2;//verificamos si el número es par o impar
        echo "Como el resto de la división en dos es {$resto_0}, el número es par.<br>";
        $resto_1 = 4 % 8;
        echo "El resto de la división entre el primer y último dígito, es {$resto_1}.<br>";
        $diferencia = 4 - 8; //calculamos la diferencia entre el primer y el último dígito
        $potencia = $diferencia ** $resto_1; //la diferencia se eleva al resto
        echo "El resultado de la potencia es {$potencia}<br>Al ser par, se suman los dígitos pares del DNI.<br>";
        define("numeros_pares", array(4,2,4,8));//lo definimos como un array, para considerar los dígitos como valores separados
        $clave_0 = numeros_pares[0] + numeros_pares[1] + numeros_pares[2] + numeros_pares[3];
        echo "La clave sería {$clave_0}<br>";
        $resto_2 = 4;//almacenamos el valor a dividir en la variable que luego almacenará el resto, así usamos un operador de asignación
        $resto_2 %= 2;
        echo "El primer resto es {$resto_2}.<br>";
        $clave_0 .= $resto_2;//cada resto que sacamos, lo vamos concatenando con lo anterior para obtener la clave
        $resto_3 = 1;
        $resto_3 %= 2;
        echo "El segundo resto, es {$resto_3}.<br>";
        $clave_0 .= $resto_3;
        echo "Entonces, la clave sería {$clave_0}"
    ?>
    </div>
    <p>Si el número de DNI es impar, el producto entre el primer y el último dígito se eleva al cuadrado. Si el número resultante tiene cuatro dígitos, es la clave de la tarjeta.<br>De otro modo, se calcula el 5% del número de DNI, y el valor resultante se divide en potencias de dos sucesivas, hasta tener cuatro o menos dígitos. El resultado, es la clave.</p>
    <div class = "container">
    <?php
    echo "Supongamos que el número de DNI es: 30.566.093<br>";
    define("dni2", 30566093);
    $resto0 = dni2 % 2;
    echo "Como el resto de la división en dos es {$resto0}, el número es impar<br>";
    $producto = 3 * 3;
    $potencia_1 = $producto ** 2;
    define("porcentaje", (dni2 * 5) / 100);
    echo "El 5% del número de DNI, sería ", porcentaje, "<br>";
    $clave_1 = porcentaje;
    $clave_1 /= 2;
    $clave_1 /= 4;
    $clave_1 /= 8;
    $clave_1 /= 16;
    $clave_1 = (int)$clave_1;
    echo "Y la clave, sería {$clave_1}.<br>";
    ?>
    </div>
</body>
</html>
