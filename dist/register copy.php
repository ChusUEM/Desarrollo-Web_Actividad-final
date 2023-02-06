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
    <script src='https://www.google.com/recaptcha/api.js'></script>    <!-- Script que conecta con la API de recaptcha -->
    
    <body>
    <?php
    debug_to_console("antes de recaptcha"); // Probamos con la función para control del código por consola
	error_reporting(0);/////QUITA TODO LOS NOTICE DE ERROR
	$recaptcha=$_POST['g-recaptcha-response'];
	$errores = array();
	$error = false;
	$direccion=""; $nombre=""; $apellidos=""; $correo=""; $localidad="";
	if ($recaptcha != ''){
		$secret="6LdB5iIUAAAAALAM7opS9Y7fdRL421DC_QsK3nB4";
		$ip=$_SERVER['REMOTE_ADDR'];
		$var=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha&remoteip=$ip");
		$array=json_decode($var,true);
			if ($array['success']){//es igual que decir si es = true
				$error=false;
				$errores["recaptcha"]="0";
			}else{
				$error=true;
				$errores["recaptcha"]="1";
			}
	}else{
	$error=true;
	$errores["recaptcha"]="1";
	}	

    function debug_to_console($data) { // Creamos la función para control del código por consola
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    debug_to_console("comprobacion formulario usuario");
		//Comprobacion de el formulario, comprobamos que exista.		
		if(isset($_REQUEST['enviar'])){
					$Email=$_REQUEST['Email'];
					if(trim($_REQUEST['Email'])){
						$errores["Email"] = "0";
					}else{
						$errores["Email"] = "1";
						$error=true;
					}
					$Password=$_REQUEST['Password'];
					if(trim($_REQUEST['Password'])){
							$errores["Password"] = "0";
							$pass=md5($Password);
					}else{
						$errores["Password"] = "1";
						$error=true;
					}
					$Nombre=$_REQUEST['Nombre'];
					if(trim($_REQUEST['Nombre'])){
							$errores["Nombre"] = "0";	
					}else{
						$errores["Nombre"] = "1";
						$error=true;
					}	
		}
        debug_to_console("antes de conexión a sql");
				if(isset($_REQUEST['enviar']) && $error==false){
					$conex= new mysqli("localhost", "root","", "ActividadFinal") or die ("No puede conectar a mysqli");
					$conex->set_charset("utf-8");
					mysqli_set_charset($conex,"utf8"); ////PARA QUE META LOS CARACTERES ESPECIALES COMO TILDES.
					
					$conexion=mysqli_connect("localhost", "root", "", "ActividadFinal");
					$seleccion=mysqli_query($conexion, "SELECT * from Usuarios");
					$total= mysqli_num_rows($seleccion);
					
					//Comprobacion de que no registremos un Email ya existente en la B.D
					$sqlResultado=mysqli_query($conex,"SELECT * FROM Usuarios where Email='$Email'") or die ("Fallo consulta");
					$row=mysqli_fetch_all($sqlResultado,'MYSQLI_ASSOC');
						if (isset($row[0]["Email"])){
							$Mail=$row[0]["Email"];	
						}else{
							$Mail="";
						}
				
				if ( $Email == $Mail ) {
						echo "<div style='background-color:white;width:500px;'>";
					print ("<a style='font-size:50px;margin-left:20px;color:black;margin-top:10px;' href='registrarse.php' />Ya existe este usuario, REINTENTAR </a>");
						echo "</div>";
				}else{
					echo "<div style='background-color:white;width:500px;'>";
					print " $Mail";
                    $consulta = "INSERT INTO Usuarios ('Nombre', 'Password', 'Email') VALUES ('$Nombre', '$pass', '$Email')";
                    echo $consulta;
					mysqli_query($conex, $consulta);
						print("<p style='color:black;font-size:87px;margin-left:20px;'  >Completado</p>");
							print ("<a style='font-size:50px;margin-left:20px;color:blue;' href='login.php' /> IR AL LOGIN DE LA WEB </a>");
					echo "</div>";
				}

    } else {
        debug_to_console("antes del html");
        ?>
        <!--Comienzo de el formulario en html-->		
        <div id="contenedor" >
            <div id="titulo">
                <h1 class="text-center" >  REGISTRATE EN INMUEBLES </h1> 
                <img src="img/Portada.jpg" alt="Imagen de Portada"></br>
                </div>	
    
            <div id="contenido" class="text-center" align="right">
                <form method="GET" action="upload.php"  enctype="multipart/form-data" > </br>
                    <p>Email  </p><input class="cajas" type="text" name="Email" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" value="<?php echo $Email ;?>"> </input> </br> 
                    <?php
		
                    if(isset($_REQUEST['enviar']) && $errores["Email"]=="1"){
                        print("<p style='color:red;font-size:18px;'  >Email de usuario obligatorio</p>");
                    }
                    ?>
                    <p> Password </p> <input  class="cajas" type="password" name="Password" > </input> </br> 
                    <?php
                    if(isset($_REQUEST['enviar']) && $errores["Password"]=="1"){
                        print("<p style='color:red;font-size:18px;' >Password de usuario obligatoria</p>");
                    }
                    ?>
                
                    <p> Nombre </p> <input type="text"   class="cajas" name="Nombre"  value="<?php echo $correo ;?>"> </input> 
                    <?php
                    if(isset($_REQUEST['enviar']) && $errores["Nombre"]=="1"){
                        print("<p style='color:red;font-size:18px' >Nombre de usuario obligatorio</p>");
                    }
                    ?></br> </br> 
                    <input type="submit" name="enviar" value="Registrarse" class="cajas" style="font-size:20px;" href="login.php"> </input></br> </br> </br>
                    <div class="g-recaptcha" data-sitekey="6LdB5iIUAAAAALULHSWmgFEx1wZ08xutHrITR8wf"></div>
                    <?php
                    if(isset($_REQUEST['enviar']) && $errores["recaptcha"]=="1"){
                        print("<p style='color:red;font-size:18px;' >Eres un Robot</p>");
                    }
                    ?>
                </form>
            </div>
    <?php
    }
    ?>   
    </body>
</html>