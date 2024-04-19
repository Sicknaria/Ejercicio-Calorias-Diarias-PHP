<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo calorias</title>
</head>
<body>
    <h2>Cálculo de Calorias</h2><br>
    Dietética y Nutrición <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso_kg = $_POST["peso"];
        $actividad = $_POST["actividad"];
        $objetivo = $_POST["objetivo"];
        $biotipo = $_POST["biotipo"];

        $peso_libras = $peso_kg * 2.20;

        if (($actividad == "sedentario") && ($objetivo == "rebajar")) {
            $rango_min = $peso_libras * 10;
            $rango_max = $peso_libras * 12;
        } elseif (($actividad == "moderadoactivo") && ($objetivo == "rebajar") 
            || ($actividad == "sedentario") && ($objetivo == "mantener")) {
            $rango_min = $peso_libras * 12;
            $rango_max = $peso_libras * 14;
        } elseif (($actividad == "muy activo") && ($objetivo == "rebajar") 
            || ($actividad == "moderadoactivo") && ($objetivo == "mantener")) {
            $rango_min = $peso_libras * 14;
            $rango_max = $peso_libras * 16;
        } elseif (($actividad == "muy activo") && ($objetivo == "mantener") 
            || ($actividad == "sedentario") && ($objetivo == "aumentar")) {
            $rango_min = $peso_libras * 16;
            $rango_max = $peso_libras * 18;
        } elseif ($actividad == "moderadoactivo" && $objetivo == "aumentar") {
            $rango_min = $peso_libras * 18;
            $rango_max = $peso_libras * 20;
        } elseif ($actividad == "muy activo" && $objetivo == "aumentar") {
            $rango_min = $peso_libras * 20;
            $rango_max = $peso_libras * 22;
        }
        
        if ($biotipo == "ectomorfo") {
            $carbohidratos_min = $rango_min * 0.5 / 4;
            $carbohidratos_max = $rango_max * 0.5 / 4;
        } elseif ($biotipo == "mesomorfo") {
            $carbohidratos_min = $rango_min * 0.4 / 4;
            $carbohidratos_max = $rango_max * 0.4 / 4;
        } elseif ($biotipo == "endomorfo") {
            $carbohidratos_min = $rango_min * 0.25 / 4;
            $carbohidratos_max = $rango_max * 0.25 / 4;
        } 
        
        if ($biotipo == "ectomorfo") {
            $proteinas_min = $rango_min * 0.25 / 4;
            $proteinas_max = $rango_max * 0.25 / 4;
        } elseif ($biotipo == "mesomorfo") {
            $proteinas_min = $rango_min * 0.3 / 4;
            $proteinas_max = $rango_max * 0.3 / 4;
        } elseif ($biotipo == "endomorfo") {
            $proteinas_min = $rango_min * 0.4 / 4;
            $proteinas_max = $rango_max * 0.4 / 4;
        } 
        
        if ($biotipo == "ectomorfo") {
            $grasa_min = $rango_min * 0.2 / 9;
            $grasa_max = $rango_max * 0.2 / 9;
        } elseif ($biotipo == "mesomorfo") {
            $grasa_min = $rango_min * 0.3 / 9;
            $grasa_max = $rango_max * 0.3 / 9;
        } elseif ($biotipo == "endomorfo") {
            $grasa_min = $rango_min * 0.35 / 4;
            $grasa_max = $rango_max * 0.35 / 4;
        }
        
        
        echo "<p><strong>Peso en KGs:</strong> $peso_kg</p>";
        echo "<p><strong>Peso en libras:</strong> $peso_libras</p>";
        echo "<p><strong>Rango Kcal: </strong>$rango_min (min) / $rango_max (max)</p>";
        echo "Distribución de Macronutrientes";
        echo "  <li>Gramos de carbohidratos: $carbohidratos_min (min) / $carbohidratos_max (max)</li>
                <li>Gramos de proteinas: $proteinas_min (min) / $proteinas_max (max)</li>
                <li>Gramos de grasa: $grasa_min (min) / $grasa_max (max)</li>";
    }
    ?><br>
</body>
</html>