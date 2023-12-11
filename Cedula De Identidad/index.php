<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cedula de Identidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <h3>Formulario para Cedula de Identidad: </h3>
                <br>
                <form action="procesar.php" method="POST" enctype="multipart/form-data">
                    <label for="nombres" class="form-label">Nombres:</label>
                    <input type="text" name="nombres" id="nombres" class="form-control">
                    <br>
                    <label for="apellido_paterno" class="form-label">Apellido Paterno:</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control">
                    <br>
                    <label for="apellido_materno" class="form-label">Apellido Materno:</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" class="form-control">
                    <br>
                    <label for="rut" class="form-label">Rut:</label>
                    <input type="text" name="rut" id="rut" class="form-control">
                    <br>
                    <label for="nacionalidad">Selecciona tu Nacionalidad: </label>
                    <select name="nacionalidad" id="nacionalidad">
                        <option selected disabled>Selecciones su nacionalidad: </option><
                        <?php
                            $nacionalidades=[
                            "Argentina","Alemania","Brasil","Bolivia","Canada","Chile","Colombia","Ecuador","Jamaica","Noruega","Peru","Portugal","Paraguay","Uruguay","Venenzuela"
                            ];
                            foreach($nacionalidades as $n){
                                echo "<option value='$n'>$n</option>";
                            }
                        ?>
                        <br>
                    </select>
                    <br><br>
                    <label> Ingrese su Género: <br><input type="radio" name="sexualidad" value="masculino"> Masculino </label>
                    <label> <input type="radio" name="sexualidad" value="femenino"> Femenino </label>
                    <label> <input type="radio" name="sexualidad" value="Otro"> Otro </label>
                    <br> <br>
                    <label for="fecha">Fecha de Nacimiento:</label>
                    <input type="date" name="fecha" id="fecha">
                    <br> <br>

                    <label for="lugar_nacimiento" class="form-label">Lugar de Nacimiento:</label>
                    <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" class="form-control">
                    <br>
                    <label for="profesion" class="form-label">Profesion:</label>
                    <input type="text" name="profesion" id="profesion" class="form-control">
                    <br>
                    
                    <label> Inscrito en el Registro de Discapacidad: <input type="checkbox" name="discapacidad" value="1"> Sí   </label>
                    <label><input type="checkbox" name="discapacidad" value="0">   No </label>
                    <br> <br>

                    <label> Donante: <input type="checkbox" name="donante" value="1"> Sí </label>
                    <label> <input type="checkbox" name="donante" value="0"> No </label>
                    <br> <br>

                    <label for="archivo">Ingresa Foto de Identidad:</label><br>
                    <input type="file" name="archivo" id="archivo">
                    <br> <br>

                    <input type="submit" value="Enviar" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>
</html>