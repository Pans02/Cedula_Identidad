<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso</title>
    <style>
        .carnet{
            display: flex;
            width: 900px;
            height: 450px;
            border: 3px solid #000000;
            border-radius: 13px;
            background-color: #e0f2f1;
        }
        .izq{
            width: 280px;
            height: 450px;
        }
        img{
            width: 280px;
            height: 310px;
        }
        .rut{
            width: 280px;
            height: 50px;
        }
        .info{
            margin-left: 20px;
            width: 620px;
            height: 400px;
        }
        .huella{
            margin-left:200px;
            width:50%;
            height:200px;
        }
        .qr{
            float:left;
            width:50%;
            height:250px;
        }
        .relleno{
            width:900px;
            height:200px;
        }
        .info2{
            float:left;
            width:100%;
            height:50px;
        }

    </style>
</head>
<body>
    <?php
    require_once ("conexion.php");
    $fechaActual = new DateTime();
    $fechaVencimiento = $fechaActual->modify('+5 years');
    $fechaActual= $fechaActual->format('Y-m-d');
    $fechaVencimiento = $fechaVencimiento->format('Y-m-d');
    $id = $_POST["num_doc"];
    $sql= "SELECT * FROM registrados where id='$id'";
    $resultado= mysqli_query($conexion, $sql);
    $resultado=$resultado->fetch_assoc();
    


    
    if($resultado['genero']=="masculino"){
        $genero="M";
    }
    else if($resultado['genero']=="femenino"){
        $genero="F";
    }
    else{
        $genero="O";
    }
    ?>
    <h3>Cedula Adverso:</h3>
    <div class="carnet">

        <div class="izq">
            <h3>Republica De <?php echo $resultado['nacionalidad']; ?></h3>
            <img src="<?php echo $resultado['foto'];?>">
            <div class="rut">
                <br>
                <b>RUN: </b><?php echo $resultado['rut']; ?>
            </div>
        </div>
        
        <div class="info">
            <br><br>
            <b>APELLIDOS:</b><br><?php echo $resultado['apellido_paterno']."<br>"; echo $resultado['apellido_materno']; ?><br>
            <br><b>NOMBRES:</b><br><?php echo $resultado['nombres']."<br>";?><br>
            <b>NACIONALIDAD:</b><?php echo $resultado['nacionalidad']."   ";?><b>SEXO:</b><?php echo $genero;?><br><br>
            <b>FECHA DE NACIMIENTO:</b><?php echo $resultado['fecha_de_nacimiento'];?> <b>NUM. DOCUMENTO:</b><?php echo $id;?> <br><br>
            <b>FECHA DE EMISION:</b><?php echo $fechaActual."<br>";?> <br> <b>FECHA DE VENCIMIENTO:</b><?php echo $fechaVencimiento;?><br><br>
            <b>FIRMA DEL TITULAR:</b>
        </div>
    </div>
    <br>
    <h3>Cedula Reverso:</h3>
    <div class="carnet">
        <div class="qr">
            <?php 
                $qrData = "Nombres: " . $resultado['nombres'] . "\n";
                $qrData .= "Apellido Paterno: " . $resultado['apellido_paterno'] . "\n";
                $qrData .= "Apellido Materno: " . $resultado['apellido_materno'] . "\n";
                $qrData .= "Rut: " . $resultado['rut'] . "\n";
                $qrData .= "Nacionalidad: " . $resultado['nacionalidad'] . "\n";
                $qrData .= "Sexo: " . $resultado['genero'] . "\n";
                $qrData .= "Fecha de Nacimiento: " . $resultado['fecha_de_nacimiento'] . "\n";
                $qrData .= "Lugar de Nacimiento: " . $resultado['lugar_de_nacimiento'] . "\n";
                $qrData .= "Profesion: " . $resultado['profesion'] . "\n";
                $qrData .= "Discapacidad: " . $resultado['discapacidad'] . "\n";
                $qrData .= "Donante: " . $resultado['donante'] . "\n";
                $qrData .= "Foto: " . $resultado['foto'] . "\n";

                $qr = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($qrData) . "&size=300x300&ecc=L";

                echo '<img src="' . $qr . '" alt="Código QR" style="width:200px; height:200px;">';
            ?>
                <div class="info2">
                    <b>NACIO EN:</b> <?php echo $resultado['lugar_de_nacimiento']; ?><br>
                    <b>PROFESION:</b> <?php echo $resultado['profesion']; ?>
                </div>
                <br>
                <div class="relleno">
                    <br><br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab modi nobis, earum, molestias mollitia saepe repudiandae neque in laborum, sunt tempore nam. Voluptates totam, doloremque pariatur deleniti aperiam consequatur maiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, debitis commodi a, quod error sed non modi eum animi hic minima deserunt illo doloremque fuga id aut ipsum quibusdam. Facere?
                </div>
            </div>
        
        <div class="huella">
            <b>HUELLA DIGITAL:</b>
        </div>
        <br> <br>
    </div>
</body>
</html>
