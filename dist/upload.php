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

<?php
$conexion=mysqli_connect("localhost", "root", "", "ActividadFinal"); // Conexión con la BBDD
$pass=md5($Password); // Encriptación de la contraseña

    $Name=$_POST['Nombre']; // Getters para recuperar de 'register.php' los datos introducidos
    $Mail=$_POST['Email'];
    $Pass=$_POST['Password'];

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