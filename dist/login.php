<?php
session_start();
?>
<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
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
    
    <body>
    <?php
    $errores = array();
    $error = false;
    $Email='';

    if (isset($_REQUEST['Submit'])) {
        $Email=$_REQUEST['Email'];
		if(trim($_REQUEST['Email'])){
			$errores["Email"] = "0";
		}else{
			$errores["Email"] = "1";
			$error=true;
		}
			$passRE=$_REQUEST['Password'];
		if(trim($_REQUEST['Password'])){
			$errores["Password"] = "0";
		}else{
			$errores["Password"] = "1";
			$error=true;
		}
    }

    if (isset($_REQUEST['Submit']) && $error==false){
            $conex=mysqli_connect("localhost", "root", "", "ActividadFinal") or die ("No se pudo conectar a la B.D");
            session_start();
            $sqlResultado=mysqli_query($conex,"SELECT * FROM Usuarios where Email='$Email'") or die ("Fallo consulta");
            $row=mysqli_fetch_all($sqlResultado,'MYSQLI_ASSOC');
        if (isset($row[0]["Password"]))
        {
            $Passwd=$row[0]["Password"];
            $Email=$row[0]["Email"];
            if ( md5 ($passRE)== $passwd)
            {
                echo "<div style='background-color:white;width:500px;'>";
                ///establecemos las variables de session
                $_SESSION["Email"]=$Email;
                echo "<p style='font-size:60px;'> BIENVENIDO, $_SESSION[Email] <br/> </p>";
                print ("<a style='font-size:60px;color:blue;' href='login.php' /> IR AL LOGIN DE LA WEB </a>");
                echo "</div>";
            }
            else
            {
                echo "<div style='background-color:white;width:500px;'>";
                print("<a style='font-size:60px;color:black;' />Password incorrecta </a><br>");
                print ("<a style='font-size:60px;color:blue;' href='login.php' /> Reintentar </a>");
                echo "</div>";
            }
        }
        else
        {
            echo "<div style='background-color:white;width:500px;'>";
            print("<a style='font-size:60px;color:black;' />Este usuario no existe </a><br>");
            print ("<a style='font-size:60px;color:blue;' href='login.php' /> Reintentar </a>");
            echo "</div>";
        }
    } else {

        ?>
        <div id="contenedor">
            
            <div id="contenedorcentrado">
                <div id="login">
                    <form class= "form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" style="transform: none;">  
                        <h2>INICIAR SESIÓN</h2>
                        <p><span class="error">* Campos requeridos</span></p>

                      E-mail: *<input type="text" name="Email" placeholder="Escribe tu email" value="<?php echo $Email; ?>" required>
                        <?php
                        if(isset($_REQUEST['Submit']) && $errores["Email"]=="1"){
                            print("<p style='color:red;font-size:18px;'  >Email de usuario obligatorio</p>");
                        }
                        ?> 
                      
                      Contraseña: *
                      <!--caja de contraseña-->
                      <div class="wrapper">
                            <input type="password" placeholder="Escribe tu contraseña" value="<?php echo $Password; ?>" required>
                            <span class="mostrar-btn"><i class="fas fa-eye"></i></span><!--muestra el ojo-->
                      </div>
                      <span class="mostrar-btn"><i class="fas fa-eye"></i></span> <!--muestra el ojo-->
                            <!--script para mostrar u ocultar la contraseña-->
                            <script>
                                const campoPass = document.querySelector("input");
                                const mostrarBtn = document.querySelector("span i");
                                
                                mostrarBtn.onclick = (() => {
                                    if (campoPass.type === "password") { //mostrar password
                                        campoPass.type = "text";
                                        mostrarBtn.classList.add("esconder-btn");
                                    } else { //esconder password
                                        campoPass.type = "password";
                                        mostrarBtn.classList.remove("esconder-btn");
                                    }
                                });
                            </script>
                        <?php
                        if(isset($_REQUEST['Submit']) && $errores['Password']=="1"){
                            print("<p style='color:red;font-size:18px;'  >Contraseña de usuario obligatorio</p>");
                        }
                        ?> 

                      <input type="submit" name="submit" value="Acceder">
                    </form>
                    
                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <hr>
                    <div class="pie-form">
                        
                        <a href="register.php">¿No tienes Cuenta? Registrate</a>
                        <hr>
                       
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>   
    </body>
</html>