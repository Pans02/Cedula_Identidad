<?php
    require_once("conexion.php");
    $sql = "SELECT id, nombres, apellido_paterno, apellido_materno,  rut,  nacionalidad, genero, fecha_de_nacimiento, lugar_de_nacimiento, profesion, discapacidad, donante, foto FROM registrados";
    $resultado = $conexion->query($sql);
    echo "<br>";

    if ($resultado->num_rows > 0) {

        echo "<table border='1'>";
        echo "<tr><th>id</th><th>nombres</th><th>apellido_paterno</th><th>apellido_materno</th><th>rut</th><th>nacionalidad</th><th>genero</th><th>fecha_de_nacimiento</th><th>lugar_de_nacimiento</th><th>profesion</th><th>discapacidad</th><th>donante</th><th>foto</th><th>Accion</th>";


    while($fila = $resultado->fetch_assoc()) {
            $id=$fila["id"];
            echo "<form action='cedula.php' method='post'>"."<tr><td>"."<input type='hidden' name='num_doc' id='num_doc' value='$id'>".$fila["id"]."</td><td>".$fila["nombres"]."</td><td>".$fila["apellido_paterno"]."</td><td>".$fila["apellido_materno"]."</td><td>".$fila["rut"]."</td><td>".$fila["nacionalidad"]."</td><td>".$fila["genero"]."</td><td>".$fila["fecha_de_nacimiento"]."</td><td>".$fila["lugar_de_nacimiento"]."</td><td>".$fila["profesion"]."</td><td>".$fila["discapacidad"]."</td><td>".$fila["donante"]."</td><td>".$fila["foto"]."</td>"."<td>"."<input type='submit' value='Crear Cedula' class='btn btn_primary' name='crear'></form>"."</td></tr>";
        }
        echo "</table>";
}   
    else {
        echo "No se encontraron resultados.";
}
    ?>