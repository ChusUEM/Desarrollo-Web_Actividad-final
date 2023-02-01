<?php

$con = mysqli_connect("127.0.0.1","root","","ddbb");

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