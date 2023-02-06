<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>
<head>
<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
</head>

<?php
$conexion=mysqli_connect("localhost", "root", "", "ActividadFinal"); // Conexión con la BBDD
$pass=md5($Password); // Encriptación de la contraseña

    $Name=$_POST['Nombre']; // Getters para recuperar de 'register.php' los datos introducidos
    $Mail=$_POST['Email'];
    $Pass=$_POST['Password'];
    //echo($Name. $Mail. $Pass);

    $consulta = "INSERT INTO Usuarios (Nombre, Password, Email) VALUES ('$Name', '$Pass', '$Mail')" or die("Fallo de inserción");
    mysqli_query($conexion, $consulta);
    if ($consulta){
    echo("El usuario se ha creado satisfactoriamente");
    } else {
    echo ("El usuario NO se ha creado");
    }
?>

<body>
    <div id="contenido" class="text-center">
    <input type="submit" name="enviar" value="Ir al Login" class="cajas" style="font-size:40px;" href="login.php"> </input>
    </div>
</body>