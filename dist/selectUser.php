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

    $Mail=$_GET['Email']; // Getters para recuperar de 'login.php' los datos introducidos
    $Pass=$_GET['Password'];
    //echo $Mail;
    //echo $Pass;
    $consulta = "SELECT Password, Email FROM Usuarios WHERE Email='$Mail' AND Password='$Pass'";
    echo ($consulta);
    $consulta_usuario = mysqli_query($conexion, $consulta);
    //echo (mysqli_num_rows($consulta_usuario));

    // comprobación del login
    if (mysqli_num_rows($consulta_usuario) > 0) {
        echo("Se ha formalizado el login");
        
        //<!--<a href="index.php">Ir a la página principal</a>-->
     } else {
        echo ("El login no se ha realizado");
        
        //<!--<a href="login.php">Datos erróneos. Vuelve a intentarlo</a>-->
        }
?>

<body>

    <div class="pie-form">
                        <a href="index.php">Acceder a la página principal</a>
                        <hr>
    </div>
</body>
<!--
<button href="index.php" value="Página principal"/>
<button href="index.php" value="Página principal"/>-->