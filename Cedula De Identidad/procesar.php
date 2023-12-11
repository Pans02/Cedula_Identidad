<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso</title>
</head>
<body>
    


<?php
    require_once("conexion.php");
    $nombres = $_POST["nombres"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $rut = $_POST["rut"];
    $nacionalidad = $_POST["nacionalidad"];
    $sexualidad = $_POST["sexualidad"];
    $fecha_nacimiento = $_POST["fecha"];
    $lugar_nacimiento= $_POST["lugar_nacimiento"];
    $profesion= $_POST["profesion"];
    $discapacidad= $_POST["discapacidad"];
    $donante= $_POST["donante"];
    $archivo = $_FILES["archivo"];
    function verificar_rut($rut){
        $rut = preg_replace('/[\s\-]/', '', $rut);

        $rutNumero = substr($rut, 0, -1);
        $digito = strtoupper(substr($rut, -1));
        if (!ctype_digit($rutNumero) || !in_array($digito, array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'K'))) {
            return false;
        }
        $factor = 2;
        $suma = 0;
        for ($i = strlen($rutNumero) - 1; $i >= 0; $i--) {
            $suma += $factor * intval($rutNumero[$i]);
            $factor = $factor == 7 ? 2 : $factor + 1;
        }

        $resto = $suma % 11;
        $validar_digito = $resto == 0 ? 0 : 11 - $resto;

        return $digito == ($validar_digito == 10 ? 'K' : strval($validar_digito));
    }
    function subir_archivo($archivo){
        $archivo_nombre = $archivo["name"];
        $directorio = "img/";
        $archivo_destino = $directorio . basename($archivo_nombre);

        if (move_uploaded_file($archivo["tmp_name"], $archivo_destino)){
            return $archivo_destino;
        }else{
            return "";
        }

    }
    $archivo_nuevo = subir_archivo($archivo);
    function crear_persona($nombres, $apellido_paterno, $apellido_materno, $rut, $nacionalidad, $sexualidad, $fecha_nacimiento, $lugar_nacimiento, $profesion, $discapacidad, $donante, $archivo_nuevo){
        global $conexion;
        $sql = "INSERT INTO registrados (nombres, apellido_paterno, apellido_materno,  rut,  nacionalidad, genero, fecha_de_nacimiento, lugar_de_nacimiento, profesion, discapacidad, donante, foto) VALUES ('$nombres', '$apellido_paterno', '$apellido_materno', '$rut', '$nacionalidad', '$sexualidad', '$fecha_nacimiento', '$lugar_nacimiento', '$profesion', $discapacidad, $donante, '$archivo_nuevo')";

        $resultado = mysqli_query($conexion, $sql);
        if ($resultado){
            return True;
        }else{
            echo "La consulta: $sql - Fallo: " . mysqli_error($conexion);
            return FALSE;
        }
    }
    $fechaActual = new DateTime();
    $fechaVencimiento = $fechaActual->modify('+5 years');
    $fechaActual= $fechaActual->format('Y-m-d');
    $fechaVencimiento = $fechaVencimiento->format('Y-m-d');

    if (!verificar_rut($rut) || $fecha_nacimiento>$fechaActual) {
        echo "ERROR EN LA INFORMACION.";
    } else {
        crear_persona($nombres, $apellido_paterno, $apellido_materno, $rut, $nacionalidad, $sexualidad, $fecha_nacimiento, $lugar_nacimiento, $profesion, $discapacidad, $donante, $archivo_nuevo);
        require_once("tabla.php");
    }
    ?>

</body>
</html>