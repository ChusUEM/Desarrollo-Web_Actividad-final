<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">

<?php
$conexion=mysqli_connect("localhost", "root", "", "ActividadFinal");
echo ("iniciando");
$errores = array();
$error = false;
$pass=md5($Password);

    $Name=$_GET['Nombre'];
    $Mail=$_GET['Email'];
    $Pass=$_GET['Password'];
    echo($Name. $Mail. $Pass);

    $consulta = "INSERT INTO Usuarios (Nombre, Password, Email) VALUES ('$Name', '$Pass', '$Mail')";
    echo $consulta;
    mysqli_query($conexion, $consulta);



?>