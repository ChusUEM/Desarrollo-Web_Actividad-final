<?php
session_start();
?>
<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>
<head>
        
        <meta charset="utf-8">
        
        <title> Formulario de Acceso </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="Desarrollo WEB">
        <meta name="description" content="Ejemplo de formulario de acceso basado en HTML5, CSS y PHP con MARIADB">
        <meta name="keywords" content="login, formulario de acceso html">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/login.css">
        
        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
</head>
<?php

$conexion=mysqli_connect("localhost", "root", "", "ActividadFinal"); // Conexión con la BBDD
$pass=md5($Password); // Encriptación de la contraseña

$Reserve = $_POST['idReserva']; // Getters para recuperar de 'register.php' los datos introducidos
    echo $Reserve;

    $consulta_reservada = "SELECT RESERVADA FROM Inmuebles WHERE ID = $Reserve";
    mysqli_query($conexion, $consulta_reservada);
    //$afianzar_consulta = $_POST($consulta_reservada);
    echo ($consulta_reservada);    
    if ($consulta_reservada = 1){
        echo ("La casa ya estaba reservada. Lo sentimos.");
    } else {
        $consulta = "UPDATE Inmuebles SET RESERVADA = 1 WHERE ID = $Reserve";
        mysqli_query($conexion, $consulta);
    echo ($consulta);
        if ($consulta){
            echo("Se ha formalizado la reserva");
            } else {
            echo ("La reserva no se ha realizado");
            }
    }
?>

<body>
<div id="derecho">
    <div class="titulo">
        ¡Casa reservada!
    </div>
    <hr>
    <div class="pie-form">
    
        <a href="index.php">Seguir navegando</a>
    <hr>
    </div>
</div>
</body>