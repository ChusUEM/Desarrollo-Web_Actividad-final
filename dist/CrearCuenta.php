<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Formulario de Acceso </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="Videojuegos & Desarrollo">
        <meta name="description" content="Ejemplo de formulario de acceso basado en HTML5 y CSS">
        <meta name="keywords" content="login,formulariode acceso html">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/login.css">
        
        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
        
    </head>
    
    <body>
    
        <?php


echo 'Prueba1';
// $con = mysqli_connect("localhost","root","","usuarios");
$con = new mysqli("localhost","root","","usuarios");

echo 'Prueba2';
if (!$con) {
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
  echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
  echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
  exit;
  }
  

// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Campo Requerido";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Solo se permiten letras o espacios en blanco";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Campo Requerido";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "El formato no es válido";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Campo Obligatorio";
  } else {
    $password = test_input($_POST["password"]);
        if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$password)) {
            $passwordErr = "La contraseña solo debe tener números y/o letras";
        }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

        <div id="contenedor">
            
            <div id="contenedorcentrado">
                <div id="login">
                    <form class= "formG" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="transform: none;" novalidate>  
                        <h2>Crear Cuenta</h2>
                        <p><span class="error">* required field</span></p>
                      Name: *<input type="text" name="name" value="<?php echo $name;?>">
                      <span class="error"><br><?php echo $nameErr;?></span>
                      
                      E-mail: *<input type="text" name="email" value="<?php echo $email;?>">
                      <span class="error"><br><?php echo $emailErr;?></span>
                      
                      Contraseña: *<input type="text" name="password" value="<?php echo $password;?>">
                      <span class="error"> <br><?php echo $passwordErr;?></span>
                      
                      <button onclick="Introduccion.html">Acceder</button>
                      <!-- <input type="submit" name="submit" value="Acceder">   -->
                    </form>                  
<?php

    $txtname = 'NAME'; 
    $txtemail = 'EMAIL';
    $txtpassword = 'HOLA';

    $sql = "INSERT INTO registrousuarios (Nombre, Correo, Contraseña) VALUES ('$txtname', '$txtemail', '$txtpassword')";
    
    $rs = mysqli_query($con, $sql);
?> 

                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <hr>
                    <div class="pie-form">
                        <a href="login.html">Ya tengo cuenta</a>
                        <a >Gracias por confiar en nosotros</a>
                        <hr>
                       
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>